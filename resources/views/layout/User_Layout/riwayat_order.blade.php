@extends('layout.User_Layout.main_layout.header')
@section('style')
    <style>
        :root {
            --color: #e84545;
        }

        .header {
            box-shadow: 0 0 30px 10px rgba(0, 0, 0, 0.1);
        }

        .index-page .header {
            opacity: 1;
            background: white;
        }

        main {
            padding-top: 64px;
        }

        .header .logo h1,
        .navmenu a,
        .navmenu .active {
            color: black
        }

        .topHome:hover,
        .topKategori:hover,
        .topKontak:hover,
        .navmenu .active:hover {
            color: black
        }

        .but-login:hover,
        .but-logout:hover {
            color: var(--color);
        }

        .but-login,
        .but-logout {
            border: 2px solid var(--color);
            color: white;
        }

        .but-login,
        .but-logout {
            color: var(--color);
        }

        .shopCart {
            margin-right: 10px;
            border: 2px solid var(--color);
        }

        .shopCart i {
            color: var(--color);
        }

        .blog .posts-list .post-img {
            height: 200px;
        }

        .page-title .heading {
            padding: 80px 0 0 0;
        }

        .con {
            background: #f4f4f4;
            padding: 30px;
        }

        .profil-btn {
            border: 2px solid var(--color);
            color: var(--color);
        }

        .profil-btn-simpan {
            background: var(--color);
            color: white;
        }

        .task {
            position: relative;
            color: #2e2e2f;
            cursor: move;
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: rgba(50, 49, 49, 0.1) 0px 2px 8px 0px;
            margin-bottom: 1rem;
            border: 3px dashed transparent;
        }

        .task:hover {
            box-shadow: rgba(99, 99, 99, 0.3) 0px 2px 8px 0px;
            border-color: rgba(162, 179, 207, 0.2) !important;
        }

        .task p {
            font-size: 15px;
            margin: 0;
        }

        .task p:nth-child(2) {
            opacity: 0.5;
        }

        .tag {
            border-radius: 100px;
            padding: 4px 13px;
            font-size: 12px;
            color: #ffffff;
        }

        .tags {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .options {
            background: transparent;
            border: 0;
            color: #c4cad3;
            font-size: 17px;
        }

        .options svg {
            fill: #9fa4aa;
            width: 30px;
        }

        .task img {
            width: -webkit-fill-available;
        }

        .produkNama {
            font-weight: 400;
            font-size: 14px;
        }

        .namaBarang {
            display: block;
            position: relative;
            font-weight: 800;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            line-height: 16px;
            letter-spacing: 0px;
            color: var(#212121);
            text-decoration: initial;
            max-width: calc(100% - 89px);
            font-size: 1rem;
            margin: 0px 0px 3px;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .totHarga {
            margin-bottom: 0;
        }

        #totalHarga {
            font-weight: bold;
        }

        .buktibayar {
            height: 100%;
            width: 50%;
            align-items: center;
        }

        .pengiriman-kiri {
            width: 20%;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/riwayatOrder.css') }}">
@endSection

@section('content')
    <main id="main">

        <!-- Blog Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>{{ $title }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Section - Blog Page -->
        <section id="blog" class="blog">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="con">
                    <div class="order">
                        @if (count($riwayat) < 1)
                            <p>Anda Belum Pernah Order</p>
                        @endif
                        @php
                            use Carbon\Carbon;
                        @endphp
                        @foreach ($riwayat as $ri)
                            <div class="riwayat">
                                <div class="row topp">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">
                                        <p class="tgl tanggal">{{ Carbon::parse($ri->created_at)->format('d F Y') }}
                                        </p>
                                    </div>
                                    <div class="col">

                                        @php
                                            $con = intval($ri->statusOrderId);
                                            $bac = 'bg-light';
                                            $mess = $ri->statusOrder;
                                            if ($ri->pembayaranBukti == '0') {
                                                $bac = 'bg-danger';
                                                $mess = 'Ditolak';
                                            } elseif ($con === 1) {
                                                $bac = 'bg-danger';
                                            } elseif ($con === 2) {
                                                $bac = 'bg-warning';
                                                $mess = 'Menunggu Konfirmasi';
                                            } elseif ($con === 3) {
                                                $bac = 'bg-info';
                                            } elseif ($con === 4) {
                                                $bac = 'bg-primary';
                                            } elseif ($con === 5) {
                                                $bac = 'bg-success';
                                            }
                                        @endphp
                                        <p class="tgl status {{ $bac }}">{{ $mess }}</p>
                                    </div>
                                </div>
                                <div class="row" style="height: 40%">
                                    <div class="col-1">
                                        <img class="produkImage" src="{{ asset('produk/default.png') }}" alt="">
                                    </div>
                                    <div class="col-9 produkNama">
                                        <p class="namaBarang">{{ $ri->namaMerk }}</p>
                                        <p class="varian">varian: {{ $ri->produkNama . $ri->satuan }}</p>
                                    </div>
                                    <div class="col-2 sumPrice">
                                        <p class="totHarga" data-harga="{{ $ri->total_harga }}">total harga</p>
                                        <p class="namaBarang" id="totalHarga">Rp. {{ $ri->total_harga }}</p>
                                    </div>
                                </div>
                                <div class="row buttUpDet ">
                                    <div class="col-12 mr-0 grupBut">
                                        @if ($con === 5)
                                            <button class="upload">Ulas</button>
                                        @endif
                                        @if ($con === 1)
                                            <button type="button" class="upload" data-toggle="modal"
                                                data-target="#modal-lg-update-{{ $ri->id }}">Upload
                                                Pembayaran</button>
                                        @endif
                                        <button class="detail" data-toggle="modal"
                                            data-target="#modal-lg-detail-{{ $ri->id }}">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </section><!-- End Blog Section -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        @foreach ($riwayat as $ri)
            <div class="modal fade" id="modal-lg-update-{{ $ri->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                </div>
                                <form action="{{ route('uploadPembayaran') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $ri->id }}">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            name="bukti">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-lg-detail-{{ $ri->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Bukti Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="task" draggable="false">
                                        <div class="tags">
                                            @php
                                                $con = intval($ri->statusOrderId);
                                                $bac = 'bg-light';
                                                $statusOrder = $ri->statusOrder;
                                                if ($ri->pembayaranBukti == '0') {
                                                    $bac = 'bg-danger';
                                                    $statusOrder = 'Ditolak';
                                                } elseif ($con === 1) {
                                                    $bac = 'bg-danger';
                                                } elseif ($con === 2) {
                                                    $bac = 'bg-warning';
                                                } elseif ($con === 3) {
                                                    $bac = 'bg-info';
                                                } elseif ($con === 4) {
                                                    $bac = 'bg-primary';
                                                } elseif ($con === 5) {
                                                    $bac = 'bg-success';
                                                }
                                            @endphp
                                            <span class="tag {{ $bac }}">{{ strtoupper($statusOrder) }}</span>
                                            <span class="tag bg-dark">Tanggal
                                                Order:
                                                {{ Carbon::parse($ri->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') .' Jam: ' .Carbon::parse($ri->created_at)->locale('id_ID')->isoFormat('HH:mm:ss') }}</span>

                                        </div>
                                        <div class="row" style="height: 40%; align-items:center">
                                            <div class="col-2">
                                                <img class="produkImage" src="{{ asset('produk/' . $ri->gambar . '') }}"
                                                    alt="">
                                            </div>
                                            <div class="col-8 produkNama">
                                                <p class="namaBarang">{{ $ri->namaMerk }}</p>
                                                <p>Jumlah: {{ $ri->jumlah }}</p>
                                                <p class="varian">varian: {{ $ri->produkNama . $ri->satuan }}</p>
                                            </div>
                                            <div class="col-2 sumPrice">
                                                <p class="totHarga">Total Dibayar</p>
                                                <p class="namaBarang" id="totalHarga">Rp. {{ $ri->total_harga }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="task" draggable="false">
                                        <div class="tags">
                                            <span class="tag bg-secondary">Biodata Customer</span>
                                        </div>
                                        <div>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="pengiriman-kiri">Nama</td>
                                                        <td>{{ $ri->customerNama }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pengiriman-kiri">Nomor Telepon</td>
                                                        <td>{{ $ri->customerPhone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pengiriman-kiri">Alamat</td>
                                                        <td>{{ $ri->customerAlamat }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="task" draggable="false">
                                        <div class="tags">
                                            <span class="tag bg-secondary">Bukti Pembayaran</span>
                                        </div>
                                        <div class="row"
                                            style="height: 30vh; align-items:center;justify-content:center;">
                                            @if (!$ri->pembayaranId)
                                                <p>Belum Ada Pembayaran</p>
                                            @elseif ($ri->pembayaranBukti == '0')
                                                <p>Pembayaran Ditolak, Harap Upload Data yang Benar dan Jelas</p>
                                                <br>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <form action="{{ route('uploadPembayaran') }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="order_id"
                                                            value="{{ $ri->id }}">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01" name="bukti">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose
                                                                file</label>
                                                        </div>

                                                </div>
                                            @else
                                                <img class="buktibayar"
                                                    src="{{ asset('pembayaran/' . $ri->pembayaranBukti) }}"
                                                    alt="" style="height: 100%;width: 50%;align-items: center;">
                                            @endif






                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="task" draggable="false">
                                        <div class="tags">
                                            <span class="tag bg-secondary">Info Pengiriman</span>
                                        </div>
                                        <div>
                                            @if (intval($ri->statusOrderId) === 4)
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td class="pengiriman-kiri">Kurir</td>
                                                            <td>JNE</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pengiriman-kiri">No Resi</td>
                                                            <td>009876</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pengiriman-kiri">Alamat</td>
                                                            <td>{{ $ri->customerNama }}<br />{{ $ri->customerPhone }}<br />{{ $ri->customerAlamat }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                            @if (intval($ri->statusOrderId) === 3)
                                                <p>Penjual Akan Segera Mengemas Barang dan Mengirimkan Barang</p>
                                            @else
                                                <p>Tidak Ada Info</p>
                                            @endif



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </main>
@endSection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })

        });
    </script>
@endSection
