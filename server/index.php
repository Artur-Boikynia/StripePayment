<?php

/*use Slim\Http\Request;
use Slim\Http\Response;
use Stripe\Stripe;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App;

$app->add(function ($request, $response, $next) {
    \Stripe\Stripe::setApiKey('sk_test_51IK8ySC7TRGrENFZDscbCb8YvQvzrABQDmNHvjU14VRaIsRubEgLD1l6xbJN4LaPlShoSd7HUYGWakFRoEj4ZjWa00iCXoPuUo');

    return $next($request, $response);
});

$app->post('/create-checkout-session', function (Request $request, Response $response) {
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'T-shirt',
                ],
                'unit_amount' => 2000,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'https://example.com/success.html',
        'cancel_url' => 'https://example.com/cancel.html',
    ]);

    return $response->withJson([ 'id' => $session->id ])->withStatus(200);
});

$app->run();*/