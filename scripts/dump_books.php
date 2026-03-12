<?php
$project = dirname(__DIR__);
require $project . '/vendor/autoload.php';
$app = require $project . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$db = $app->make('db');
$results = $db->table('books')->get();
echo json_encode($results, JSON_PRETTY_PRINT);
