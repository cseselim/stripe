<?php

include "./stripe-php/init.php";
// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
\Stripe\Stripe::setApiKey('sk_test_51M7jCyFvEWLMPDr3tQzNiS4h7LC0tbfCHyyVeanhV8KVfXMiDy0yVFviVYwkqSAUTwbez2dltyw6MRLWnzuydyMM00kJzn2aDp');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/react-demo/';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1M7vjvFvEWLMPDr3xqS0Fjb1',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '?canceled=true',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);