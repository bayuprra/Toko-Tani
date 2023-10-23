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
                                    $num = 1;
                                    ?>
                                    @foreach ($data as $p)
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{ $p->nama }}</td>
                                            <td>{{ $p->account->email }}</td>
                                            <td>{{ $p->phone }}</td>
                                            <td>{{ $p->alamat }}</td>
                                            <td class="d-flex flex-row" style="gap: 10px">
                                                <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                                    id="editButton" data-toggle="modal"
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
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" placeholder="alamat" name="alamat">{{ $p->alamat }}</textarea>
                                </div>
                                <div class="form-group-email">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        value="{{ $p->account->email }}" name="email">
                                </div>
                                {{-- <div class="form-group-password">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password">
                </div> --}}

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
