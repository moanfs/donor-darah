<?php

namespace App\Models;

use CodeIgniter\Model;

class PmiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pmi';
    protected $primaryKey       = 'id_pmi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kec_id', 'slug', 'nama_pmi', 'alamat', 'kontak', 'updated_at', 'created_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getAllPMI()
    {
        // return $this->db->table('pmi')
        //     ->get()->getResultObject();
        return $this->findAll();
    }

    public function getAllPMIAdmin()
    {
        return $this->db->table('pmi')
            ->get()->getResultObject();
    }

    public function getPMI()
    {
        return  $this->db->table('pmi')
            ->join('admin', 'admin.pmi_id=pmi.id_pmi')
            ->where('id_admin', session('id_admin'))
            ->get()->getRow();
    }

    public function getJadwal($id)
    {
        return $this->join('jadwal_donor', 'jadwal_donor.pmi_id=pmi.id_pmi')
            ->where('id_jadwal', $id)
            ->get()->getRowObject();
    }
}
