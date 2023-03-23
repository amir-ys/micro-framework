<?php
session_start();
const DISPLAY_ERROR = true;
const BASE_PATH = __DIR__ ;

require 'core/helpers/helper.php';
require base_path('core/config/error.php');
require base_path('core/Response.php');
require base_path('core/Validator.php');
require base_path('core/database/Database.php');
require base_path('core/route/router.php');
