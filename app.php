<?php 

require_once __DIR__.'/vendor/autoload.php'; 

use Symfony\Component\HttpFoundation\JsonResponse;

$app = new Silex\Application(); 
if (!is_readable('/tmp/id')) {
    file_put_contents('/tmp/id', random(100));
}

$app->get('/tests/application-un', function() use($app) { 
    return 'Application Un   ['.file_get_contents('/tmp/id').']; 
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
