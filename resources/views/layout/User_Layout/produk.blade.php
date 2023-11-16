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


        /* rating */
        .rating:not(:checked)>input {
            position: absolute;
            appearance: none;
        }

        .rating:not(:checked)>label {
            float: right;
            cursor: pointer;
            font-size: 30px;
            color: #666;
        }

        .rating:not(:checked)>label:before {
            content: '★';
        }

        .rating>input:checked~label {
            color: #ffa723;
        }

        .active>.page-link {
            background: var(--color);
            border: none
        }
    </style>
@endSection

@section('content')
    <main id="main">

        <!-- Blog Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>{{ $dataKategori->nama ?? '' }}</h1>
                            <p class="mb-0">{{ $dataKategori->deskripsi ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/#services">{{ $title }}</a></li>
                        <li class="current">{{ $dataKategori->nama ?? '' }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <!-- Blog Section - Blog Page -->
        <section id="blog" class="blog">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 posts-list">
                    @foreach ($data as $produk)
                        <div class="col-xl-3 col-lg-2 col-2">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('produk/' . $produk->gambar) }}" alt="{{ $produk->gambar }}"
                                        class="img-fluid" style="width: 100%;height:100%">
                                </div>

                                <p class="post-category">{{ $produk->kategori }}</p>

                                <h2 class="title">
                                    <a href="/user/{{ $produk->kategori }}/{{ $produk->merk }}">{{ $produk->merk }}</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    @foreach ($star as $sta)
                                        @if ($sta->merkId == $produk->merk_produk_id)
                                            @php
                                                $newAvg = 0;
                                                $avg = (int) $sta->totalStar / $sta->jumlahReview;
                                                if ($avg == 5) {
                                                    $newAvg = 5;
                                                } elseif ($avg < 5 && $avg > 3.9) {
                                                    $newAvg = 4;
                                                } elseif ($avg < 4 && $avg > 2.9) {
                                                    $newAvg = 3;
                                                } elseif ($avg < 3 && $avg > 2.9) {
                                                    $newAvg = 2;
                                                } else {
                                                    $newAvg = 1;
                                                }

                                            @endphp
                                            <div class="rating">
                                                <input value="5" name="rate" id="star5" type="radio" disabled
                                                    {{ $newAvg == 5 ? 'checked' : '' }}>
                                                <label title="text" for="star5"></label>
                                                <input value="4" name="rate" id="star4" type="radio" disabled
                                                    {{ $newAvg == 4 ? 'checked' : '' }}>
                                                <label title="text" for="star4"></label>
                                                <input value="3" name="rate" id="star3" type="radio" disabled
                                                    {{ $newAvg == 3 ? 'checked' : '' }}>
                                                <label title="text" for="star3"></label>
                                                <input value="2" name="rate" id="star2" type="radio" disabled
                                                    {{ $newAvg == 2 ? 'checked' : '' }}>
                                                <label title="text" for="star2"></label>
                                                <input value="1" name="rate" id="star1" type="radio" disabled
                                                    {{ $newAvg == 1 ? 'checked' : '' }}>
                                                <label title="text" for="star1"></label>
                                            </div>
                                        @else
                                            <p>Belum Ada Ulasan</p>
                                        @endif
                                    @endforeach
                                </div>

                            </article>
                        </div><!-- End post list item -->
                    @endforeach
                    @if (count($data) < 1)
                        <p>Produk Tidak Ditemukan</p>
                    @endif
                </div><!-- End blog posts list -->
                {{ $data->links() }}

            </div>

        </section><!-- End Blog Section -->

    </main>
@endSection

@section('script')
@endSection
