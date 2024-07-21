<?php

namespace App\Models;

use App\Filters\IsLogin;
use CodeIgniter\Model;

class DaftarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'daftar_donor';
    protected $primaryKey       = 'id_daftar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'jadwal_id', 'nomor', 'status', 'riwayat', 'keterangan', 'created_at', 'deleted_at', 'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;

    /**
     * User
     */
    public function getJadwal()
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal = daftar_donor.jadwal_id')
            ->where('user_id', userLogin()->id_user)
            ->get()->getResultArray();
    }

    public function getDaftar($id)
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal = daftar_donor.jadwal_id')
            ->join('users', 'users.id_user=daftar_donor.user_id')
            ->where('id_daftar', $id)
            ->get()->getRowObject();
    }

    /**=======================================================
     * admin 
     *======================================================*/
    public function getNomor($jadwal_id)
    {
        return $this->where('jadwal_id', $jadwal_id)->countAllResults();
    }

    // menampilkan top 3 user donor
    public function getTopDonor()
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal=daftar_donor.jadwal_id')
            ->join('users', 'users.id_user=daftar_donor.user_id')
            ->select('jadwal_donor.*, users.*, daftar_donor.*, COUNT(user_id) as done')
            ->where('status', '1')
            ->groupBy('daftar_donor.user_id')
            ->limit(3)
            ->get()->getResultObject();
    }

    public function getPendaftar()
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal=daftar_donor.jadwal_id')
            ->join('users', 'users.id_user=daftar_donor.user_id')
            ->select('jadwal_donor.*, COUNT(jadwal_id) as jadwal_id')
            ->groupBy('jadwal_donor.id_jadwal')
            ->get()->getResultArray();
    }

    public function getPendaftarByJadwal($id)
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal=daftar_donor.jadwal_id')
            ->join('users', 'users.id_user=daftar_donor.user_id')
            ->where('id_jadwal', $id)
            // ->groupBy('jadwal_donor.id_jadwal')
            // ->orderBy('daftar_donor.nomor', 'DESC')
            ->get()->getResultArray();
    }

    public function getPendaftarByDaftar($id)
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal=daftar_donor.jadwal_id')
            ->join('users', 'users.id_user=daftar_donor.user_id')
            ->where('id_daftar', $id)
            ->get()->getRowObject();
    }

    public function getKondisi($id)
    {
        return $this->join('jadwal_donor', 'jadwal_donor.id_jadwal=daftar_donor.jadwal_id')
            ->where('id_daftar', $id)
            ->where('date', date('Y-m-d'))
            // ->where('time', date('H:i'))
            ->get()->getRowObject();
    }
}
