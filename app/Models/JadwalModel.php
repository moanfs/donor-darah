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
        'nama', 'slug', 'date', 'time', 'date_end', 'time_end', 'kab_kota', 'provinsi', 'lokasi',
        'desc', 'updated_at', 'created_at', 'deleted_at'
    ];

    // Dates
    protected $useTimestamps = true;


    public function getAllJadwal()
    {
        return $this->db->table('jadwal_donor')
            ->get()->getResultArray();
    }

    public function getAllDonor()
    {
        // $dateTimeEnd = strtotime($jadwal['date_end'] . ' ' . $jadwal['time_end']);
        return $this->db->table('jadwal_donor')
            ->join('regencies', 'regencies.id = jadwal_donor.kab_kota', 'left')
            // ->where('da')
            ->get()->getResultArray();
    }

    public function getJadwal($id)
    {
        return $this->db->table('jadwal_donor')
            ->join('regencies', 'regencies.id = jadwal_donor.kab_kota', 'left')
            ->where('id_jadwal', $id)
            ->get()->getRowObject();
    }
}
