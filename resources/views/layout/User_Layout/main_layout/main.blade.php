@extends('layout.User_Layout.main_layout.header')
@section('style')
@endSection

@section('content')
    <main id="main">
        <!-- Hero Section - Home Page -->
        <section id="welcome" class="hero">
            <img src="assets/img/bg.jpg" alt="" data-aos="fade-in" />

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h2 data-aos="fade-up" data-aos-delay="100">
                            Selamat Datang di <span class="typed-text">Toko TaniCitra</span>
                        </h2>

                        <p data-aos="fade-up" data-aos-delay="200">
                            Menyediakan berbagai macam kebutuhan pertanian anda
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <div class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                            <a href="#Produk"><input type="submit" class="btn btn-primary" value="Shop Now" /></a>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Hero Section -->

        <!-- Clients Section - Home Page -->
        {{-- <section id="clients" class="clients">
            <div class="container-fluid" data-aos="fade-up">
                <div class="row gy-4">
                    <div class="col-xl-12 col-md-12 col-12 client-logo">
                        <img src="logo.png" class="img-fluid" alt="" />
                    </div>
                    <!-- End Client Item -->
                </div>
            </div>
        </section> --}}
        <!-- End Clients Section -->

        <!-- About Section - Home Page -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row align-items-xl-center gy-5">
                    <section id="image-carousel" class="splide" aria-label="Beautiful Images">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="assets/img/slider/bibit.jpg" alt="">
                                </li>

                                <li class="splide__slide">
                                    <img src="assets/img/slider/bibit2.jpg" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/img/slider/hama.jpg" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/img/slider/tikus.jpg" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/img/slider/ulat.jpg" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/img/slider/sayur.jpg" alt="">
                                </li>
                                <li class="splide__slide">
                                    <img src="assets/img/slider/tomat.jpg" alt="">
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- Stats Section - Home Page -->
        <section id="stats" class="stats">
            <img src="assets/img/slider/bibit.jpg" alt="" data-aos="fade-in" />

            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">

                    </div>
                    <!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ count($produk) }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Produk</p>
                        </div>
                    </div>
                    <!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ count($kategori) }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Kategori</p>
                        </div>
                    </div>
                    <!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">

                    </div>
                    <!-- End Stats Item -->
                </div>
            </div>
        </section>
        <!-- End Stats Section -->

        <!-- Services Section - Home Page -->
        <section id="Produk" class="services">
            <!--  Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Produk</h2>
                <p>
                    Menyediakan Berbagai Macam Produk Pertanian
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    @foreach ($kategori as $kat)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item d-flex">
                                <div class="icon flex-shrink-0">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <div>
                                    <h4 class="title">
                                        <a href="user/{{ $kat->nama }}" class="stretched-link">{{ $kat->nama }}</a>
                                    </h4>
                                    <p class="description">
                                        {{ $kat->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Service Item -->

                    <!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- Testimonials Section - Home Page -->
        <section id="testimonials" class="testimonials">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                        <h3>Testimoni</h3>
                        <p>
                            Testimoni Para Pembeli Kami
                        </p>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="swiper">
                            <template class="swiper-config">
                                { "loop": true, "speed" : 600, "autoplay": { "delay": 5000 },
                                "slidesPerView": "auto", "pagination": { "el":
                                ".swiper-pagination", "type": "bullets", "clickable": true } }
                            </template>
                            <div class="swiper-wrapper">
                                @foreach ($testi as $t)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="d-flex">
                                                <img src="{{ asset('user.png') }}" class="testimonial-img flex-shrink-0"
                                                    alt="" />
                                                <div>
                                                    <h3>{{ $t->customerNama }}</h3>
                                                    <h4>Pembeli</h4>
                                                    <div class="stars">
                                                        @php
                                                            for ($i = 0; $i < $t->star; $i++) {
                                                                echo '<i class="bi bi-star-fill"></i>';
                                                            }
                                                        @endphp
                                                        @php
                                                            for ($i = 0; $i < 5 - $t->star; $i++) {
                                                                echo '<i class="bi bi-star"></i>';
                                                            }
                                                        @endphp
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                <span>{{ $t->review }}</span>
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- End testimonial item -->
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- Contact Section - Home Page -->
        <section id="contact" class="contact">
            <!--  Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p>
                    Hubungi Kami Untuk Bertanya atau Pesan
                </p>
            </div>
            <!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="200">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p> Jalan Raya Desa Air Niur
                                        No. 20</p>
                                    <p>Bangka, Lubuk Besar</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="300">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Hp / WA</h3>
                                    <p>082181012301</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="400">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email</h3>
                                    <p>taniCitra@gmail.com</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="col-md-6">
                                <div class="info-item" data-aos="fade" data-aos-delay="500">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Operasi</h3>
                                    <p>Setiap Hari</p>
                                    <p>9:00 - 17:00</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.1166617472377!2d106.5213508649602!3d-2.550296562772823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3d58883f8846a7%3A0xa07eb5129c1c385b!2sCGXC%2BWH7%2C%20Perlang%2C%20Kec.%20Lubuk%20Besar%2C%20Kabupaten%20Bangka%20Tengah%2C%20Kepulauan%20Bangka%20Belitung%2033681!5e0!3m2!1sid!2sid!4v1698469917167!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- End Contact Form -->
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
@endSection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'fade',
                rewind: true,
                autoplay: true,
            });

            splide.mount();
        });
    </script>
@endSection
