<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $login = [
		'username' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'username jangan kosong',
			]
		],
		'password' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'kata sandi jangan kosong'
			]
		],
	];
	public $registrasi = [
		'username' => [
			'rules' => 'required|alpha_numeric|is_unique[auth_pengguna.username]|min_length[6]|max_length[20]',
			'errors' => [
				'required' => 'username jangan kosong',
				'min_length' => 'username minimal 6 karakter',
				'alpha_numeric' => 'username tidak di izinkan',
				'is_unique' => 'username sudah terdaftar',
				'max_length' => 'username maximal 20 karakter',
			]
		],
		'password' => [
			'rules' => 'required|min_length[6]|matches[rpassword]',
			'errors' => [
				'required' => 'kata sandi jangan kosong',
				'min_length' => 'password terlalu pendek',
				'matches' => 'password tidak sama',
			]
		],
		'rpassword' => [
			'rules' => 'required|min_length[6]|matches[password]',
			'errors' => [
				'required' => 'kata sandi jangan kosong',
				'min_length' => 'password terlalu pendek',
				'matches' => 'password tidak sama',
			]
		],
	];
	public $satuan = [
		'satuan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'satuan jangan kosong',
			]
		],
	];
	public $bahan = [
		'nama_bhn' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'bahan jangan kosong',
			]
		],
		'id_satuan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'satuan jangan kosong',
			]
		],
	];
	public $bahan_ubah = [
		'nama_bhn_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'bahan jangan kosong',
			]
		],
		'id_satuan_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'satuan jangan kosong',
			]
		],
	];
	public $supplier = [
		'nama' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'nama supplier jangan kosong',
			]
		],
		'email' => [
			'rules' => 'valid_email|permit_empty',
			'errors' => [
				'valid_email' => 'email tidak valid',
			]
		],
		'no_hp' => [
			'rules' => 'required|numeric|min_length[9]|max_length[13]',
			'errors' => [
				'required' => 'no handphone supplier jangan kosong',
				'numeric' => 'no handphone tidak valid',
				'min_length' => 'no handphone tidak valid',
				'max_length' => 'no handphone tidak valid',
			]
		],
		'alamat' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'alamat supplier jangan kosong',
			]
		],
	];
	public $supplier_ubah = [
		'nama_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'nama supplier jangan kosong',
			]
		],
		'email_ubah' => [
			'rules' => 'valid_email|permit_empty',
			'errors' => [
				'valid_email' => 'email tidak valid',
			]
		],
		'no_hp_ubah' => [
			'rules' => 'required|numeric|min_length[9]|max_length[13]',
			'errors' => [
				'required' => 'no handphone supplier jangan kosong',
				'numeric' => 'no handphone tidak valid',
				'min_length' => 'no handphone tidak valid',
				'max_length' => 'no handphone tidak valid',
			]
		],
		'alamat_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'alamat supplier jangan kosong',
			]
		],
	];
	public $barang = [
		'nama_brg' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'barang jangan kosong',
			]
		],
		'id_satuan' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'satuan jangan kosong',
			]
		],
	];
	public $barang_ubah = [
		'nama_brg_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'barang jangan kosong',
			]
		],
		'id_satuan_ubah' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'satuan jangan kosong',
			]
		],
	];
	public $buat_bahan_masuk = [
		'tgl_masuk' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'tanggal masuk jangan kosong',
			]
		],
		'id_supp' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'supplier jangan kosong',
			]
		],
		'id_bhn' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'bahan jangan kosong',
			]
		],
		'jml_masuk' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'jumlah masuk jangan kosong',
				'numeric' => 'jumlah masuk tidak valid',
			]
		],
		'total_stok' => [
			'rules' => 'required|numeric|greater_than[-1]',
			'errors' => [
				'required' => 'stok bahan jangan kosong',
				'numeric' => 'jumlah masuk tidak valid',
				'greater_than' => 'terdapat input stok bahan yang minus',
			]
		],
		'stok_awal' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'stok awal jangan kosong',
				'numeric' => 'jumlah masuk tidak valid',
			]
		],
	];
	public $buat_bahan_keluar = [
		'id_brg' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'barang jangan kosong',
			]
		],
		'jml_masuk' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'jumlah barang masuk jangan kosong',
				'numeric' => 'jumlah barang masuk tidak valid',
			]
		],
		'tgl_keluar' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'tanggal keluar jangan kosong',
			]
		],
		'jml_keluar.*' => [
			'rules' => 'required|numeric',
			'errors' => [
				'required' => 'jumlah bahan keluar jangan kosong',
				'numeric' => 'jumlah bahan keluar tidak valid',
			]
		],
		'stok_bahan.*' => [
			'rules' => 'required|greater_than[-1]',
			'errors' => [
				'required' => 'stok bahan jangan kosong',
				'greater_than' => 'terdapat input stok bahan yang minus',
			]
		],
		'total_stok' => [
			'rules' => 'required|numeric|greater_than[-1]',
			'errors' => [
				'required' => 'total stok jangan kosong',
				'numeric' => 'jumlah masuk tidak valid',
				'greater_than' => 'total stok jangan minus',
			]
		],
	];
	public $bahan_ubah_masuk = [
		'id_supp' => [
			'rules' => 'required',
			'errors' => [
				'required' => 'supplier jangan kosong',
			]
		],
	];
}
