@php $role = ""; @endphp
@if (Session::has('data'))
    @php $role = Session::get('data')->nama_role @endphp
@endif
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>TaniCitra</h1>
            <span>.</span>
        </a>

        <div class="row">

            <!-- Nav Menu -->
            <nav id="navmenu" class="navmenu">
                <div class="searchBox">
                    <form action="{{ route('cariProduk') }}" method="post" id="formCari">
                        @csrf
                        <input class="searchInput" type="text" name="cari" placeholder="Search something"
                            autocomplete="off">
                    </form>
                    <button class="searchButton" id="cari" href="#"><i class="bi bi-search"></i>
                    </button>
                </div>
                <ul>
                    <li class=" topHome"><a href="/#welcome" class="active">Home</a></li>
                    <li class=" topKategori"><a href="/#Produk">Produk</a></li>
                    <li class=" topKontak"><a href="/#contact">Kontak</a></li>
                    <li class="dropdown has-dropdown">
                        <a href="#"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
                        <ul class="dd-box-shadow">
                            @foreach ($kategori as $kat)
                                <li><a href="/user/{{ $kat->nama }}">{{ $kat->nama }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
        <div class="d-flex flex-row justify-content-between">

            <a class="btn shopCart" onclick="seachBar(1)"><i class="bi bi-search"></i></a>
            @if ($role == 'Customer')
                <a class="btn shopCart" href="{{ route('keranjang') }}"><i class="bi bi-cart-fill"></i></a>
                <a class="btn shopCart" href="{{ route('profil') }}"><i class="bi bi-person-fill"></i></a>
                <a href="#" class="btn but-login" onclick="logout()" style="margin-right: 10px;">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form action="/logout" method="post" id="formLogout">
                    @csrf
                    <button type="submit" hidden>Logout</button>
                </form>
            @endif
            @if ($role == 'Admin')
                <a href="#" class="btn but-login" onclick="logout()" style="margin-right: 10px;">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            @endif
            @if ($role == '')
                <a class="btn but-login" href="{{ route('login') }}" style="margin-right: 10px;">Login</a>
                <!-- <a class="btn but-logout" href="#" style="margin-right: 10px;">Logout</a> -->
                <a class="btn-getstarted" href="{{ route('register') }}">Register</a>
            @endif

        </div>

    </div>
</header>
