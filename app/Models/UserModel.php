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
        'phone', 'goldar', 'pass_hash', 'img_profile', 'active', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;

    /*
    * admin
    */
    public function getAllUser()
    {
        return $this->db->table('users')
            ->get()->getResultArray();
    }

    /*
    * User
    */
    public function getProfile($id)
    {
        return $this->db->table('users')
            ->where('id_user', $id)
            ->get()->getRowObject();
    }
}
