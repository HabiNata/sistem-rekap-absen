<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AsnModel;

class Cetak extends BaseController
{
    public function index()
    {
        $validaion = $this->validate([
            'from' => ['valid_date'],
            'to' => ['valid_date'],
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
            $absens = $builder->where("absen BETWEEN '$from' AND '$to'")->where($table . '.deleted_at', null)->join('user', 'user.id=' . $table . '.user_id')->get();
        }

        $data = [
            'title' => 'Cetak',
            'absens' => $absens,
        ];

        return view('print/print', $data);
    }
}
