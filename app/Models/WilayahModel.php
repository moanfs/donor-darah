<?php
// Contoh model untuk mengambil data wilayah
namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    public function AllProvinsi()
    {
        return $this->db->table('provinces')
            ->get()->getResultObject();
    }

    public function AllKabupaten($id_provinsi)
    {
        return $this->db->table('regencies')
            ->where('province_id', $id_provinsi)
            ->get()->getResultObject();
    }

    public function getKota($id)
    {
        return $this->db->table('regencies')
            ->where('id', $id)
            ->get()->getResult();
    }
}
