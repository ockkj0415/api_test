<?php

namespace App\Controllers\v2;
use CodeIgniter\RESTful\ResourceController;

class Cylinder extends ResourceController {
    public function _construct() {
        $this->db = \Config\Database::connect();
    }

    public function index($city = null) {
        log_message('info', '조회 API 개발');

        $data = new \App\Models\City($this->db);
        $result = $data->search($city);

        if ($result == false) return false;

        return $result;
    }
}