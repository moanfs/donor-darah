<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jadwal_donor';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'pmi_id', 'nama_kegiatan', 'slug', 'date', 'time', 'time_end', 'alamat_kegiatan', 'kontak2', 'lokasi', 'desc', 'jenis_darah',
        'updated_by', 'created_by', 'deleted_by', 'updated_at', 'created_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;

    public function getAllDonor()
    {
        return $this->db->table('jadwal_donor')
            ->join('pmi', 'pmi.id_pmi = jadwal_donor.pmi_id')
            ->join('kecamatan', 'kecamatan.id_kecamatan = pmi.kec_id')
            ->where('date >', date("Y-m-d"))
            ->get()->getResultArray();
    }

    public function getAllJadwal()
    {
        return $this->db->table('jadwal_donor')
            ->join('pmi', 'pmi.id_pmi = jadwal_donor.pmi_id')
            ->orderBy('jadwal_donor.id_jadwal', 'DESC')
            ->get()->getResultArray();
    }



    public function getJadwal($id)
    {
        return $this->db->table('jadwal_donor')
            ->join('pmi', 'pmi.id_pmi = jadwal_donor.pmi_id')
            ->where('id_jadwal', $id)
            ->get()->getRowObject();
    }
}
