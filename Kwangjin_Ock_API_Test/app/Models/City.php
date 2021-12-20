<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
class City
{
    protected $db;
    public function __construct(ConnectionInterface &$db)
    {
        $this->db = $db;
    }

    public function search($city) {
        log_message('info', 'city DB 조회');

        $query = $this->db->table('Sigungu')
            ->select('*')
            ->where('depth1', $city)
            ->orderBy('pid_loc_code', 'ASC')
            ->get();

        if ($query->getNumRows() == 0) {
            log_message('error', '해당 데이터 없음');
            return false;
        }
        $resultp = null;
        foreach ($query->getResult() as $row) {
            $result[] = [
                'pid_loc_code'  => $row->pid_loc_code,
                'level'         => $row->level,
                'depth1'        => $row->depth1,
                'depth2'        => $row->depth2,
                'depth3'        => $row->depth3,
                'lt_lng'        => $row->lt_lng,
                'lt_lat'        => $row->lt_lat,
                'rb_lng'        => $row->rb_lng,
                'rb_lat'        => $row->rb_lat,
                'date_creation' => $row->date_creation
            ];
        }

        return $result;
    }
}
