<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'user';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['foto', 'nama', 'tanggal_lahir', 'nip', 'jabatan', 'unit', 'password', 'role'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [
        // 'foto' => ['uploaded[foto]', 'max_size[foto,5024]', 'is_image[foto]'],
        // 'nama' => ['required', 'alpha_numeric_space'],
        // 'tanggal_lahir' => ['required', 'valid_date'],
        // 'nip' => ['required', 'numeric', 'is_unique[user.nip]'],
        // 'jabatan' => ['required', 'alpha_numeric_space'],
        // 'unit' => ['required', 'alpha_numeric_space'],
        // 'password' => ['required'],
        // 'role' => ['required', 'in_list[admin,asn,honorer]'],
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
