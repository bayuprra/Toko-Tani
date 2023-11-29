@extends('layout.Admin_layout.main_layout.main')
@section('style')
    <style>
        .card-header button {
            width: 20%;
        }
    </style>
@endSection
@section('content')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-check"></i>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-check"></i>
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ids = [];
                                    $num = 1;
                                    ?>
                                    @foreach ($data as $p)
                                        @php
                                        $ids[] = $p->id; @endphp
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->account->email }}</td>
                                            <td>{{ $p->phone }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td class="d-flex flex-row" style="gap: 10px">
                                                <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                                    id="editButton-{{ $p->id }}" data-toggle="modal"
                                                    data-target="#modal-lg-update-{{ $p->id }}"><i
                                                        class="fas fa-edit"></i></button>
                                                <button type="button" class="btn  btn-danger btn-xs"
                                                    style="margin-top: 0;width: 50%" id="deleteButton"
                                                    onclick="hapusCustomer({{ $p->id }})"><i
                                                        class="fas fa-solid fa-trash"></i></button>
                                                <form action="{{ route('deleteCustomer', ['id' => $p->id]) }}"
                                                    method="post" id="formHapusCustomer{{ $p->id }}">
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    @foreach ($data as $p)
        <div class="modal fade" id="modal-lg-update-{{ $p->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Customer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateCustomer/{{ $p->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" placeholder="nama"
                                            name="nama" value="{{ $p->nama }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="hp">No Hp</label>
                                        <input type="number" class="form-control" id="hp" placeholder="hp"
                                            name="phone" value="{{ $p->phone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">

                                        <div class="mb-3">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi" placeholder="provinsi"
                                                value="Kep. Bangka Belitung" name="provinsi" value="Kep. Bangka Belitung"
                                                disabled>
                                        </div>
                                    </div>
                                    @php
                                        $kab = '';
                                        $kec = '';
                                        $det = '';
                                        if ($p->alamat != '') {
                                            $alamat = explode(',', $p->alamat);
                                            $kab = str_replace(' Kabupaten ', '', $alamat[count($alamat) - 2]);
                                            $kec = str_replace(' Kecamatan ', '', $alamat[count($alamat) - 3]);
                                            $det = '';
                                            for ($i = 0; $i < count($alamat) - 3; $i++) {
                                                $det .= $alamat[$i];
                                            }
                                        }
                                    @endphp
                                    <div class="form-group col-3">
                                        <label>Kabupaten</label>
                                        <input type="hidden" name="kab" id="kab-{{ $p->id }}"
                                            value="{{ $kab ?? '' }}">
                                        <select class="form-control" aria-label="Default select example" name="kabupaten"
                                            id="kabupaten-{{ $p->id }}" required>
                                            <option value=" " selected="selected" disabled>Pilih</option>
                                            <option value="Bangka">Bangka</option>
                                            <option value="Bangka Barat">Bangka Barat</option>
                                            <option value="Bangka Selatan">Bangka Selatan</option>
                                            <option value="Bangka Tengah">Bangka Tengah</option>
                                            <option value="Belitung Timur">Belitung Timur</option>
                                            <option value="Pangkal Pinang">Pangkal Pinang</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Kecamatan</label>
                                        <input type="hidden" name="kec" id="kec-{{ $p->id }}"
                                            value="{{ $kec ?? '' }}">

                                        <select class="form-control" aria-label="Default select example" name="kecamatan"
                                            id="kecamatan-{{ $p->id }}" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail" class="form-label">Detail</label>
                                    <textarea class="form-control" id="detail" placeholder="detail" name="detail">{{ $det }}</textarea>
                                </div>
                                <div class="form-group-email">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $p->account->email }}" name="email">
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Save changes</button>
                    </div>
                    </form>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endSection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                //   "buttons": [{
                //             "text": "Tambah Customer",
                //             "className": "btn btn-primary btn-info",
                //             "action": function() {
                // $('#modal-lg').modal('show');
                //             }
                //         }],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

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


            const allData = @json($ids);
            $.each(allData, function(index, val) {
                $('#editButton-' + val).click(function() {
                    var kabValue = $('#kab-' + val).val();
                    var kecValue = $('#kec-' + val).val();
                    if (kabValue !== "") {
                        $('#kabupaten-' + val).val(kabValue);
                    }
                    if (kecValue !== "") {

                        $('#kecamatan-' + val).html(`<option value="` + kecValue +
                            `" selected="selected" disabled>` + kecValue +
                            `</option>`);
                    }

                    $('#kabupaten-' + val).change(function() {
                        console.log($(this).val());
                        var valu = $(this).val();
                        var index = kabupaten.indexOf(valu.toLowerCase());
                        var dataKecamatan = kecamatan[index].split(",");

                        var kec =
                            `<option value="" selected="selected" disabled>Pilih</option>`;
                        dataKecamatan.forEach(element => {
                            kec += `<option value="` + element + `">` + element +
                                `</option>`
                        });
                        $('#kecamatan-' + val).html(kec);

                    });
                });
            });


        });



        function hapusCustomer(id) {
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "Kamu Tidak Akan Bisa Mengembalikannya Lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formHapusCustomer' + id).submit();
                }
            })
        }
    </script>
@endSection
