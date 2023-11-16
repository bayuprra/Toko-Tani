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
            padding-top: 90px;
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


        .scrolled .page-title nav {
            position: fixed;
            top: 90px;
            opacity: 1;
            left: 0;
            background: white;
            box-shadow: 0 0 30px 10px rgba(0, 0, 0, 0.1);
            right: 0;
            z-index: 996;
            scroll-behavior: smooth;
        }

        .scrolled .blog-details {
            padding-top: 15vh;
        }

        #image-carousel {
            height: 55vh;
        }

        .splide__pagination__page.is-active {
            background: var(--color);
        }

        .icon-box h6 {
            font-weight: bold;
        }


        .stok {
            -webkit-box-align: center;
            align-items: center;
            border: solid 1px var(--NN300, #BFC9D9);
            border-radius: 8px;
            display: inline-flex;
            padding: 3px;
            margin-top: 10px;
            transition: border 120ms cubic-bezier(0.2, 0.64, 0.21, 1) 0s;
            min-width: 70px;
            width: 102px;
        }

        .stok input,
        .stok input:focus {
            border: none;
            outline: none;
            text-align: center;
        }

        .stok input::-webkit-outer-spin-button,
        .stok input::-webkit-inner-spin-button {
            display: none;
        }

        .stok button {
            background-color: transparent;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            flex-shrink: 0;
            height: 24px;
            padding: 0px;
            width: 24px;
            color: var(--color);
            appearance: none;
        }

        .stok button:hover i {
            color: var(--color);
        }

        .subtotal {
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
        }

        .subtotal p:nth-child(1) {
            display: block;
            position: relative;
            font-weight: 400;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 18px;
            letter-spacing: 0px;
            color: var(--NN600, #6D7588);
            text-decoration: initial;
            margin: 0px;
        }

        .subtotal p:nth-child(2) {
            display: block;
            position: relative;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            letter-spacing: 0px;
            color: var(--NN950, #212121);
            text-decoration: initial;
            margin: 0px;
            font-weight: bold;
            font-size: 18px;
            line-height: 26px;
        }

        .button-sidebar {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .button-sidebar form button {
            background-color: var(--NN0, #FFFFFF);
            border: 1px solid var(--color);
            border-radius: 8px;
            color: var(--color);
            cursor: pointer;
            display: block;
            font-family: inherit;
            font-weight: 800;
            font-size: 1rem;
            height: 40px;
            line-height: 20px;
            outline: none;
            position: relative;
            padding: 0px 16px;
            text-indent: initial;
            transition: background-color 300ms ease 0s;
            width: 100%;
            margin: 8px 0px;
        }

        .button-sidebar button {
            background-color: var(--color);
            border: none;
            border-radius: 8px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            display: block;
            font-family: inherit;
            font-weight: 800;
            font-size: 1rem;
            height: 40px;
            line-height: 20px;
            outline: none;
            position: relative;
            padding: 0px 16px;
            text-indent: initial;
            transition: background-color 300ms ease 0s;
            width: 100%;
            margin: 8px 0px;
        }

        .forProduk {
            height: 80vh;
            overflow-x: auto;
        }

        .namaProduk {
            font-weight: bold;
            text-align: justify;
            text-transform: capitalize;
        }

        .varian {
            display: flex;
            flex-direction: column;
        }

        .varian p {
            font-weight: 500;
        }

        .varian .varian-button {
            display: flex;
            flex-wrap: wrap;
            -webkit-box-align: center;
            align-items: center;
            margin-left: -2px;
            gap: 5px;
        }

        .varian .varian-button button {
            -webkit-box-align: center;
            align-items: center;
            vertical-align: top;
            font-size: 1rem;
            line-height: 1.28571rem;
            height: 40px;
            padding: 4px 12px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            border-radius: 12px;
            position: relative;
            cursor: pointer;
            transition: all 0s ease 0s;
            margin: 0px;
            color: var(--color);
            background-color: var(#ECFEF4);
            border: 1px solid var(--color);
        }

        .varian .varian-button button:hover,
        .varian .varian-button .dipilih {
            background: var(--color);
            color: white;
        }

        .stars .yes {
            color: var(--color);
        }

        .nav-pills .nav-link.active {
            background: var(--color);

        }

        .blog-details .content blockquote {
            padding: 10px;
        }

        .sidebar {
            height: auto;
        }

        blockquote {
            border-left: 0.7rem solid var(--color);
        }
    </style>
@endSection

@section('content')
    @php
        use Illuminate\Support\Carbon;

    @endphp
    <main id="main">

        <!-- Blog Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/#produk">{{ $title }}</a></li>
                        <li><a href="/user/{{ $dataKategori['nama'] }}">{{ $dataKategori['nama'] }}</a></li>
                        <li class="current">{{ $dataProduk['nama'] }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->
        <section id="blog-details" class="blog-details">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <section id="image-carousel" class="splide" aria-label="Beautiful Images">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach ($produk as $prod)
                                            <li class="splide__slide">
                                                <img src="{{ asset('produk/' . $prod->gambar) }}" alt="">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-lg-5 forProduk">
                        <article class="article">
                            <h5 class="namaProduk">{{ $dataProduk['nama'] }}
                            </h5>
                            <hr>
                            <div class="varian">
                                <p>Pilih Varian</p>
                                <div class="varian-button">
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @php
                                            $i = 1;
                                            $stat = '';
                                        @endphp
                                        @foreach ($produk as $prod)
                                            @if ($i == 1)
                                                @php $stat = "active" @endphp
                                            @else
                                                @php $stat = " " @endphp
                                            @endif
                                            <button class="nav-link {{ $stat }}" data-bs-toggle="pill"
                                                data-bs-target=".pills-varian-{{ $prod->id }}" type="button"
                                                role="tab" aria-controls="pills-home" aria-selected="true"
                                                onclick="subTotal({{ $prod->id }})"
                                                id="produk{{ $prod->id }}">{{ $prod->nama . $prod->satuan }}</button>
                                            @php $i++ @endphp
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="content">
                                <blockquote>
                                    <div class="tab-content">
                                        @php
                                            $i = 1;
                                            $stat = '';
                                        @endphp
                                        @foreach ($produk as $prod)
                                            @if ($i == 1)
                                                @php $stat = "show active" @endphp
                                            @else
                                                @php $stat = " " @endphp
                                            @endif
                                            <div class="tab-pane fade {{ $stat }} pills-varian-{{ $prod->id }}"
                                                role="tabpanel" aria-labelledby="pills-home-tab"><b>Rp.
                                                    {{ $prod->harga }}</b></div>
                                            @php $i++ @endphp
                                        @endforeach
                                    </div>
                                </blockquote>
                                <h3>Detail</h3>
                                <p>
                                    {{ $dataProduk->deskripsi }}
                                </p>

                            </div><!-- End post content -->
                        </article><!-- End post article -->


                        <div class="comments">

                            <h4 class="comments-count">Review</h4>

                            <div id="comment-2" class="comment">
                                @foreach ($review as $rev)
                                    <div class="d-flex">
                                        <div>
                                            <h5>{{ $rev->customerNama }}
                                                <div class="stars">
                                                    @php
                                                        for ($i = 0; $i < $rev->star; $i++) {
                                                            echo '<i class="bi bi-star-fill yes"></i>';
                                                        }
                                                    @endphp
                                                    @php
                                                        for ($i = 0; $i < 5 - $rev->star; $i++) {
                                                            echo '<i class="bi bi-star-fill"></i>';
                                                        }
                                                    @endphp
                                                </div>
                                                <time
                                                    datetime="2020-01-01">{{ Carbon::parse($rev->updated_at)->locale('id_ID')->isoFormat('D MMMM YYYY') }}</time>
                                                <p>
                                                    {{ $rev->review }}
                                                </p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div><!-- End comment #2-->

                        </div><!-- End blog comments -->

                    </div>

                    <div class="col-lg-3">

                        <div class="sidebar forCart">
                            <div class="icon-box">
                                <h6>Beli atau Keranjang</h6>
                                {{-- <div class="stok">
                                    <button id="minus"><i class="bi bi-dash"></i></button>
                                    <input type="number" name="" id="jml" value="1" style="width: 50%">
                                    <button id="plus"><i class="bi bi-plus"></i></button>
                                </div> --}}
                                <p>Stok :
                                    @php
                                        $i = 1;
                                        $stat = '';
                                    @endphp
                                    @foreach ($produk as $prod)
                                        @if ($i == 1)
                                            @php $stat = "inline" @endphp
                                        @else
                                            @php $stat = "none" @endphp
                                        @endif
                                        <b class="stok-{{ $prod->id }}" style="display: {{ $stat }}">
                                            {{ $prod->qty }}
                                        </b>
                                        @php $i++ @endphp
                                    @endforeach
                                </p>
                            </div>
                            {{-- <div class="icon-box">
                                <div class="subtotal">
                                    <p>SubTotal</p>
                                    <p id="tot">{{ $produk[0]->harga }}</p>
                                </div>
                            </div> --}}
                            <div class="icon-box">
                                <div class="button-sidebar">
                                    {{-- <a href="{{ route('copage') }}"> --}}
                                    <button id="butBuy" data-produkid="{{ $produk[0]->id }}">Beli</button>
                                    {{-- </a> --}}
                                    <form action="{{ route('addKeranjang') }}" method="post" id="tambahKeranjang">
                                        @csrf
                                        <input type="hidden" name="produk_id" id="cartProduk">
                                        <input type="hidden" name="jumlah" id="cartJumlah" value="1">
                                    </form>
                                    <button id="keranjang" data-produkid="{{ $produk[0]->id }}">Keranjang</button>
                                </div>
                            </div>


                        </div><!-- End Sidebar -->

                    </div>

                </div>

            </div>

        </section><!-- End Blog-details Section -->


    </main>
@endSection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'fade',
                rewind: true,
            });

            splide.mount();


        });
        var productData = @json($produk);

        console.log(productData);


        function subTotal(id) {
            var index = productData.findIndex(function(element) {
                return element.id === id;
            });
            $("#butBuy").data("produkid", id);
            $("#keranjang").data("produkid", id);
            $('[class^="stok-"]').hide();
            $('.stok-' + id).show();
        }

        $("#butBuy").click(function() {
            var produkId = $(this).data("produkid");
            let che = 0;
            productData.forEach(function(data, index) {
                if (data.id === produkId) {
                    if (data.qty < 1) {
                        che++;
                    }

                }
            });
            if (che !== 0) {
                return Swal.fire("Stok Habis");
            }
            var url = "{{ route('copage') }}?produkId=" + produkId;
            window.location.href = url;
        });

        $("#keranjang").click(function() {
            var produkId = $(this).data("produkid");
            $("#cartProduk").val(produkId);
            $("#tambahKeranjang").submit();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var productData = @json($produk);

            function dataProduk() {
                $.get('/user/produk/varian/data', function(data) {
                    return data;
                });
            }
            var shopSes = @json(session()->has('cartSuccess'));

            if (shopSes) {
                Swal.fire(@json(session('cartSuccess')));
            }


        });
    </script>
@endSection
