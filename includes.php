<?php 

require_once __DIR__.'/system/loader.php';
require_once __DIR__.'/system/factory.php';

// include defines
include_once dirname(__FILE__).'/defines.php';

FALoader::setup();
FALoader::autoloadfolder(__DIR__.'/system/base');
FALoader::autoloadfolder(__DIR__.'/models', 'FAModel');
FALoader::autoloadfolder(__DIR__.'/controllers', 'FAController');
FALoader::autoloadfolder(__DIR__.'/views', 'FAView');