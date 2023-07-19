<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'stok_darah';
    protected $primaryKey       = 'id_darah';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'goldar', 'jumlah', 'kab_kota', 'provinsi', 'created_at', 'deleted_at', 'updated_at'
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

    public function getAllStok()
    {
        return $this->db->table('stok_darah')
            ->get()->getResultArray();
    }
}
