<?php

namespace App\Controllers\v2;
use CodeIgniter\RESTful\ResourceController;

class Cylinder extends ResourceController {
    public function _contstruct() {
        $request = \Config\Services::request();
        $this->input = $request->getJson();
    }

    public function index() {
        log_message('info', 'open API 조회');
        $key = 'test';

        $url = 'https://api.archisketch.com/v1/cylinder/product/5EED9DCF76984934'
        $curlHandle = curl_init($url);
        curl_setopt_array($curlHandle, [
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => [
                'X-API-KEY : ' . $key,
            ],
        ]);

        $apiCallResult = curl_exec($curlHandle);
        
        $apiCallResult = json_decode($apiCallResult);
        $resultCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        $result = null;
        if ($resultCode == 200) {
            $result = [
                'name' => $apiCallResult->name,
                'editorAsset' => $apiCallResult->editorAsset
            ];
        } else {
            return false;
        }

        return $result;
    }

    public function info() {
        log_message('info', '데이터 저장 api');

        $input = $this->resquest->getJson();

        $data = new \App\Models\Info($this->db);
        $result = $data->save($input);

        if ($result == false) {
            log_message('error', '데이터 저장 실패');
            return false;
        }

        return $result;
    }
}