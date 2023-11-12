<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
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
        dump($data);
        return view('layout/User_Layout/riwayat_order', $data);
    }
    public function store(Request $request)
    {
        $data = $request->all();

        $inserted = array(
            'produk_id'     => intval($data['idBarang']),
            'customer_id'   => intval(session()->get('data')->id_customer),
            'status_order_id'  => 1,
            'jumlah'        => intval($data['jumlahBarang']),
            'pembayaran'    => "",
            'total_harga'   => intval($data['totalHargaBarang'])
        );
        $insertedOrder = $this->orderModel::create($inserted);
        if ($insertedOrder) {
            return redirect()->to('/riwayat')->with('success', 'Order Berhasil DIbuat');
        }
        return redirect()->back()->with('error', 'Order Gagal Dibuat');
    }

    public function uploadPembayaran(Request $request)
    {
        $data = $request->all();
        $tanggalWaktu = now()->format('Y-m-d_H-i-s'); // Format tanggal dan waktu tanpa karakter non-valid
        $data['bukti'] = $request->file('bukti') ?? '';
        $extension = $data['bukti']->getClientOriginalExtension();
        $name = $data['order_id'] . "-bayar-" . $tanggalWaktu . "." . $extension;

        // Ganti karakter non-valid (spasi dan titik dua) dengan karakter underscore
        $name = str_replace([' ', ':'], '_', $name);

        $request->file('bukti')->move('pembayaran/', $name);
        $data['bukti'] = $name;
        $inserted = array(
            'order_id'     => intval($data['order_id']),
            'bukti'   => $data['bukti'],
            'status'  => 0,
        );
        $dataOrder = $this->orderModel->find($data['order_id']);
        $updateData = $dataOrder->update([
            'status_order_id' => 2,
        ]);
        $insertedPembayaran = $this->pembayaranModel::create($inserted);

        if ($insertedPembayaran && $updateData) {
            return redirect()->back()->with('success', 'Pembayaran Berhasil Diupload');
        }
        return redirect()->back()->with('error', 'Pembayaran Gagal Diupload');
    }
}
