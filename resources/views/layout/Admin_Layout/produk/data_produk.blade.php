@extends('layout.Admin_layout.main_layout.main')
@section('style')
    <style>
        .card-header button {
            width: 20%;
        }

        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px);
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
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th>Varian</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 1;
                                    ?>
                                    @foreach ($data as $produk)
                                        <tr>
                                            <td>{{ $num++ }} </td>
                                            <td> {{ $produk->kategori }}</td>
                                            <td>{{ $produk->merk }} </td>
                                            <td> {{ $produk->nama . $produk->satuan }}</td>
                                            <td> {{ $produk->harga }}</td>
                                            <td> {{ $produk->qty }}</td>
                                            <td style="width: 10%; max-height:5rem"><img
                                                    src="{{ asset('produk/' . $produk->gambar) }}"
                                                    alt="{{ $produk->gambar }}" style="width:100%;height:100%">
                                            </td>
                                            <td class="d-flex flex-row" style="gap: 10px">
                                                <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                                    id="editButton" data-toggle="modal"
                                                    data-target="#modal-update-{{ $produk->id }} "><i
                                                        class="fas fa-edit"></i></button>
                                                <button type="button" class="btn  btn-danger btn-xs"
                                                    style="margin-top: 0;width: 50%" id="deleteButton"
                                                    onclick="hapusProduk({{ $produk->id }})"><i
                                                        class="fas fa-solid fa-trash"></i></button>
                                                <form action="{{ route('deleteProduk', ['id' => $produk->id]) }}"
                                                    method="post" id="formHapusProduk{{ $produk->id }}">
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
    {{-- @foreach ($data as $p) --}}

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/produk" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control select2" style="width: 100%;" name="kategori" required>
                                        <option selected="selected" disabled>Pilih</option>
                                        @foreach ($kategori as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <select class="form-control select2" style="width: 100%;" name="merk" required>
                                        <option selected="selected" disabled>Pilih</option>
                                        @foreach ($merk as $mer)
                                            <option value="{{ $mer->id }}">{{ $mer->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama / Varian</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter nama" name="nama" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control select2" style="width: 100%;" name="satuan"
                                                required>
                                                <option selected="selected" disabled>Pilih</option>
                                                <option value="kg">Kilogram</option>
                                                <option value="liter">liter</option>
                                                <option value="ml">ml</option>
                                                <option value="gram">gram</option>
                                                <option value="bungkus">bungkus</option>
                                                <option value="pcs">pcs</option>
                                                <option value="lainnya">lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Harga</label>
                                            <input type="number" class="form-control" name="harga" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" class="form-control" name="qty" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="gambar">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    @foreach ($data as $produk)
        <div class="modal fade" id="modal-update-{{ $produk->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/updateProduk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" style="width: 100%;" name="kategori"
                                            required>
                                            @foreach ($kategori as $kat)
                                                <?php $flag = $produk->kategori_produk_id == $kat->id ? 'selected' : ''; ?>
                                                <option value="{{ $kat->id }}" {{ $flag }}>
                                                    {{ $kat->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Merk</label>
                                        <select class="form-control select2" style="width: 100%;" name="merk"
                                            required>
                                            <option selected="selected" disabled>Pilih</option>
                                            @foreach ($merk as $mer)
                                                <?php $flag = $produk->merk_produk_id == $mer->id ? 'selected' : ''; ?>
                                                <option value="{{ $mer->id }}" {{ $flag }}>
                                                    {{ $mer->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama / Varian</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    placeholder="Enter nama" name="nama" required
                                                    value="{{ $produk->nama }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Satuan</label>
                                                <select class="form-control select2" style="width: 100%;" name="satuan"
                                                    required>
                                                    @foreach (['kg', 'liter', 'ml', 'gram', 'bungkus', 'pcs', 'lainnya'] as $option)
                                                        <option value="{{ $option }}"
                                                            @if ($flag == $option) selected @endif>
                                                            {{ $option }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga</label>
                                                <input type="number" class="form-control" name="harga" required
                                                    value="{{ $produk->harga }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Stok</label>
                                                <input type="number" class="form-control" name="qty" required
                                                    value="{{ $produk->qty }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile"
                                                name="gambar" value="{{ $produk->gambar }}">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            @if ($produk->gambar)
                                                <p>Current Image: {{ $produk->gambar }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endSection

@section('script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                    "text": "Tambah Produk",
                    "className": "btn btn-primary btn-info",
                    "action": function() {
                        $('#modal-add').modal('show');
                    }
                }],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function hapusProduk(id) {
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
                    $('form#formHapusProduk' + id).submit();
                }
            })
        }
    </script>
@endSection
