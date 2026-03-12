<?php
$project = dirname(__DIR__);
require $project . '/vendor/autoload.php';
$app = require $project . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$controller = $app->make(App\Http\Controllers\ApiController::class);
$response = $controller->index();
// If response is a JsonResponse, send content
if (method_exists($response, 'getContent')) {
    echo $response->getContent();
} else {
    var_dump($response);
}
