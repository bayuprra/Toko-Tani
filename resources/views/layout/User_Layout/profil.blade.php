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
@endSection

@section('content')
    <main id="main">

        <!-- Blog Page Title & Breadcrumbs -->
        <div data-aos="fade" class="page-title">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Profil</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Section - Blog Page -->
        <section id="blog" class="blog">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row con">
                    <form action="/profil" method="post" id="editProfil">
                        @csrf
                        <div class="col-12 row ">
                            <div class="col-4 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="nama"
                                    value="{{ $data->nama ?? '' }}" name="nama" disabled>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="Telepon" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="telepon" placeholder="Telepon"
                                    value="{{ $data->phone ?? '' }}" name="phone" disabled>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="email"
                                    value="{{ $data->emailAkun ?? '' }}" name="email" disabled>
                            </div>
                        </div>
                        <div class="col-12 row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" placeholder="provinsi"
                                        value="Kep. Bangka Belitung" name="provinsi" value="Kep. Bangka Belitung" disabled>
                                </div>
                                <div class="mb-3">
                                    <label>Kabupaten</label>
                                    <input type="hidden" name="kab" id="kab" value="{{ $data->kab ?? '' }}">
                                    <select class="form-select" aria-label="Default select example" name="kabupaten"
                                        id="kabupaten" required disabled>
                                        <option value=" " selected="selected" disabled>Pilih</option>
                                        <option value="Bangka">Bangka</option>
                                        <option value="Bangka Barat">Bangka Barat</option>
                                        <option value="Bangka Selatan">Bangka Selatan</option>
                                        <option value="Bangka Tengah">Bangka Tengah</option>
                                        <option value="Belitung Timur">Belitung Timur</option>
                                        <option value="Pangkal Pinang">Pangkal Pinang</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Kecamatan</label>
                                    <input type="hidden" name="kec" id="kec" value="{{ $data->kec ?? '' }}">

                                    <select class="form-select" aria-label="Default select example" name="kecamatan"
                                        id="kecamatan" required disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 row">
                                <div class="mb-3">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea class="form-control" id="detail" name="detail" disabled>{{ $data->det }}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 row">
                            <hr>
                            <div class="col-6 row">
                                <div class="col-2" id="riwayatView">
                                    <div class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                                        <a href="{{ route('riwayat') }}" id="riwayat"><input type="button"
                                                class="btn profil-btn" value="Riwayat" /></a>
                                    </div>
                                </div>
                                <div class="col-2" id="editProfilView">
                                    <div class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                                        <a href="#" id="editProfil" onclick="edit()"><input type="button"
                                                class="btn profil-btn" value="Edit Profil" /></a>
                                    </div>
                                </div>
                                <div class="col-2" style="display: none" id="batalView">
                                    <div class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                                        <a id="batal"><input type="button" class="btn profil-btn"
                                                value="Batal" /></a>
                                    </div>
                                </div>
                                <div class="col-2" style="display: none" id="simpanView">
                                    <div class="sign-up-form d-flex" data-aos="fade-up" data-aos-delay="300">
                                        <a href="#" id="simpan"><input type="button"
                                                class="btn profil-btn-simpan" value="Save" /></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
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

            var kabupaten = [
                "bangka",
                "bangka barat",
                "bangka selatan",
                "bangka tengah",
                "belitung timur",
                "pangkal pinang"
            ];
            var kecamatan = [
                "bakam,belinyu,karang lintang,maras makmur,mendo barat,merawang,pemali,puding besar,riau silip,simpang tiga,sungailiat",
                "jebus,kelapa,muntok,parittiga,simpang teritip,tempilang",
                "air gegas,kepulauan pongok,lepar pongok,payung,pulaubesar,simpang rimba,toboali,tukak sadai",
                "koba,lubuk besar,namang,pangkalan baru,simpang katis,sungai selan",
                "damar,dendang,gantung,kelapa kampit,manggar,simpang pesak,simpang renggiang",
                "bukit intan,gabek,gerunggang,girimaya,pangkal balam,rangkui,taman sari"
            ];
            var kabValue = $('#kab').val();
            var kecValue = $('#kec').val();
            if (kabValue !== "") {
                $('#kabupaten').val(kabValue);
            }
            if (kecValue !== "") {

                $('#kecamatan').html(`<option value="` + kecValue + `" selected="selected" disabled>` + kecValue +
                    `</option>`);
            }
            $('#kabupaten').change(function() {
                var val = $(this).val();
                var index = kabupaten.indexOf(val.toLowerCase());
                var dataKecamatan = kecamatan[index].split(",");

                var kec = `<option value="" selected="selected" disabled>Pilih</option>`;
                dataKecamatan.forEach(element => {
                    kec += `<option value="` + element + `">` + element + `</option>`
                });
                $('#kecamatan').html(kec);

            });


        });
    </script>
    <script>
        function edit() {
            $('#riwayatView').hide();
            $('#editProfilView').hide();
            $('#batalView').show();
            $('#simpanView').show();

            disabledAll(false);
        }


        $('#simpan').click(function() {
            const nama = $('#nama').val();
            const phone = $('#telepon').val();
            const email = $('#email').val();
            const kabupaten = $('#kabupaten').val();
            const kecamatan = $('#kecamatan').val();
            const detail = $('#detail').val();

            if (nama === null || phone === null || email === null || kabupaten === null || kecamatan === null ||
                detail === null) {
                return Swal.fire('Semua Data Harus Diisi');
            }
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#editProfil').submit();
                }
            })
        });
        $('#batal').click(function() {
            $('#riwayatView').show();
            $('#editProfilView').show();
            $('#batalView').hide();
            $('#simpanView').hide();

            disabledAll(true);
        });

        function disabledAll(status) {
            $('#nama').prop('disabled', status);
            $('#telepon').prop('disabled', status);
            $('#email').prop('disabled', status);
            $('#kabupaten').prop('disabled', status);
            $('#kecamatan').prop('disabled', status);
            $('#detail').prop('disabled', status);
        }
    </script>
@endSection
