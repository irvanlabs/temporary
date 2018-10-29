<?php
foreach (scandir('Core') as $core)
{
	if ($core != '.' && $core != '..' && $core != 'index.html' && $core != 'init.php' && $core != '.htaccess')
	{
		require_once $core;
	}
}