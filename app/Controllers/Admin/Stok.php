<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PmiModel;
use App\Models\StokModel;

class Stok extends BaseController
{
    public function index()
    {
        $stok = new StokModel();
        $data = [
            'stok' => $stok->getAllStok()
        ];
        return view('admin/stok-darah', $data);
    }

    // data stok yang di hapus
    public function hapus()
    {
        $stok = new StokModel();
        $data = [
            'stok' => $stok->getStokDelete()
        ];
        return view('admin/stok-darah-hapus', $data);
    }

    public function new()
    {
        $pmi = new PmiModel();
        $data = [
            'validation'    => \config\Services::validation(),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI(),
        ];
        return view('admin/stok-darah-form', $data);
    }

    public function save()
    {
        $stok = new StokModel();
        $pmi = new PmiModel();
        $data = $this->request->getPost();
        $petugas = $pmi->getPMI();
        $rules = [
            'goldar'    => ['rules' => 'required', 'errors' => ['required' => 'golongan darah harus dipilih']],
            'jumlah'    => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'jumlah kantong darah tidak boleh kosong', 'alpha_numeric' => 'hanya boleh angka']],
        ];

        $cekStok = $stok->where('goldar', $this->request->getPost('goldar'))
            ->where('pmi_id', $this->request->getPost('pmi_id'))
            ->countAllResults() > 0;

        // untuk membuat slug
        $lower = strtolower($data['goldar']);
        $str = str_replace("+", "", $lower);
        $slug = 'goldar' . '-' . $str;

        if ($this->validate($rules)) {
            // jika golongan darah dan pmi sama akan ditambah jumlah stok darah saja
            if ($cekStok) {
                $getId = $stok->where('goldar', $this->request->getPost('goldar'))
                    ->where('pmi_id', $this->request->getPost('pmi_id'))
                    ->get()->getRow();

                // berfungsi mengubah str ke int 
                $jmllama = intval($getId->jumlah);
                $jmlbaru = intval($data['jumlah']);

                // dd($slug);
                $stok->save([
                    'id_darah'  => $getId->id_darah,
                    // 'pmi_id'    => $petugas->id_pmi,
                    'pmi_id'    => $data['pmi_id'],
                    'slug'      => $slug,
                    'goldar'    => $data['goldar'],
                    'jumlah'    =>  $jmllama + $jmlbaru,
                ]);
                return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil ditambah');

                // jika  tidak sama maka baru dibuat record stok baru
            } else {
                $stok->save([
                    'pmi_id'    => $data['pmi_id'],
                    'slug'      => $slug,
                    'goldar'    => $data['goldar'],
                    'jumlah'    => $data['jumlah']
                ]);
                return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil ditambah');
            }
        } else {
            $data = [
                'validation'    => $this->validator,
                'petugas'       => $pmi->getPMI(),
            ];
            return view('admin/stok-darah-form', $data);
        }
    }

    public function edit($id)
    {
        $pmi = new PmiModel();
        $stok = new StokModel();
        $data = [
            'darah'         => $stok->getStok($id),
            'validation'    => \config\Services::validation(),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI()
        ];
        return view('admin/stok-darah-edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $stok = new StokModel();
        $pmi = new PmiModel();
        $petugas = $pmi->getPMI();
        // untuk membuat slug
        $lower = strtolower($data['goldar']);
        $str = str_replace("+", "", $lower);
        $goldar = 'goldar' . ' ' . $str;
        $slug = url_title($goldar,  '-', true);

        $rules = [
            'goldar'    => ['rules' => 'required', 'errors' => ['required' => 'golongan darah harus dipilih']],
            'jumlah'    => ['rules' => 'required|alpha_numeric', 'errors' => ['required' => 'jumlah kantong darah tidak boleh kosong', 'alpha_numeric' => 'hanya boleh angka']],
        ];
        if ($this->validate($rules)) {
            $stok->save([
                'id_darah'  => $id,
                // 'pmi_id'    => $petugas->id_pmi,
                'pmi_id'    => $data['pmi_id'],
                'slug'      => $slug,
                'goldar'    => $data['goldar'],
                'jumlah'    => $data['jumlah']
            ]);
            return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil edit');
        } else {
            $data = [
                'darah'         => $stok->find($id),
                'validation'    => $this->validator,
                'petugas'       => $pmi->getPMI(),
            ];
            return view('admin/stok-darah-edit', $data);
        }
    }

    public function softDelete($id)
    {
        $pmi = new PmiModel();
        $stok = new StokModel();
        $data = [
            'darah'         => $stok->getStok($id),
            'validation'    => \config\Services::validation(),
            'pmi'           => $pmi->getAllPMI(),
            'petugas'       => $pmi->getPMI()
        ];
        return view('admin/stok-darah-edit-hapus', $data);
    }
    public function refund($id)
    {
        $stok = new StokModel();
        $stok->save([
            'id_darah'  => $id,
            'deleted_at' => null
        ]);
        return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Stok darah berhasil Dikembalikan');
    }

    public function min($id)
    {
        $stok = new StokModel();
        $data = $this->request->getPost('kurang');
        $rules = [
            'kurang'    => ['rules' => 'required', 'errors' => ['required' => 'Jumlah yang dikurangai tidak boleh kosong']],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('message', 'Jumlah yang dikurangkan tidak boleh kosong');
        }
        // dd($data);
        if ($stok->kurangiStok($id, $data)) {
            return redirect()->back()->with('message', 'Stok darah berhasil dikurangi.');
            // return redirect()->to(site_url('/admin/stok-darah-edit/' . $id))->with('message', 'Stok darah berhasil dikurangi.');
        } else {
            return redirect()->back()->with('message', 'Jumlah Stok Darah yang dikurangkan tidak boleh lebih besar dari sisa stok');
        }
    }

    public function delete($id)
    {
        $stok = new StokModel();
        $data = $this->request->getPost('hapus');
        $stk = $stok->find($id);
        if ($data != $stk['jumlah']) {
            return redirect()->back()->with('error', 'Jumlah Stok Darah yang tersisa Salah');
        } else {
            $stok->delete(['id_stok' => $id]);
        }

        return redirect()->to(site_url('admin/stok-darah'))->with('message', 'Berhasil Hapus Stok Darah');
    }
}
