<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'berita';
    protected $primaryKey       = 'id_berita';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul', 'slug', 'lokasi', 'isi', 'img', 'sumber', 'created_at', 'updated_at', 'deleted_at'
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

    public function getAllBerita()
    {
        return $this->db->table('berita')
            ->get()->getResultArray();
    }

    public function getOneBerita()
    {
        return $this->db->table('berita')
            ->limit(1)
            ->get()->getResultArray();
    }

    public function getBacaBerita($id)
    {
        return $this->db->table('berita')
            ->where('id_berita', $id)
            ->get()->getRowObject();
    }

    public function getBeritalain($id)
    {
        return $this->db->table('berita')
            ->notLike('id_berita', $id)
            ->limit(5)
            ->get()->getResultArray();
    }
}
