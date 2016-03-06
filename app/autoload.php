<?php

require_once 'config.php';

spl_autoload_register(function ($class)
{

	if (file_exists(SITE_PATH . '/app/core/' . $class . '.php')) 
	{

        require_once SITE_PATH . '/app/core/' . $class . '.php';
    }
});

$app = new App;
