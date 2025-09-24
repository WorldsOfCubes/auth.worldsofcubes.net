<?php
if (!defined('MCR')) exit;
if (empty($user) or $user->lvl() <= 0) {
	header("HTTP/1.0 403 Forbidden");
	show_error("login", "Нужно войти в систему");
}
if (empty($_REQUEST['wocid'])) {
	header("HTTP/1.0 404 Not Found");
	show_error("404", "Страница не найдена");
}
$proj_id = $_REQUEST['wocid'];
$proj_id = explode('/', $proj_id);
if (isset($proj_id[1])) $additional = $proj_id[1];
$proj_id = (int) $proj_id[0];
$proj = $db->execute("SELECT * FROM `woc_projects` WHERE `id`='$proj_id'");
if(!$proj or $db->num_rows($proj) != 1) show_error('404', 'Проект не найден');
$proj = $db->fetch_assoc($proj);

if($user->lvl() < 8 and $proj['user'] != $user->name() and $proj['in_develop']) show_error("403", 'Проект скрыт');
if (strlen($proj['security_key'])<16) accss_deny();
$page = 'Авторизация на проекте ' . $proj['name'];

$query =  $db->execute("SELECT * FROM `woc_projects_players` WHERE `pid`=$proj_id AND `uid` = " . $user->id()) or die ($db->error());
$query = $db->fetch_assoc($query);
if(($query == null or !$query['hide_dialog']) and (!isset($_POST['token']) or $_POST['token'] != md5(md5($user->name() . $proj['security_key'])))) {
	ob_start();
		include View::Get('wocauth.html');
	$content_main = ob_get_clean();
} else {
	if(!$query) $db->execute("INSERT INTO `woc_projects_players` (`uid`,`pid`,`hide_dialog`) VALUES (" . $user->id() . ",$proj_id, " . (isset($_POST['hide_dialog'])? 1:0) . ")") or die ($db->error());
	if(!$query['hide_dialog'] and isset($_POST['hide_dialog']))
		$db->execute("UPDATE `woc_projects_players` SET `hide_dialog`=1 WHERE `pid`=$proj_id AND `uid` = " . $user->id());

	$user_alt = (isset($_POST['user_alt']))? $_POST['user_alt'] : $user->name();
	$url = $proj['path'];

	$params = array(
		"user" => $user_alt,
		"user_id" => $user->id(),
		"mail" => $user->email(),
		"hash" => md5(md5($proj['security_key'] . ":" . $user_alt . ":" . $user->id() . ":" . $user->email())),
	);
	if(isset($additional)) $params['additional'] = $additional;
	$mcSocket = curl_init();
	curl_setopt_array($mcSocket, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query($params),
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_SSL_VERIFYHOST => 0
	));
	$mcOutput = curl_exec($mcSocket);
	$http_code = curl_getinfo($mcSocket, CURLINFO_HTTP_CODE);
	curl_close($mcSocket);

	if($http_code != 200) $content_main = View::Alert("curl check error: " . $http_code);
	if($mcOutput == 'OK') {
		$tmp = randString( 15 );
		$params = array(
			"user" => $user_alt,
			"user_id" => $user->id(),
			"tmp" => $tmp,
			"mail" => $user->email(),
			"female" => $user->gender(),
			"hash" => md5(md5($proj['security_key'] . ":" . $user->gender() . ":" . $user->email() . ":" . $user_alt . ":" . $tmp)),
			"verified" => ($user_alt == $user->name())? $user->verified() : 0,
		);
		if(isset($additional)) $params['additional'] = $additional;
		$mcSocket = curl_init();
		curl_setopt_array($mcSocket, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => http_build_query($params),
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0
		));
		$mcOutput = curl_exec($mcSocket);
		$http_code = curl_getinfo($mcSocket, CURLINFO_HTTP_CODE);
		curl_close($mcSocket);
		if($http_code != 200 or $mcOutput != "OK") $content_main = View::Alert("curl login error: " . $http_code . "<br>" . TextBase::HTMLDestruct($mcOutput));
		else {
?>
			<html>
			<body onload="Redirect()">
			now you must be redirected...
			<script language="JavaScript">
				function Redirect() {
					document.location.href = "<?=$url."?cookie4=".$tmp?>";
				}
			</script>
			</body>
			</html>
<?php
			exit;
		}
	} elseif ($mcOutput == 'EXISTS_NOT_CONNECTED') {
		ob_start();
		include View::Get('wocauth_exists.html');
		$content_main = ob_get_clean();
	} elseif ($mcOutput == 'MAIL_EXISTS_NOT_CONNECTED') {
		ob_start();
		include View::Get('wocauth_mail_exists.html');
		$content_main = ob_get_clean();
	}  elseif ($mcOutput == 'BAD_TOKEN') {
		ob_start();
		include View::Get('wocauth_bad_token.html');
		$content_main = ob_get_clean();
	} else {
		$content_main = View::Alert("curl check error: $http_code<br>" . TextBase::HTMLDestruct($mcOutput));
	}
}