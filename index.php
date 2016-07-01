<?php

// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Session.php';

require 'config/paths.php';

// setup the autoloading
require_once 'vendor/autoload.php';
// setup Propel
require_once 'config/generated-conf/config.php';

$app = new Bootstrap();