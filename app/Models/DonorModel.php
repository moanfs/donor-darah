<?php

namespace App\Models;

use CodeIgniter\Model;

class DonorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'donors';
    protected $primaryKey       = 'id_donor';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'jadwal_id', 'user_id', 'created_at', 'updated_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getDonor()
    {
        return $this->db->table('pendonor');
    }

    public function getNewPendonor()
    {
        $db = \Config\Database::connect();
        return $db->table('dafat_donor')
            ->join('users', 'users.id_user=dafat_donor.user_id')
            ->orderBy('dafat_donor.created_at', 'DESC')
            ->limit(3)
            ->get()->getResultObject();
    }
}
