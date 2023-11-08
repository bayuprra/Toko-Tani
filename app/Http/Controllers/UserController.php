<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title'     => "Home",
            'kategori'  => $this->kategoriModel->get(),
            'produk'    => $this->produkModel->get()
        );
        return view('layout/User_Layout/main_layout/main', $data);
    }

    public function kategori($produk)
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

    public function produk($kategori, $produk)
    {
        $dataKategori = $this->kategoriModel->where('nama', strtoupper($kategori))->first();
        $dataProduk = $this->merkModel->where('nama', $produk)->get()->first();

        $data = array(
            'title'         => "Produk",
            'kategori'      => $this->kategoriModel->get(),
            'dataKategori'  => $dataKategori,
            'dataProduk'    => $dataProduk,
            'produk'        => $this->produkModel->produkByKategoriMerkId($dataKategori['id'], $dataProduk['id']) ?? ""
        );
        session(['produk'   => $data['produk']]);

        return view('layout/User_Layout/produk_detail', $data);
    }
    public function checkout(Request $request)
    {
        $produkId = $request->query('produkId');
        $data = array(
            'title'         => "Produk",
            'kategori'      => $this->kategoriModel->get(),
            'produk'        => $this->produkModel->getDataById($produkId),
            'data'        => session()->get('data')
        );
        return view('layout/User_Layout/checkout', $data);
    }

    public function getVarian()
    {
        if (session()->exists('produk')) {
            return response()->json(session('produk'));
        }
        return response()->json(" ");
    }

    public function profil()
    {
        $id = session()->get('data')->id_customer;
        $dat = $this->customerModel->profil($id);

        $kab = "";
        $kec = "";
        $det = "";
        if ($dat->alamat != "") {

            $alamat = explode(',', $dat->alamat);
            $kab = str_replace(' Kabupaten ', '', $alamat[count($alamat) - 2]);
            $kec = str_replace(' Kecamatan ', '', $alamat[count($alamat) - 3]);
            $det = "";
            for ($i = 0; $i < count($alamat) - 3; $i++) {
                $det .= $alamat[$i];
            }
        }

        $dat->kab = $kab;
        $dat->kec = $kec;
        $dat->det = $det;
        $data = array(
            'title'     => "Profil",
            'kategori'      => $this->kategoriModel->get(),
            'data'      => $dat
        );
        return view('layout/User_layout/profil', $data);
    }

    public function editProfil(Request $request)
    {
        $data = $request->all();
        $id = session()->get('data')->id_customer;
        $customerData = $this->customerModel->find($id);
        $prov = "Kep. Bangka Belitung";
        $kab = $data['kabupaten'];
        $kec = $data['kecamatan'];
        $det = $data['detail'];
        $alamat = $det . ", Kecamatan " . $kec . ", Kabupaten " . $kab . ", Provinsi " . $prov;
        $customerDataEdit = array(
            "nama"      => $data['nama'],
            "phone"      => $data['phone'],
            "alamat"      => $alamat,
        );

        $accountData = $this->accountModel->find($customerData['account_id']);
        $accountDataEdit = array(
            'email' => $data['email']
        );
        $updateData = $customerData->update($customerDataEdit);
        $updateDataAccount = $accountData->update($accountDataEdit);
        if ($updateData && $updateDataAccount) {
            return redirect()->back()->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Data Gagal Diubah');
    }
}
