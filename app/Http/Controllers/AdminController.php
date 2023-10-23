<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{


    /**\ Dashboard */
    public function dashboard()
    {
        return view('layout/Admin_Layout/dashboard', [
            'title'     => "Dashboard",
            'folder'    => "Home",
        ]);
    }

    /**\ Customer */

    public function dataCustomer()
    {
        return view('layout/Admin_Layout/customer/data_customer', [
            'title'     => "Data Customer",
            'folder'    => "Customer",
            'data'      => $this->customerModel->get()
        ]);
    }

    //<---- Produk ---->

    /**\ Tampilan */

    public function dataProduk()
    {
        $data = array(
            'title'     => "Data Produk",
            'folder'    => "Produk",
            'data'      => $this->produkModel->getAllData(),
            'kategori'  => $this->kategoriModel->get(),
            'merk'      => $this->merkModel->get()
        );
        return view('layout/Admin_Layout/produk/data_produk', $data);
    }

    /**\ Create */
    public function storeProduk(Request $request)
    {
        $data = $request->all();
        if (!$this->kategoriModel->find(intval($data['kategori'])) || !$this->merkModel->find(intval($data['merk']))) {
            return redirect()->back()->with('error', 'Produk Gagal Ditambahkan');
        }

        $merk = $this->merkModel->find(intval($data['merk']));
        $name = $merk->nama . $data['nama'] . ".png";
        if ($request->hasFile('gambar')) {
            if ($this->produkModel->where('gambar', '=', $name)->first()) {
                $name = $this->random_string() . ".png";
            }
            $request->file('gambar')->move('produk/', $name);
        } else {
            $name = "default.png";
        }

        $data['gambar'] = $name;
        $dataToInserted = ([
            'nama'                  => $data['nama'],
            'kategori_produk_id'    => intval($data['kategori']),
            'merk_produk_id'        => intval($data['merk']),
            'satuan'                => $data['satuan'],
            'harga'                 => intval($data['harga']),
            'qty'                   => intval($data['qty']),
            'gambar'                => $data['gambar'],

        ]);

        $insertedProduk = $this->produkModel::create($dataToInserted);
        if ($insertedProduk) {
            return redirect()->back()->with('success', 'Produk Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Produk Gagal Ditambahkan');
    }

    /**\ Update */
    public function updateProduk(Request $request, $id)
    {
        $dataForm = $request->all();
        $dataForm['gambar'] = $request->file('gambar') ?? '';
        $data = $this->produkModel->find($id);

        if ($dataForm['gambar'] && $dataForm['gambar'] != $data['gambar'] && $data['gambar'] != "default.png") {
            $path = public_path('produk/' . $data['gambar']);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $merk = $this->merkModel->find(intval($dataForm['merk']));
        $name = $merk->nama . $dataForm['nama'] . ".png";
        if ($this->produkModel->where('gambar', '=', $name)->first()) {
            $name = $this->random_string() . ".png";
        }
        $request->file('gambar')->move('produk/', $name);
        $dataForm['gambar'] = $name;
        $updateData = $data->update($dataForm);
        if ($updateData) {
            return redirect()->back()->with('success', 'Produk Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Produk Gagal Diubah');
    }

    /**\ Delete */
    public function deleteProduk($id)
    {
        $data = $this->produkModel->find($id);
        if ($data['gambar'] != "default.png") {
            $path = public_path('produk/' . $data['gambar']);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Kategori Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Dihapus');
    }

    //<---- Kategori ---->

    /**\ Read */
    public function kategoriProduk()
    {
        return view('layout/Admin_Layout/produk/kategori_produk', [
            'title'     => "Kategori Produk",
            'folder'    => "Produk",
            'data'      => $this->kategoriModel->get()
        ]);
    }

    /**\ Create */
    public function storeKategori(Request $request)
    {
        $data = $request->all();
        $data['deskripsi'] == null ? $data['deskripsi'] = " " : "";
        $insertedKategori = $this->kategoriModel::create($data);
        if ($insertedKategori) {
            return redirect()->back()->with('success', 'Kategori Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Ditambahkan');
    }

    /**\ Update */
    public function updateKategori(Request $request, $id)
    {
        $data = $this->kategoriModel->find($id);

        if (!$request->deskripsi) {
            $request['deskripsi'] = " ";
        }
        $updateData = $data->update($request->all());
        if ($updateData) {
            return redirect()->back()->with('success', 'Kategori Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Diubah');
    }

    /**\ Delete */
    public function deleteKategori($id)
    {
        $data = $this->kategoriModel->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Kategori Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Kategori Gagal Dihapus');
    }


    //<---- Merk ---->

    /**\ Read */

    public function merkProduk()
    {
        return view('layout/Admin_Layout/produk/merk_produk', [
            'title'     => "Merk Produk",
            'folder'    => "Produk",
            'data'      => $this->merkModel->get()
        ]);
    }

    /**\ Create */
    public function storeMerk(Request $request)
    {
        $data = $request->all();
        $data['deskripsi'] == null ? $data['deskripsi'] = " " : "";
        $insertedMerk = $this->merkModel::create($data);
        if ($insertedMerk) {
            return redirect()->back()->with('success', 'Merk Berhasil Ditambahkan');
        }
        return redirect()->back()->with('error', 'Merk Gagal Ditambahkan');
    }

    /**\ Update */
    public function updateMerk(Request $request, $id)
    {
        $data = $this->merkModel->find($id);

        if (!$request->deskripsi) {
            $request['deskripsi'] = " ";
        }
        $updateData = $data->update($request->all());
        if ($updateData) {
            return redirect()->back()->with('success', 'Merk Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Merk Gagal Diubah');
    }

    /**\ Delete */
    public function deleteMerk($id)
    {
        $data = $this->merkModel->find($id);
        $deleteData = $data->delete();
        if ($deleteData) {
            return redirect()->back()->with('success', 'Merk Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Merk Gagal Dihapus');
    }


    function random_string($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
