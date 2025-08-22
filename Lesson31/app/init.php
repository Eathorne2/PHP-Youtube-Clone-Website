<?php

function getBaseURL()
{
	$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https':'http';
	$serverName = $_SERVER['HTTP_HOST'];
	$scriptName = dirname($_SERVER['SCRIPT_NAME']);
	$scriptName = rtrim($scriptName,'/\\');
	return "$host://$serverName$scriptName";
}

require 'functions.php';
require 'config.php';
require 'routes.php';