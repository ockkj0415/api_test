<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
class Info
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = $db;
        $this->enc = \Config\Services::encrypter();
    }

    public function save($input) {
        log_message('info', '데이터 db 에 저장');

        $this->db->table('information')//db 테이블명
            ->insert([
                'user_name' => $input->user,
                'user_pw'   => $input->password,
                'createdAt' => date('Y-m-d H:i:s')
            ]);

        if ($this->db->insertID() == null) {
            log_message('error', '저장 실패');
            return false;
        }

        return $this->db->insertID();
    }
}