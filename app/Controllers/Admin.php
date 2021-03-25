<?php

namespace App\Controllers;

use App\Models\AuthPengguna_model;
use App\Models\DataBahan_model;
use App\Models\DataBarang_model;
use App\Models\DataSatuan_model;
use App\Models\DataSupplier_model;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $authPengguna_m, $dataBarang_m, $dataBahan_m, $dataSupplier_m, $dataSatuan_m;

    public function __construct()
    {
        $this->authPengguna_m = new AuthPengguna_model();
        $this->dataBarang_m = new DataBarang_model();
        $this->dataBahan_m = new DataBahan_model();
        $this->dataSupplier_m = new DataSupplier_model();
        $this->dataSatuan_m = new DataSatuan_model();
    }
    public function index()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'validation' => $this->validation,
        ];
        return view('main/admin/index', $data);
    }
    // Satuan
    public function satuan()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getSatuan' => $this->dataSatuan_m->findAll(),
            'validation' => $this->validation,
        ];
        return view('main/admin/satuan', $data);
    }
    public function buat_satuan()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('satuan')) {
                return redirect()->to('/admin/satuan')->withInput();
            }
            $data = [
                'satuan' => strtolower($this->request->getPost('satuan')),
                'created_at' => Time::now('Asia/Jakarta'),
            ];
            $this->dataSatuan_m->save($data);
            return redirect()->to('/admin/satuan')->with('sukses', 'Data satuan berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_satuan($id)
    {
        try {
            $this->dataSatuan_m->where(['id_satuan' => $id])->delete();
            return redirect()->to('/admin/satuan')->with('sukses', 'Data satuan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->to('/admin/satuan')->with('gagal', 'Data tidak bisa dihapus');
        }
    }
    // Bahan
    public function bahan()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getSatuan' => $this->dataSatuan_m->findAll(),
            'getBahan' => $this->dataBahan_m->getBahan(),
            'validation' => $this->validation,
        ];
        return view('main/admin/bahan', $data);
    }
    public function buat_bahan()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('bahan')) {
                return redirect()->to('/admin/bahan')->withInput();
            }
            $data = [
                'nama_bhn' => ucfirst($this->request->getPost('nama_bhn')),
                'id_satuan' => $this->request->getPost('id_satuan'),
            ];
            $this->dataBahan_m->save($data);
            return redirect()->to('/admin/bahan')->with('sukses', 'Data bahan berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_bahan($id)
    {
        $this->dataBahan_m->where(['id_bhn' => $id])->delete();
        return redirect()->to('/admin/bahan')->with('sukses', 'Data bahan berhasil dihapus!');
    }
    public function ubah_bahan($id)
    {
        if ($this->request->getPost()) {
            if (!$this->validate('bahan_ubah')) {
                return redirect()->to('/admin/bahan')->withInput()->with('gagal', 'Terdapat data yang fail pada modal ubah');
            }
            $data = [
                'id_bhn' => $id,
                'nama_bhn' => ucfirst($this->request->getPost('nama_bhn_ubah')),
                'id_satuan' => $this->request->getPost('id_satuan_ubah'),
            ];
            $this->dataBahan_m->save($data);
            return redirect()->to('/admin/bahan')->with('sukses', 'Data bahan berhasil diubah!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    // Supplier
    public function supplier()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getSupplier' => $this->dataSupplier_m->findAll(),
            'validation' => $this->validation,
        ];
        return view('main/admin/supplier', $data);
    }
    public function buat_supplier()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('supplier')) {
                return redirect()->to('/admin/supplier')->withInput();
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
            ];
            $this->dataSupplier_m->save($data);
            return redirect()->to('/admin/supplier')->with('sukses', 'Data supplier berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_supplier($id)
    {
        $this->dataSupplier_m->where(['id_supp' => $id])->delete();
        return redirect()->to('/admin/supplier')->with('sukses', 'Data supplier berhasil dihapus!');
    }
    public function ubah_supplier($id)
    {
        if ($this->request->getPost()) {
            if (!$this->validate('supplier_ubah')) {
                return redirect()->to('/admin/supplier')->withInput()->with('gagal', 'Terdapat data yang fail pada modal ubah');
            }
            $data = [
                'id_supp' => $id,
                'nama' => $this->request->getPost('nama_ubah'),
                'email' => $this->request->getPost('email_ubah'),
                'no_hp' => $this->request->getPost('no_hp_ubah'),
                'alamat' => $this->request->getPost('alamat_ubah'),
            ];
            $this->dataSupplier_m->save($data);
            return redirect()->to('/admin/supplier')->with('sukses', 'Data supplier berhasil diubah!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    // Barang
    public function barang()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getSatuan' => $this->dataSatuan_m->findAll(),
            'getBarang' => $this->dataBarang_m->getBarang(),
            'validation' => $this->validation,
        ];
        return view('main/admin/barang', $data);
    }
    public function buat_barang()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('barang')) {
                return redirect()->to('/admin/barang')->withInput();
            }
            $data = [
                'nama_brg' => ucfirst($this->request->getPost('nama_brg')),
                'id_satuan' => $this->request->getPost('id_satuan'),
            ];
            $this->dataBarang_m->save($data);
            return redirect()->to('/admin/barang')->with('sukses', 'Data barang berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_barang($id)
    {
        $this->dataBarang_m->where(['id_brg' => $id])->delete();
        return redirect()->to('/admin/barang')->with('sukses', 'Data barang berhasil dihapus!');
    }
    public function ubah_barang($id)
    {
        if ($this->request->getPost()) {
            if (!$this->validate('barang_ubah')) {
                return redirect()->to('/admin/barang')->withInput()->with('gagal', 'Terdapat data yang fail pada modal ubah');
            }
            $data = [
                'id_brg' => $id,
                'nama_brg' => ucfirst($this->request->getPost('nama_brg_ubah')),
                'id_satuan' => $this->request->getPost('id_satuan_ubah'),
            ];
            $this->dataBarang_m->save($data);
            return redirect()->to('/admin/barang')->with('sukses', 'Data barang berhasil diubah!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
