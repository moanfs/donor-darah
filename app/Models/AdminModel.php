<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'admin';
    protected $primaryKey       = 'id_admin';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pmi_id', 'slug', 'nama', 'email', 'phone', 'pass_hash', 'img_profile', 'role', 'active', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getAllAdmin()
    {
        return $this->db->table('admin')
            ->join('pmi', 'pmi.id_pmi=admin.pmi_id')
            ->select('admin.*, pmi.nama_pmi')
            ->where('role', '1')
            ->get()->getResultArray();
    }

    public function getProfile()
    {
        return $this->db->table('admin')
            ->join('pmi', 'pmi.id_pmi=admin.pmi_id')
            ->where('id_admin', session('id_admin'))
            ->get()->getRowObject();
    }

    public function updateAdmin($id, $namadepan, $namabelakang, $email)
    {
        $this->where('id_admin', $id)
            ->set(['namadepan' => $namadepan, 'namabelakang' => $namabelakang, 'email' => $email])
            ->update();
    }

    public function getAdmin($id)
    {
        return $this->db->table('admin')
            ->join('pmi', 'pmi.id_pmi=admin.pmi_id')
            ->select('admin.*, pmi.nama_pmi')
            ->where('id_admin', $id)
            ->get()->getRowArray();
    }
}
