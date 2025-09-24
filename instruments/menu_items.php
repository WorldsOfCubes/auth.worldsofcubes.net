<?php if (!defined('MCR')) exit;
$menu_items = array (
  0 => 
  array (
	'main' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-home"></i> Главная',
	  'url' => '',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'admin' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-wrench"></i> Админка',
	  'url' => '',
	  'parent_id' => -1,
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'add_news' =>
	array (
	  'name' => 'Добавить новость',
	  'url' => 'go/news_add/',
	  'parent_id' => 'admin',
	  'lvl' => 1,
	  'permission' => 'add_news',
	  'active' => false,
	  'inner_html' => '',
	),
	'category_news' =>
	array (
	  'name' => 'Категории новостей',
	  'url' => 'control/category/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'file_edit' =>
	array (
	  'name' => 'Файлы',
	  'url' => 'control/filelist/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'control' =>
	array (
	  'name' => 'Аккаунты',
	  'url' => 'control/user/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'reg_edit' =>
	array (
	  'name' => 'Регистрация',
	  'url' => 'control/ipbans/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'group_edit' =>
	array (
	  'name' => 'Группы пользователей',
	  'url' => 'control/group/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'site_edit' =>
	array (
	  'name' => 'Настройки сайта',
	  'url' => 'control/constants/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'network_edit' =>
	array (
	  'name' => 'Настройки сети',
	  'url' => 'control/network/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'rcon' =>
	array (
	  'name' => 'RCON',
	  'url' => 'control/rcon/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'game_edit' =>
	array (
	  'name' => 'Настройки лончера',
	  'url' => 'control/update/',
	  'parent_id' => 'admin',
	  'lvl' => 15,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'sp_admin' =>
		array (
			'name' => 'Галерея скинов',
			'url' => '?mode=skingallary&do=admin',
			'parent_id' => 'admin',
			'lvl' => -1,
			'permission' => -1,
			'config' => -1,
			'active' => false,
			'inner_html' => '',
		),
	'info' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-info-sign"></i> Инфо',
	  'url' => 'go/guide/',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'faq' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-question-sign"></i> FAQ',
	  'url' => 'go/faq/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'webmcrex' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-info-sign"></i> webMCRex',
	  'url' => 'https://webmcrex.com/" target="_BLANK',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'rules' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-exclamation-sign"></i> Правила проекта',
	  'url' => 'go/rules/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'about' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-ok-sign"></i> О проекте',
	  'url' => 'go/about/',
	  'parent_id' => 'info',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'accs' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-user"></i> Юзеры',
	  'url' => 'go/users/',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'users' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-list"></i> Все',
	  'url' => 'go/users/',
	  'parent_id' => 'accs',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'banned' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-ban-circle"></i> С ограниченным доступом',
	  'url' => 'go/users/banned/',
	  'parent_id' => 'accs',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'ban' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-screenshot"></i> Ограничить доступ',
	  'url' => 'go/ban/',
	  'parent_id' =>'accs',
	  'lvl' => 8,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'projects' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-th-list"></i> Проекты',
	  'url' => 'go/projects/',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
  ),
  1 => 
  array (
	'social' =>
	array (
	  'name' => '<i class="fa fa-share-alt"></i>',
	  'url' => '#',
	  'parent_id' => -1,
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	  'bitbucket' =>
		  array (
			  'name' => '<i class="fa fa-bitbucket"></i> Bitbucket',
			  'url' => 'https://bitbucket.org/WorldsOfCubes" target="_BLANK',
			  'parent_id' => 'social',
			  'lvl' => -1,
			  'permission' => -1,
			  'active' => false,
			  'inner_html' => '',
		  ),
	'twitter' =>
	array (
	  'name' => '<i class="fa fa-twitter"></i> Twitter',
	  'url' => 'https://twitter.com/WorldsOfCubes" target="_BLANK',
	  'parent_id' => 'social',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'vk' =>
	array (
	  'name' => '<i class="fa fa-vk"></i> ВКонтакте',
	  'url' => 'https://vk.com/WorldsOfCubes" target="_BLANK',
	  'parent_id' => 'social',
	  'lvl' => -1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'pm' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-envelope"></i>',
	  'url' => 'go/pm/',
	  'parent_id' => -1,
	  'lvl' => 2,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'pm_new' =>
	array (
	  'name' => 'Написать ЛС',
	  'url' => 'go/pm/write/',
	  'parent_id' => 'pm',
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'pm_inbox' =>
	array (
	  'name' => 'Входящие',
	  'url' => 'go/pm/inbox/',
	  'parent_id' => 'pm',
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'pm_outbox' =>
	array (
	  'name' => 'Отправленные',
	  'url' => 'go/pm/outbox/',
	  'parent_id' => 'pm',
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'settings' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-cog"></i> Опции',
	  'url' => 'go/options/',
	  'parent_id' => -1,
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	'options' =>
	array (
	  'name' => 'Настройки персонажа',
	  'url' => 'go/options/',
	  'parent_id' => 'settings',
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
	  'skinposer' =>
		  array (
			  'name' => 'Образы',
			  'url' => 'go/skingallary',
			  'parent_id' => 'settings',
			  'lvl' => 0,
			  'permission' => -1,
			  'config' => 'sp_online',
			  'active' => false,
			  'inner_html' => '',
		  ),
	'exit' =>
	array (
	  'name' => '<i class="glyphicon glyphicon-log-out"></i> Выход',
	  'url' => 'login.php?out=1',
	  'parent_id' => -1,
	  'lvl' => 1,
	  'permission' => -1,
	  'active' => false,
	  'inner_html' => '',
	),
  ),
);
