<?php
require('../system.php');
$db = new DB();
$db->connect('WoCAuth');

loadTool('user.class.php');
MCRAuth::userLoad();
if (!$user or $user->lvl() <= 1) exit('not logged in or not verified');
if (!isset($_POST['token']) or !isset($_POST['id'])) exit('incorrect request');

$proj_id = (int) $_POST['id'];
$proj = $db->execute("SELECT * FROM `woc_projects` WHERE `id`='$proj_id'");
if(!$proj) exit('invalid project');
$proj = $db->fetch_assoc($proj);
if ($_POST['token'] != md5(md5($user->name() . $proj['security_key']))) exit('invalid token');

$query =  $db->execute("SELECT * FROM `woc_projects_players` WHERE `pid`=$proj_id AND `uid` = " . $user->id()) or die ($db->error());
$query = $db->fetch_assoc($query);
if(!$query) $db->execute("INSERT INTO `woc_projects_players` (`uid`,`pid`) VALUES (" . $user->id() . ",$proj_id)") or die ($db->error());

$tmp = randString( 15 );

$url = $proj['path'];
$params = array(
	"user" => $user->name(),
	"user_id" => $user->id(),
	"tmp" => $tmp,
	"mail" => $user->email(),
	"female" => $user->gender(),
	"hash" => md5(md5($proj['security_key'] . ":" . $user->gender() . ":" . $user->email() . ":" . $user->name() . ":" . $tmp)),
	"verified" => $user->verified(),
);
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

if($mcOutput != "OK" and $http_code == 200) exit ("curl error: " . $http_code . "<br>" . TextBase::HTMLDestruct($mcOutput));
	else header("Location: " . $proj['path'] . "?cookie=" . $tmp);