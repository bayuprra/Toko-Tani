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
                                    <div class="col-2">
                                        @php
                                            $stat = strtolower($ri->status) == 'belum dibayar' ? 'bg-danger' : 'bg-success';
                                        @endphp

                                        <p class="tgl status {{ $stat }}">{{ $ri->status }}</p>
                                    </div>
                                </div>
                                <div class="row" style="height: 40%">
                                    <div class="col-1">
                                        <img class="produkImage" src="{{ asset('produk/default.png') }}" alt="">
                                    </div>
                                    <div class="col-9 produkNama">
                                        <p class="namaBarang">{{ $ri->namaMerk }}</p>
                                        <p class="varian">varian: {{ $ri->nama . $ri->satuan }}</p>
                                    </div>
                                    <div class="col-2 sumPrice">
                                        <p class="totHarga" data-harga="{{ $ri->total_harga }}">total harga</p>
                                        <p class="namaBarang" id="totalHarga">Rp. {{ $ri->total_harga }}</p>
                                    </div>
                                </div>
                                <div class="row buttUpDet ">
                                    <div class="col-12 mr-0 grupBut">
                                        <button class="upload">Ulas</button>
                                        <button class="upload">Upload Pembayaran</button>
                                        <button class="detail">Lihat Detail</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </section><!-- End Blog Section -->

        <section class="footer-profil">

        </section>
    </main>
@endSection

@section('script')
    <script>
        $(document).ready(function() {


        });
    </script>
@endSection
