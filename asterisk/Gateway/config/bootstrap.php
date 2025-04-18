<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__) . '/vendor/autoload.php';

if (is_array($env = @include dirname(__DIR__) . '/.env.local.php') && (!isset($env['APP_ENV']) || ($SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? $env['APP_ENV']) === $env['APP_ENV'])) {
  foreach ($env as $k => $v) {
    $_ENV[$k] = $_ENV[$k] ?? (isset($_SERVER[$k]) && 0 !== strpos($k, 'HTTP_') ? $_SERVER[$k] : $v);
  }
} else if (!class_exists(Dotenv::class)) {
  throw new RuntimeException('Please run "composer require symfony/dotenv" to load the ".env" files configuring the application.');
} else {
  (new Dotenv(false))->loadEnv(dirname(__DIR__) . '/.env');
}

$_SERVER += $_ENV;
$_SERVER['APP_ENV'] = $_ENV['APP_ENV'] = ($_SERVER['APP_ENV'] ?? $_ENV['APP_ENV'] ?? null) ?: 'dev';
$_SERVER['APP_DEBUG'] = $_SERVER['APP_DEBUG'] ?? $_ENV['APP_DEBUG'] ?? 'prod' !== $_SERVER['APP_ENV'];
$_SERVER['APP_DEBUG'] = $_ENV['APP_DEBUG'] = (int)$_SERVER['APP_DEBUG'] || filter_var($_SERVER['APP_DEBUG'], FILTER_VALIDATE_BOOLEAN) ? '1' : '0';