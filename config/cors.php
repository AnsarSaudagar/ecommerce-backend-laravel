<?php // config/cors.php

return [
    /*
    |--------------------------------------------------------------------------
    | Allowed Paths
    |--------------------------------------------------------------------------
    |
    | You can enable CORS for specific paths or globally.
    | You can also limit CORS to specific routes.
    */
    'paths' => ['api/*'], // Enables CORS for all API routes.

    /*
    |--------------------------------------------------------------------------
    | Allowed Methods
    |--------------------------------------------------------------------------
    |
    | These are the HTTP methods that are allowed.
    | "*" allows all methods like GET, POST, PUT, DELETE, etc.
    */
    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Allowed Origins
    |--------------------------------------------------------------------------
    |
    | Specify the origins that are allowed to make requests.
    | Use "*" to allow any origin, or set specific domains.
    */
    'allowed_origins' => ['*'], // You can specify domains like 'https://example.com'

    /*
    |--------------------------------------------------------------------------
    | Allowed Headers
    |--------------------------------------------------------------------------
    |
    | Specify the headers that are allowed.
    | Use "*" to allow all headers.
    */
    'allowed_headers' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Exposed Headers
    |--------------------------------------------------------------------------
    |
    | Headers that are exposed to the browser.
    */
    'exposed_headers' => [],

    /*
    |--------------------------------------------------------------------------
    | Max Age
    |--------------------------------------------------------------------------
    |
    | The number of seconds the browser should cache the response.
    */
    'max_age' => 0,

    /*
    |--------------------------------------------------------------------------
    | Supports Credentials
    |--------------------------------------------------------------------------
    |
    | Whether or not the response can be exposed when credentials are included.
    */
    'supports_credentials' => false,
];
