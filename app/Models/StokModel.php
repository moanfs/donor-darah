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
        'pmi_id', 'goldar', 'slug', 'jumlah', 'kontak2', 'created_at', 'deleted_at', 'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;

    /*
    * Admin
    */
    public function getAllStok()
    {
        return $this->db->table('stok_darah')
            ->join('pmi', 'pmi.id_pmi = stok_darah.pmi_id')
            ->join('kecamatan', 'kecamatan.id_kecamatan=pmi.kec_id')
            ->orderBy('stok_darah.id_darah', 'DESC')
            // ->groupBy('goldar')
            ->get()->getResultArray();
    }

    public function getStok($id)
    {
        return $this->db->table('stok_darah')
            ->join('pmi', 'pmi.id_pmi = stok_darah.pmi_id')
            ->where('id_darah', $id)
            ->get()->getRowArray();
    }

    /*
    * User
    */
    public function getStokByKec()
    {
        return $this->db->table('kecamatan')
            ->join('pmi', 'pmi.kec_id=kecamatan.id_kecamatan')
            ->join('stok_darah', 'stok_darah.pmi_id=pmi.id_pmi')
            ->groupBy('stok_darah.goldar')
            // ->groupBy('stok_darah.pmi_id')
            // ->orderBy('stok_darah.id_darah', 'DESC')
            ->get()->getResultArray();
    }
    public function getStokByGol()
    {
        return $this->select('goldar, slug, SUM(jumlah) as jmlh, COUNT(pmi_id) as pmi')
            ->groupBy('stok_darah.goldar')
            ->get()->getResultArray();
    }

    public function getStokByGoldar($slug)
    {
        return $this->db->table('stok_darah')
            ->join('pmi', 'pmi.id_pmi = stok_darah.pmi_id')
            ->join('kecamatan', 'kecamatan.id_kecamatan=pmi.kec_id')
            ->where('stok_darah.slug', $slug)
            ->get()->getResultArray();
    }
}
