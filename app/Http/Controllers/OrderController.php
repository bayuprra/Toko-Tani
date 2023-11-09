<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function riwayat()
    {
        $id = session()->get('data')->id_customer;
        $data = array(
            'title'     => "Riwayat Order",
            'kategori'  => $this->kategoriModel->get(),
            'riwayat'   => $this->orderModel->getOrderById($id)
        );
        return view('layout/User_Layout/riwayat_order', $data);
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $inserted = array(
            'produk_id'     => intval($data['idBarang']),
            'customer_id'     => intval(session()->get('data')->id_customer),
            'jumlah'        => intval($data['jumlahBarang']),
            'status'        => "Belum Dibayar",
            'pembayaran'    => "",
            'total_harga'   => intval($data['totalHargaBarang'])
        );
        $insertedOrder = $this->orderModel::create($inserted);
        if ($insertedOrder) {
            return redirect()->to('/')->with('success', 'Order Berhasil DIbuat');
        }
        return redirect()->back()->with('error', 'Order Gagal Dibuat');
    }
}
