<?php
//default routes
$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo "The page you are looking for is not available";
});

$router->set404('/api(/.*)?', function() {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    render_json($jsonArray);
});
