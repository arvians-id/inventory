<?php

namespace App\Controllers;

use App\Models\AuthPengguna_model;
use App\Models\DataBahan_model;
use App\Models\DataBahanKeluar_model;
use App\Models\DataBahanMasuk_model;
use App\Models\DataBarang_model;
use App\Models\DataBarangMasuk_model;
use App\Models\DataSatuan_model;
use App\Models\DataSupplier_model;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $authPengguna_m, $dataBarang_m, $dataBahan_m, $dataSupplier_m, $dataSatuan_m, $dataBahanMasuk_m, $dataBahanKeluar_m, $dataBarangMasuk_m;

    public function __construct()
    {
        $this->authPengguna_m = new AuthPengguna_model();
        $this->dataBarang_m = new DataBarang_model();
        $this->dataBahan_m = new DataBahan_model();
        $this->dataSupplier_m = new DataSupplier_model();
        $this->dataSatuan_m = new DataSatuan_model();
        $this->dataBahanMasuk_m = new DataBahanMasuk_model();
        $this->dataBahanKeluar_m = new DataBahanKeluar_model();
        $this->dataBarangMasuk_m = new DataBarangMasuk_model();
    }
    public function index()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'countSatuan' => $this->dataSatuan_m->countSatuan(),
            'countBahan' => $this->dataBahan_m->countBahan(),
            'countSupplier' => $this->dataSupplier_m->countSupplier(),
            'countBarang' => $this->dataBarang_m->countBarang(),
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
        try {
            $this->dataBahan_m->where(['id_bhn' => $id])->delete();
            return redirect()->to('/admin/bahan')->with('sukses', 'Data bahan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->to('/admin/bahan')->with('gagal', 'Data tidak bisa dihapus');
        }
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
        try {
            $this->dataSupplier_m->where(['id_supp' => $id])->delete();
            return redirect()->to('/admin/supplier')->with('sukses', 'Data supplier berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->to('/admin/supplier')->with('gagal', 'Data tidak bisa dihapus');
        }
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
        try {
            $this->dataBarang_m->where(['id_brg' => $id])->delete();
            return redirect()->to('/admin/barang')->with('sukses', 'Data barang berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->to('/admin/barang')->with('gagal', 'Data tidak bisa dihapus');
        }
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
    // Bahan Masuk
    public function bahan_masuk()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getBahanMasuk' => $this->dataBahanMasuk_m->getBahanMasuk(),
            'validation' => $this->validation,
            'getSupplier' => $this->dataSupplier_m->findAll(),
        ];
        return view('main/admin/bahan_masuk', $data);
    }
    public function buat_bahan_masuk()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getBahan' => $this->dataBahan_m->getBahan(),
            'getSupplier' => $this->dataSupplier_m->findAll(),
            'validation' => $this->validation,
        ];
        return view('main/admin/buat_bahan_masuk', $data);
    }
    public function create_bahan_masuk()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('buat_bahan_masuk')) {
                return redirect()->to('/admin/buat_bahan_masuk')->withInput();
            }
            $idBhn = $this->request->getPost('id_bhn');
            $data = [
                'id_bhn' => $idBhn,
                'id_supp' => $this->request->getPost('id_supp'),
                'jml_masuk' => $this->request->getPost('jml_masuk'),
                'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            ];
            $this->dataBahanMasuk_m->save($data);

            $dataBahan = [
                'id_bhn' => $idBhn,
                'total_stok' => $this->request->getPost('total_stok')
            ];
            $this->dataBahan_m->save($dataBahan);
            return redirect()->to('/admin/bahan_masuk')->with('sukses', 'Data transaksi bahan masuk berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_bahan_masuk($id)
    {
        $getJmlMasuk = $this->dataBahanMasuk_m->getBahanMasukById($id);
        $stokBahan = $this->dataBahan_m->getBahanById($getJmlMasuk['id_bhn']);
        if (($stokBahan['total_stok'] - $getJmlMasuk['jml_masuk']) < 0) {
            return redirect()->to('/admin/bahan_masuk')->with('gagal', 'Gagal menghapus, stok tidak boleh minus');
        } else {
            if ($this->dataBahanMasuk_m->deleteBahanMasuk($id) !== FALSE) {
                return redirect()->to('/admin/bahan_masuk')->with('sukses', 'Data bahan masuk berhasil dihapus!');
            }
        }
    }
    public function ubah_bahan_masuk($id)
    {
        if ($this->request->getPost()) {
            if (!$this->validate('bahan_ubah_masuk')) {
                return redirect()->to('/admin/bahan_masuk')->withInput()->with('gagal', 'Terdapat data yang fail pada modal ubah');
            }
            $data = [
                'id_bhn_msk' => $id,
                'id_supp' => $this->request->getPost('id_supp'),
                'updated_at' => Time::now('Asia/Jakarta')
            ];
            $this->dataBahanMasuk_m->save($data);
            return redirect()->to('/admin/bahan_masuk')->with('sukses', 'Data bahan masuk berhasil diubah!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    // Bahan Keluar
    public function bahan_keluar()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getBahanKeluar' => $this->dataBahanKeluar_m->getBahanKeluar()
        ];
        return view('main/admin/bahan_keluar', $data);
    }
    public function buat_bahan_keluar()
    {
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getBahan' => $this->dataBahan_m->getBahan('findnull'),
            'getBarang' => $this->dataBarang_m->findAll(),
            'validation' => $this->validation,
        ];
        return view('main/admin/buat_bahan_keluar', $data);
    }
    public function create_bahan_keluar()
    {
        if ($this->request->getPost()) {
            if (!$this->validate('buat_bahan_keluar')) {
                return redirect()->to('/admin/buat_bahan_keluar')->withInput();
            }
            $tanggal = $this->request->getPost('tgl_keluar');
            $totalStokBahan = $this->request->getPost('stok_bahan');
            $idBhn = $this->request->getPost('id_bhn');
            $jml_keluar = $this->request->getPost('jml_keluar');
            $idBrg = $this->request->getPost('id_brg');
            $dataBarangMasuk = [
                'id_brg' => $idBrg,
                'jml_masuk' => $this->request->getPost('jml_masuk'),
                'tgl_masuk' => $tanggal,
                'created_at' => Time::now('Asia/Jakarta'),
                'updated_at' => Time::now('Asia/Jakarta')
            ];

            if ($this->dataBahanKeluar_m->insertBahanKeluarBarangMasuk($dataBarangMasuk, $idBhn, $jml_keluar, $tanggal, $totalStokBahan) != FALSE) {
                $dataBarang = [
                    'id_brg' => $idBrg,
                    'total_stok' => $this->request->getPost('total_stok')
                ];
                $this->dataBarang_m->save($dataBarang);
            }
            return redirect()->to('/admin/bahan_keluar')->with('sukses', 'Data transaksi bahan keluar berhasil ditambahkan!');
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    // Barang Masuk
    public function barang_masuk($id = null)
    {
        if ($id != null) {
            $data = [
                'judul' => 'Inventory',
                'getAdmin' => $this->authPengguna_m->getAdminBySession(),
                'getBahanKeluar' => $this->dataBahanKeluar_m->getBahanKeluar($id),
                'getBarangMasuk' => $this->dataBarangMasuk_m->getBarangMasukById($id)
            ];
            return view('main/admin/detail_barang_masuk', $data);
        }
        $data = [
            'judul' => 'Inventory',
            'getAdmin' => $this->authPengguna_m->getAdminBySession(),
            'getBarangMasuk' => $this->dataBarangMasuk_m->getBarangMasuk()
        ];
        return view('main/admin/barang_masuk', $data);
    }
    public function hapus_barang_masuk($id)
    {
        if ($this->dataBarangMasuk_m->deleteBarangMasuk($id) !== FALSE) {
            return redirect()->to('/admin/barang_masuk')->with('sukses', 'Data barang masuk berhasil dihapus!');
        }
    }
}
