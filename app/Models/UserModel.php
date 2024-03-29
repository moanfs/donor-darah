<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'slug', 'nama_depan', 'nama_belakang', 'usia', 'tempat_lahir', 'tanggal_lahir', 'jenis_klamin', 'nik', 'alamat', 'email',
        'phone', 'goldar', 'pass_hash', 'img_profile', 'active', 'auth_group', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function getAllUser()
    {
        return $this->db->table('users')
            ->where('auth_group', '0')
            ->get()->getResultArray();
    }

    public function getProfile($id)
    {
        return $this->db->table('users')
            ->where('id_user', $id)
            ->get()->getRowObject();
    }

    public function updateAdmin($id, $namadepan, $namabelakang, $email)
    {

        $this->where('id_user', $id)
            ->set(['namadepan' => $namadepan, 'namabelakang' => $namabelakang, 'email' => $email])
            ->update();
    }
}
