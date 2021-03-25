<?php

namespace App\Controllers;

use App\Models\AuthPengguna_model;
use CodeIgniter\I18n\Time;

class Masuk extends BaseController
{
	protected $authPengguna_m;

	public function __construct()
	{
		$this->authPengguna_m = new AuthPengguna_model();
	}
	public function index()
	{
		$data = [
			'judul' => 'Inventory',
			'validation' => $this->validation,
		];
		return view('main/auth/index', $data);
	}
	public function login()
	{
		if ($this->request->getPost()) {
			if (!$this->validate('login')) {
				return redirect()->to('/')->withInput();
			}
			$username = $this->request->getPost('username');
			$password = $this->request->getPost('password');

			$cekPengguna = $this->authPengguna_m->where('username', $username)->first();
			if ($cekPengguna) {
				if (password_verify($password, $cekPengguna['password'])) {
					$data = [
						'id' => $cekPengguna['id'],
						'username' => $cekPengguna['username'],
					];
					$this->session->set($data);
					session()->set($data);
					return redirect()->to('/admin');
				} else {
					return redirect()->to('/')->with('gagal', 'Password anda salah');
				}
			} else {
				return redirect()->to('/')->with('gagal', 'Akun tidak ditemukan');
			}
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	public function registrasi()
	{
		$data = [
			'judul' => 'Inventory',
			'validation' => $this->validation
		];
		return view('main/auth/registrasi', $data);
	}
	public function register()
	{
		if ($this->request->getPost()) {
			if (!$this->validate('registrasi')) {
				return redirect()->to('/masuk/registrasi')->withInput();
			}
			$password = $this->request->getPost('password');
			$data = [
				'username'   => $this->request->getPost('username'),
				'password'   => password_hash($password, PASSWORD_DEFAULT),
				'created_at' => Time::now('Asia/Jakarta'),
				'updated_at' => Time::now('Asia/Jakarta'),
			];
			$this->authPengguna_m->save($data);
			return redirect()->to('/')->with('sukses', 'Akun berhasil dibuat! Silahkan login.');
		} else {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}
	}
	private function _destroySession()
	{
		$array_items = ['id', 'username',];
		$this->session->remove($array_items);
	}
	public function logout()
	{
		$this->_destroySession();
		return redirect()->to('/')->with('sukses', 'Anda berhasil keluar');
	}
}
