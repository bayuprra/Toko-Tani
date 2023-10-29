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
                    <input class="searchInput" type="text" name="" placeholder="Search something">
                    <button class="searchButton" href="#"><i class="bi bi-search"></i>
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
                                <li><a href="/{{ $kat->nama }}">{{ $kat->nama }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
        <div class="d-flex flex-row justify-content-between">

            <a class="btn shopCart" onclick="seachBar(1)"><i class="bi bi-search"></i></a>
            <a class="btn shopCart" href="#"><i class="bi bi-cart-fill"></i></a>

            <a class="btn but-login" href="#" style="margin-right: 10px;">Login</a>
            <!-- <a class="btn but-logout" href="#" style="margin-right: 10px;">Logout</a> -->
            <a class="btn-getstarted" href="#">Register</a>
        </div>

    </div>
</header>
