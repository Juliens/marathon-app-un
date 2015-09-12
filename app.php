<?php 

require_once __DIR__.'/vendor/autoload.php'; 

use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application(); 

$app->get('/tests/application-un', function() use($app) { 
    var_dump($_SERVER);
    var_dump($_ENV);
    return 'Hello '; 
}); 

$app->get('/api-docs', function() use($app) { 
        return new JsonResponse(array(
            'basePath'=>'http://localhost/tests',
            'paths'=> array(
                "/application-un" => array('get'=>''),
            )
        ));
});

$app->run(); 
