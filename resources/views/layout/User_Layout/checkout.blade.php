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

        /* new*/
        .css-2dzc0w {
            border-bottom: 6px solid var(--N50, #F3F4F5);
        }

        .css-2dzc0w .box-heading {
            font-weight: 700;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--N100, #DBDEE2);
            color: var(--N700, #31353B);
        }

        .css-2dzc0w .box-main-content {
            padding: 10px 0px 15px;
        }

        .css-2dzc0w .box-content-parag {
            margin-bottom: 4px;
            line-height: 1.4;
        }

        .css-2dzc0w .box-content-parag .receiver-name {
            color: var(--N700, #31353B);
            font-size: 0.928571rem;
        }

        .css-2dzc0w .box-content-parag .address-title {
            margin-right: 2px;
            color: var(--N700, #31353B);
            font-size: 0.928571rem;
        }

        .css-157s6vo .shop-group {
            padding: 16px 0px 0px;
            border-bottom: 6px solid var(--N50, #F3F4F5);
        }

        .css-157s6vo .shop-body-content-wrapper {
            display: flex;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--N100, #DBDEE2);
        }

        .css-157s6vo .shop-body-content__left {
            -webkit-box-flex: 1;
            flex-grow: 1;
            padding-right: 15px;
        }

        .css-157s6vo .shop-product__flex {
            display: flex;
        }

        .css-157s6vo .shop-product__left {
            flex-shrink: 0;
        }

        .css-157s6vo .product-img {
            display: block;
            width: 60px;
            height: 60px;
            color: var(--N0, #FFFFFF);
            background: var(--N0, #FFFFFF);
        }

        .css-m2nf2c {
            background-repeat: no-repeat;
            background-size: 99% 100%;
            display: inline-block;
            height: auto;
            margin: 0px auto;
            position: relative;
            text-align: center;
            width: 100%;
        }

        .css-157s6vo .product-img img {
            display: block;
            width: 100%;
            border-radius: 6px;
        }

        .css-157s6vo .shop-product__right {
            padding-left: 15px;
            width: 75%;
        }

        .css-157s6vo .shop-product__right .product__name {
            color: black;
            overflow-wrap: anywhere;
        }

        .css-m3bste-unf-heading {
            display: block;
            position: relative;
            font-weight: 400;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 20px;
            letter-spacing: 0px;
            color: var(--NN600, #6D7588);
            text-decoration: initial;
            margin: 0px 0px 2px;
        }

        .css-157s6vo .variant-wrapper {
            display: flex;
        }

        .css-1of93gz-unf-heading {
            display: block;
            position: relative;
            font-weight: 400;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 0.857143rem;
            line-height: 18px;
            letter-spacing: 0px;
            color: var(--NN600, #6D7588);
            text-decoration: initial;
            margin: 4px 8px 4px 0px;
        }

        .css-wrkbw4 .shopping-details-wrapper {
            margin-top: 16px;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .css-izuqqr {
            display: flex;
            flex-direction: column;
            -webkit-box-align: center;
            align-items: center;
            gap: 4px;
        }

        .css-12d2mry {
            width: 100%;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            justify-content: space-between;
        }

        .css-rt0bne {
            flex: 1 1 0%;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            gap: 2px;
        }

        .css-1z0diop-unf-heading {
            display: block;
            position: relative;
            font-weight: 400;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 22px;
            letter-spacing: 0px;
            color: var(--NN950, #212121);
            text-decoration: initial;
            margin: 0px;
        }

        .css-171onha {
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            gap: 4px;
        }

        .css-ue30lg-unf-heading {
            display: block;
            position: relative;
            font-weight: 400;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 22px;
            letter-spacing: 0px;
            color: var(--NN900, #2E3137);
            text-decoration: initial;
            margin: 0px;
        }

        .css-wrkbw4 .summary-grand-total-row {
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            padding-top: 16px;
            margin-bottom: 17px;
            border-top: 1px solid var(--N100, #DBDEE2);
        }

        .css-wrkbw4 .sgtr__label {
            font-weight: 700;
            color: var(--N700, #31353B);
            padding-right: 14px;
            font-size: 16px;
        }

        .css-wrkbw4 .sgtr__value {
            font-weight: 700;
            flex-shrink: 0;
            font-size: 1.21429rem;
            color: var(--N700, #31353B);
        }

        .css-4xk3hb {
            min-height: 0px;
            position: relative;
        }

        .css-m6di7s {
            padding: 6px 0px;
        }

        .css-m6di7s .shop-footer__row {
            display: flex;
            -webkit-box-pack: justify;
            justify-content: space-between;
        }

        .css-1fqqzz-unf-heading {
            display: block;
            position: relative;
            font-weight: 700;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 20px;
            letter-spacing: 0px;
            color: var(--NN950, #212121);
            text-decoration: initial;
            margin: 0px;
        }

        .css-1fqqzz-unf-heading {
            display: block;
            position: relative;
            font-weight: 700;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            font-size: 1rem;
            line-height: 20px;
            letter-spacing: 0px;
            color: var(--NN950, #212121);
            text-decoration: initial;
            margin: 0px;
        }

        .sidebar {
            height: auto;
        }
    </style>
@endSection

@section('content')
    <main id="main">


        <section id="blog-details" class="blog-details">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="sidebar">
                            <div class="css-2dzc0w">
                                <div class="box-heading">Alamat Pengiriman</div>
                                <div class="box-main-content">
                                    <div>
                                        <div class="box-content-parag"><b
                                                class="receiver-name">{{ $data->nama_customer ?? 'Nama Customer' }}</b>
                                        </div>
                                        <div class="box-content-parag phone">{{ $data->phone_customer ?? '08xxxxxxxxx' }}
                                        </div>
                                        <div class="box-content-parag">
                                            @php
                                                $alamat = explode(',', $data->alamat_customer);
                                                $kab = $alamat[count($alamat) - 2];
                                                $kec = $alamat[count($alamat) - 3];
                                                $det = '';
                                                for ($i = 0; $i < count($alamat) - 3; $i++) {
                                                    $det .= $alamat[$i];
                                                }
                                            @endphp
                                            <div class="address-desc">{{ $det }}</div>
                                            <div class="address-desc--dis-cit-pos" id="forKab"
                                                data-kabupaten="{{ $kab }}">{{ $kec . ', ' . $kab }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="css-157s6vo">
                                <div>
                                    <div class="shop-group" id="shop-group-2147991-0-1725861-175463858"
                                        data-testid="shop-group-2147991-0-1725861-175463858">
                                        <div>
                                            <div class="shop-body">
                                                <div class="shop-body-content-wrapper">
                                                    <div class="shop-body-content__left">
                                                        <div class="shop-products-wrapper">
                                                            <div class="shop-product">
                                                                <div class="css-4xk3hb">
                                                                    <div class="shop-product__flex">
                                                                        <div class="shop-product__left">
                                                                            <div class="product-img">
                                                                                <div class="css-m2nf2c"><img
                                                                                        crossorigin="anonymous"
                                                                                        class="success fade-show"
                                                                                        src="{{ asset('produk/' . $produk->gambar . '') }}"
                                                                                        title=""
                                                                                        alt="{{ $produk->gambar }}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="shop-product__right">
                                                                            <p data-unify="Typography"
                                                                                class="product__name css-m3bste-unf-heading e1qvo2ff8"
                                                                                data-testid="lblSafProductName-2144557797">
                                                                                {{ $produk->merk ?? 'produk' }}</p>
                                                                            <div class="variant-wrapper">
                                                                                <p data-unify="Typography"
                                                                                    class="variant__text css-1of93gz-unf-heading e1qvo2ff8"
                                                                                    data-testid="lblSafProductVariant-2144557797">
                                                                                    {{ $produk->nama . $produk->satuan }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="variant-wrapper">
                                                                                <p data-unify="Typography" id="forHarga"
                                                                                    class="variant__text css-1of93gz-unf-heading e1qvo2ff8"
                                                                                    data-harga="{{ $produk->harga }}">
                                                                                    {{ 'Rp. ' . $produk->harga }}</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="forjumlah">
                                                                            <p class="mb-0 fw-bold">Jumlah:</p>
                                                                            <div class="stok">
                                                                                <button id="minus"><i
                                                                                        class="bi bi-dash"></i></button>
                                                                                <input type="number" name="jumlah"
                                                                                    id="jml" value="1"
                                                                                    style="width: 50%"
                                                                                    data-max="{{ $produk->qty }}"
                                                                                    max="{{ $produk->qty }}" disabled>
                                                                                <button id="plus"><i
                                                                                        class="bi bi-plus"></i></button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>Stok Tersisa: {{ $produk->qty }}</p>

                            <div class="css-4xk3hb">
                                <div class="css-m6di7s ">
                                    <div class="shop-footer__subtotal">
                                        <div class="shop-footer__row">
                                            <p data-unify="Typography" data-testid="lblSafSubtotal-2147991-175463858"
                                                class="css-1fqqzz-unf-heading e1qvo2ff8">Subtotal</p>
                                            <div class="sf-row-value subtotal">
                                                <p data-unify="Typography" role="button" tabindex="0"
                                                    data-testid="btnSafExpandSubtotalDetail-2147991-175463858"
                                                    class="css-1fqqzz-unf-heading e1qvo2ff8"><span
                                                        data-testid="valueSafSubtotal-2147991-175463858"
                                                        id="subTotalBelanja">Rpxxxx</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">

                        <div class="sidebar forCart">
                            <div class="icon-box">
                                <h6>Ringkasan Belanja</h6>
                            </div>
                            {{-- <div class="icon-box">
                                <div class="subtotal">
                                    <p>SubTotal</p>
                                    <p id="tot">{{ $produk[0]->harga }}</p>
                                </div>
                            </div> --}}
                            <div class="shopping-details-wrapper">
                                <div class="css-izuqqr">
                                    <div class="css-12d2mry" data-testid="checkout-sidebar-detail">
                                        <div class="css-rt0bne">
                                            <p data-unify="Typography" class="css-1z0diop-unf-heading e1qvo2ff8">Total Harga
                                            </p>
                                        </div>
                                        <div class="css-171onha">
                                            <div data-testid="lblSafSummaryTotalProductPrice">
                                                <p data-unify="Typography" color="var(--NN900, #2E3137)"
                                                    class="css-ue30lg-unf-heading e1qvo2ff8" id="totRight">Rpxxx</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="css-12d2mry" data-testid="checkout-sidebar-detail">
                                        <div class="css-rt0bne">
                                            <p data-unify="Typography" class="css-1z0diop-unf-heading e1qvo2ff8">Ongkos
                                                Kirim</p>
                                        </div>
                                        <div class="css-171onha">
                                            <div data-testid="lblSafSummaryPurchaseProtectionAmount">
                                                <p data-unify="Typography" color="var(--NN900, #2E3137)"
                                                    class="css-ue30lg-unf-heading e1qvo2ff8" id="forOngkir">Rp48.300</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="summary-grand-total-row">
                                <div class="css-izuqqr">
                                    <div class="css-12d2mry" data-testid="checkout-sidebar-detail">
                                        <div class="css-rt0bne">
                                            <p data-unify="Typography" class="css-1z0diop-unf-heading e1qvo2ff8">Total
                                                Belanja
                                            </p>
                                        </div>
                                        <div class="css-171onha">
                                            <div data-testid="lblSafSummaryTotalProductPrice">
                                                <p data-unify="Typography" color="var(--NN900, #2E3137)"
                                                    class="css-ue30lg-unf-heading e1qvo2ff8" id="allTotal">Rpxxx</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box">
                                <div class="button-sidebar">
                                    {{-- <a href="{{ route('copage') }}"> --}}
                                    {{-- </a> --}}
                                    <button id="orderNow">Order</button>
                                </div>
                            </div>


                        </div><!-- End Sidebar -->

                    </div>

                </div>

            </div>

        </section><!-- End Blog-details Section -->


    </main>
    <form action="{{ route('buatOrder') }}" method="post" id="formCO">
        @csrf
        <input type="hidden" name="idBarang" value="{{ $produk->id }}">
        <input type="hidden" name="jumlahBarang" value="1">
        <input type="hidden" name="totalHargaBarang">
    </form>
@endSection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            var kabupaten = [
                "bangka",
                "bangka barat",
                "bangka selatan",
                "bangka tengah",
                "belitung timur",
                "pangkal pinang"
            ];
            var ongkir = [
                10000,
                10000,
                10000,
                10000,
                45000,
                10000,
            ];

            const butPlus = $('#plus');
            const butMinus = $('#minus');
            const jmlInput = $('#jml');

            subTotal();

            function subTotal() {
                const harga = $("#forHarga").data("harga");
                const jml = jmlInput.val();
                const subtotText = $("#subTotalBelanja");
                const tot = $("#totRight");
                const forKab = $("#forKab").data("kabupaten").replace("Kabupaten ", "").replace(" ", "")
                    .toLowerCase();
                const forOngkir = $("#forOngkir");
                const totalKeseluruhan = $("#allTotal");



                const indexOngkir = kabupaten.indexOf(forKab) ?? 0;
                var valOngkir = ongkir[indexOngkir];
                var subtotalVal = parseInt(harga) * parseInt(jml);
                var final = subtotalVal + valOngkir;

                $('input[name="totalHargaBarang"]').val(final);

                valOngkir = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(valOngkir);

                subtotalVal = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(subtotalVal);
                final = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                }).format(final);

                //sub total
                subtotText.text(subtotalVal);
                tot.text(subtotalVal);

                //ongkir
                forOngkir.text(valOngkir);

                //keseluruhan
                totalKeseluruhan.text(final);
            }

            butPlus.on('click', function() {
                let jumlah = parseInt(jmlInput.val());
                let max = parseInt(jmlInput.data("max"));

                if (jumlah === max) {
                    butPlus.prop("disabled", true);
                } else {
                    jumlah += 1;
                    jmlInput.val(jumlah);
                    $('input[name="jumlahBarang"]').val(jumlah);
                    subTotal();
                    butMinus.prop("disabled", false);
                    butPlus.prop("disabled", false);
                }

            });
            butMinus.on('click', function() {
                let jumlah = parseInt(jmlInput.val());

                if (jumlah > 1) {
                    jumlah -= 1;
                    jmlInput.val(jumlah); // Update the input value
                    $('input[name="jumlahBarang"]').val(jumlah);
                    subTotal();

                }
                if (jumlah === 1) {
                    butMinus.prop("disabled", true); // Disable the minus button when the value is 1
                    butPlus.prop("disabled", false); // Disable the minus button when the value is 1
                }
            });

            $("#orderNow").click(function() {
                $("#formCO").submit();
            })
        });
    </script>
@endSection
