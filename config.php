<?php

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', /*'/apprea/'); */'https://appes.herokuapp.com/');
	
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'includes/database.php');

define('HEADER_TEMPLATE', ABSPATH .'includes/header.php');
define('SIDEBAR_TEMPLATE', ABSPATH . 'includes/sidebar.php');
define('FOOTER_TEMPLATE', ABSPATH . 'includes/footer.php');
?>