<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsnModel;

class Cetak extends BaseController
{
    public function index()
    {
        $validaion = $this->validate([
            'from' => ['valid_date[Y-m]'],
            'to' => ['valid_date[Y-m]'],
            'table' => ['required', 'in_list[asn,honorer]'],
        ]);
        if (!$validaion) {
            $absens = null;
        }

        $from = $this->request->getVar('from');
        $to = $this->request->getVar('to');
        $table = $this->request->getVar('table');

        $db      = \Config\Database::connect();

        $builder = $db->table($table);

        if ($from == null || $to == null) {
            $absens = $builder->where($table . '.deleted_at', null)->join('user', 'user.id=' . $table . '.user_id')->get();
        } else {
            $absens = $builder->where("absen BETWEEN '$from-01' AND '$to-01'")->where($table . '.deleted_at', null)->join('user', 'user.id=' . $table . '.user_id')->get();
        }

        $data = [
            'title' => 'Cetak',
            'bulan' => date_format(date_create($from . '-01'), 'Y-F') . ' sampai ' . date_format(date_create($to . '-01'), 'Y-F'),
            'absens' => $absens,
        ];

        return view('print/print', $data);
    }
}
