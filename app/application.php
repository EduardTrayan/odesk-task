#!/usr/bin/env php
<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/CustomApplication.php';

$application = new CustomApplication();

$application->run();
