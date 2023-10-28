<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title'     => "Home",
            'kategori'  => $this->kategoriModel->get()
        );
        return view('layout/User_Layout/main_layout/main', $data);
    }

    public function produk($produk)
    {
        $dataKategori = $this->kategoriModel->where('nama', strtoupper($produk))->first();
        $idKategori = $dataKategori['id'] ?? 0;
        if ($idKategori == 0) {
            return "";
        }
        $dataProduk = $this->produkModel->produkByKategori($idKategori)->paginate(9);
        $data = array(
            'title'         => "Kategori",
            'kategori'      => $this->kategoriModel->get(),
            'dataKategori'  => $dataKategori,
            'data'          => $dataProduk
        );
        // dd($data);
        return view('layout/User_Layout/produk', $data);
    }
}
