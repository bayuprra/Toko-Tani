<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>Toko TaniCitra</span>
                </a>
                <p>
                    Tempat Terlengkap Menjual Alat Pertanian
                </p>
                <div class="social-links d-flex mt-4">
                    <a href="https://twitter.com/"><i class="bi bi-twitter"></i></a>
                    <a href="https://facebook.com/"><i class="bi bi-facebook"></i></a>
                    <a href="https://instagram.com/"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Links</h4>
                <ul>
                    <li><a href="/#welcome">Home</a></li>
                    <li><a href="/#service">Kategori</a></li>
                    <li><a href="/#contact">Kontak</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Produk Kami</h4>
                <ul>
                    @foreach ($kategori as $kat)
                        <li><a href="/{{ $kat->nama }}">{{ $kat->nama }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Kontak</h4>
                <p>Jalan Raya Desa Air Niur
                    No. 20</p>
                <p>Lubuk Besar</p>
                <p>Bangka Tengah</p>
                <p class="mt-4">
                    <strong>Hp / WA:</strong> <span>+62 82181012301</span>
                </p>
                <p><strong>Email:</strong> <span>taniCitra@gmail.com</span></p>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>
            &copy; <span>Copyright</span> <strong class="px-1">Toko TaniCitra</strong>
        </p>
    </div>
</footer>
<!-- End Footer -->

<!-- Scroll Top Button -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
</div>

<!-- Vendor JS Files -->
