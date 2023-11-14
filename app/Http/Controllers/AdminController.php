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

    //<---- Customer ---->

    /**\ Tampilan */

    public function dataCustomer()
    {
        return view('layout/Admin_Layout/customer/data_customer', [
            'title'     => "Data Customer",
            'folder'    => "Customer",
            'data'      => $this->customerModel->get() ?? ""
        ]);
    }

    /**\ Update */
    public function updateCustomer(Request $request, $id)
    {
        $dataForm = $request->all();
        $data = $this->customerModel->find($id);
        if (!$dataForm['phone']) {
            $dataForm['phone'] = " ";
        }
        if (!$dataForm['alamat']) {
            $dataForm['alamat'] = " ";
        }
        $updateData = $data->update($dataForm);
        if ($updateData) {
            return redirect()->back()->with('success', 'Customer Berhasil Diubah');
        }
        return redirect()->back()->with('error', 'Customer Gagal Diubah');
    }

    /**\ Delete */
    public function deleteCustomer($id)
    {
        $data = $this->customerModel->find($id);
        $account = $this->accountModel->find($data->account_id);

        $deleteData = $data->delete();
        $deleteDataAkun = $account->delete();

        if ($deleteData && $deleteDataAkun) {
            return redirect()->back()->with('success', 'Customer Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Customer Gagal Dihapus');
    }

    //<---- Produk ---->

    /**\ Tampilan */

    public function dataProduk()
    {
        $data = array(
            'title'     => "Data Produk",
            'folder'    => "Produk",
            'data'      => $this->produkModel->getAllData() ?? "",
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


    // Order
    function dataOrder()
    {
        $data = array(
            'title'     => "Data Order",
            'folder'    => "Order",
            'data'      => $this->orderModel->getAllOrder(),
            'pembayaran' => $this->pembayaranModel->get()
        );
        dump($data);
        return view('layout/Admin_Layout/order/data_order', $data);
    }
    function dataPembayaran()
    {
        $data = array(
            'title'     => "Data Pembayaran",
            'folder'    => "Order",
            'data'      => $this->pembayaranModel->getAllOrder(),
        );
        dump($data);
        return view('layout/Admin_Layout/order/data_transaksi', $data);
    }

    function dataPengiriman()
    {
        $data = array(
            'title'     => "Data Pengiriman",
            'folder'    => "Order",
            'data'      => $this->pengirimanModel->getAllOrder(),
        );
        dump($data);
        return view('layout/Admin_Layout/order/data_pengiriman', $data);
    }

    public function verifikasiPembayaran(Request $request)
    {
        $data = $request->all();
        $pembayaran = $this->pembayaranModel->find($data['pembayaran_id']);

        $produk = $this->produkModel->find($data['produk_id']);
        $updateProduk = $produk->update([
            'qty'   => intval($produk['qty']) - intval($data['jumlah'])
        ]);

        if ($data['stat'] == 1) {
            $updateData = $pembayaran->update([
                'status' => 1,
            ]);

            $order = $this->orderModel->find($data['order_id']);
            $updateOrder = $order->update([
                'status_order_id' => 3,
            ]);

            $inserted = array(
                'order_id'     => intval($data['order_id']),
                'kurir'   => "",
                'no_resi'  => "",
                'status'        => 0,
            );
            $insertedPengiriman = $this->pengirimanModel::create($inserted);
            if ($updateData && $updateOrder && $insertedPengiriman && $updateProduk) {

                return redirect()->back()->with('success', 'Pembayaran Berhasil Diverifikasi');
            }
            return redirect()->back()->with('error', 'Pembayaran Gagal Diverifikasi');
        }

        $path = public_path('pembayaran/' . $pembayaran['bukti']);
        if (File::exists($path)) {
            File::delete($path);
        }
        $updateData = $pembayaran->update([
            'bukti'     => "0",
        ]);
        if ($updateData) {

            return redirect()->back()->with('success', 'Pembayaran Berhasil Ditolak');
        }
        return redirect()->back()->with('error', 'Pembayaran Gagal Ditolak');
    }

    public function verifikasiPengiriman(Request $request)
    {
        $data = $request->all();
        $order = $this->orderModel->find($data['order_id']);
        $updateOrder = $order->update([
            'status_order_id' => 4,
        ]);

        $inserted = array(
            'kurir'   => $data['kurir'],
            'no_resi'  => $data['no_resi'],
            'status'        => 1,
        );
        $updatePengiriman = $this->pengirimanModel->find($data['pengiriman_id']);
        $insertedPengiriman = $updatePengiriman->update($inserted);
        if ($updateOrder && $insertedPengiriman) {

            return redirect()->back()->with('success', 'Pengiriman Berhasil Diinput');
        }
        return redirect()->back()->with('error', 'Pengiriman Gagal Diinput');
    }
}
