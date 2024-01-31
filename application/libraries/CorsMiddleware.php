<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorsMiddleware {

    public function handle() {
        // Set CORS headers
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // Allow preflight requests to succeed without causing issues
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            http_response_code(200);
            exit();
        }
    }
}