<?php
$project = dirname(__DIR__);
require $project . '/vendor/autoload.php';
$app = require $project . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$router = $app->make('router');
$routes = $router->getRoutes();
$rows = [];
foreach ($routes as $route) {
    $action = $route->getAction();
    $actionName = is_string($route->getActionName()) ? $route->getActionName() : null;
    $closureFile = null;
    if (isset($action['uses']) && $action['uses'] instanceof Closure) {
        $ref = new ReflectionFunction($action['uses']);
        $closureFile = $ref->getFileName() . ':' . $ref->getStartLine();
    }
    $rows[] = [
        'uri' => $route->uri(),
        'methods' => implode('|', $route->methods()),
        'name' => $route->getName(),
        'action' => $actionName ?: json_encode($action),
        'closure_file' => $closureFile,
    ];
}
echo json_encode($rows, JSON_PRETTY_PRINT);
