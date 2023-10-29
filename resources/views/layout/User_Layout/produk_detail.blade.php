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

        .button-sidebar button:nth-child(1) {
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

        .button-sidebar button:nth-child(2) {
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
                            <h1>d</h1>
                            <p class="mb-0"> </p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="/#services">{{ $title }}</a></li>
                        <li class="current"></li>
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
                                        <li class="splide__slide">
                                            <img src="{{ asset('assets/img/slider/bibit.jpg') }}" alt="">
                                        </li>

                                        <li class="splide__slide">
                                            <img src="{{ asset('assets/img/slider/bibit2.jpg') }}" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-lg-5 forProduk">
                        <article class="article">
                            <h5 class="namaProduk">Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia
                            </h5>
                            <hr>
                            <div class="varian">
                                <p>Pilih Varian</p>
                                <div class="varian-button">
                                    <button>2Liter</button>
                                    <button>1Liter</button>
                                </div>
                            </div>
                            <div class="content">
                                <blockquote>
                                    <p>
                                        Rp. 50.000
                                    </p>
                                </blockquote>
                                <h3>Detail</h3>
                                <p>
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum earum possimus molestias
                                    consectetur placeat ea corporis aspernatur suscipit officia, vitae assumenda natus alias
                                    inventore illo repellat vel esse reiciendis officiis?
                                </p>

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                {{-- <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">Business</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    <li><a href="#">Creative</a></li>
                                    <li><a href="#">Tips</a></li>
                                    <li><a href="#">Marketing</a></li>
                                </ul> --}}
                            </div><!-- End meta bottom -->

                        </article><!-- End post article -->


                        <div class="comments">

                            <h4 class="comments-count">Review</h4>

                            <div id="comment-2" class="comment">
                                <div class="d-flex">
                                    <div>
                                        <h5>Aron Alvarado <a href="#" class="reply"><i class="bi bi-reply-fill"></i>
                                                Reply</a></h5>
                                        <div class="stars">
                                            <i class="bi bi-star-fill yes"></i><i class="bi bi-star-fill yes"></i><i
                                                class="bi bi-star-fill yes"></i><i class="bi bi-star-fill yes"></i><i
                                                class="bi bi-star-fill"></i>
                                        </div>
                                        <time datetime="2020-01-01">01 Jan,2022</time>
                                        <p>
                                            Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe.
                                            Officiis illo ut beatae.
                                        </p>
                                    </div>
                                </div>

                            </div><!-- End comment #2-->

                        </div><!-- End blog comments -->

                    </div>

                    <div class="col-lg-3">

                        <div class="sidebar forCart">
                            <div class="icon-box">
                                <h6>Beli atau Keranjang</h6>
                                <div class="stok">
                                    <button><i class="bi bi-dash"></i></button>
                                    <input type="number" name="" id="" value="1" style="width: 50%">
                                    <button><i class="bi bi-plus"></i></button>
                                </div>
                                <p>Stok :</p>
                            </div>
                            <div class="icon-box">
                                <div class="subtotal">
                                    <p>SubTotal</p>
                                    <p>120.000</p>
                                </div>
                            </div>
                            <div class="icon-box">
                                <div class="button-sidebar">
                                    <button>Beli</button>
                                    <button>Keranjang</button>
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
    </script>
@endSection
