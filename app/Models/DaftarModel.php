<?php

namespace App\Models;

use App\Filters\IsLogin;
use CodeIgniter\Model;

class DaftarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dafat_donor';
    protected $primaryKey       = 'id_daftar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'jadwal_id', 'nomor', 'created_at', 'deleted_at', 'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getNomor($jadwal_id)
    {
        return $this->where('jadwal_id', $jadwal_id)->countAllResults();
    }

    // public function cekPendaftar($user_id, $jadwal_id)
    // {
    //     return $this->
    // }
    public function getJadwal()
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal = dafat_donor.jadwal_id')
            ->where('user_id', userLogin()->id_user)
            ->get()->getResultArray();
    }
}
