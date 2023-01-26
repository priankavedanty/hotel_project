<?php

use Slim\App;

return function (App $app) {
    // e.g: $app->add(new \Slim\Csrf\Guard);

    // middleware untuk validasi token JWT 
    $app->add(new Tuupola\Middleware\JwtAuthentication([
        "path" => "/api",
        "passthrough" => ["/teste"],
        "secret" => "eTQpBBEgpLCZ5tSaYKcc3YgENnwcVxe3eReegJ45PgGhpmXWz9HagTqaxDZMuHyT",
        "secure" => false,
        "error" => function ($request, $response, $arguments) {
            $data["status"] = "0";
            $data["message"] = $arguments["message"];
            $data["data"] = "";
            return $response
                ->withHeader("Content-Type", "application/json")
                ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]));
};
