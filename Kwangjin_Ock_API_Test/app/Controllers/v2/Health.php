<?php

namespace App\Controllers\v2;
use App\Controllers\BaseController;

class Health extends BaseController {
    public function index() {
        log_message('error', 'api 조회');

        return $response = [
            'result'   => '1',
            'messages' => 'Health is OK',
        ];;
    }
}