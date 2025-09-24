<?php

/* File may be replaced in future releases */

Class MCRAuth {

	public static function userLoad() {
		global $config, $user;

		if ($config['p_logic'] != 'usual')

			MCMSAuth::userInit();

		else self::LoadSession();

		if (!empty($user))
			$user->activity();
	}

	public static function LoadSession($check = true) {
		global $user, $bd_users;

		$user = false;
		$check_ip = GetRealIp();

		if (!class_exists('User', false))
			exit('include user class first');
		if (!session_id() and !empty($_GET['session_id']) and preg_match('/^[a-zA-Z0-9]{26,40}$/', $_GET['session_id']))

			session_id($_GET['session_id']);

		if (!isset($_SESSION))
			session_start();

		if (isset($_SESSION['token']))
			$user = new User($_SESSION['token'], $bd_users['tmp']);
		if ($user and $user->name() != $_SESSION['user_name']) {
			$user = false;
			session_destroy();
		}

		if (isset($_COOKIE['WoCAccountCookie']) and !$user) {
			if($_COOKIE['WoCAccountCookie']=="0")
				return;
			$user = new User($_COOKIE['WoCAccountCookie'], $bd_users['tmp']);
			if ($user->id()) {

				$_SESSION['user_name'] = $user->name();
				$_SESSION['ip'] = $check_ip;
			}
		}

		if (!empty($user)) {

			if ((!$user->id()) or ($user->lvl() <= 0) or ($check and $check_ip != $user->ip())
			) {

				if ($user->id())
					$user->logout();
				setcookie("WoCAccountCookie","",time(), '/', '.' . str_replace('auth.', '', $_SERVER['SERVER_NAME']));
				$user = false;
			}
		}
	}

	public static function createPass($password) {
		global $config;

		if ($config['p_logic'] != 'usual')

			return MCMSAuth::createPass($password);

		return md5($password);
	}

	public static function checkPass($data) {
		global $bd_names, $bd_users, $config;

		if ($config['p_logic'] != 'usual')

			return MCMSAuth::checkPass($data);

		if ($data['pass_db'] == md5($data['pass']))
			return true;

		else return false;
	}
}