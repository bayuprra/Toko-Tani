@extends('layout.Admin_layout.main_layout.main')
@section('style')
    <style>
        .card-header button {
            width: 20%;
        }

        .task {
            position: relative;
            color: #2e2e2f;
            cursor: move;
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: rgba(50, 49, 49, 0.1) 0px 2px 8px 0px;
            margin-bottom: 1rem;
            border: 3px dashed transparent;
        }

        .task:hover {
            box-shadow: rgba(99, 99, 99, 0.3) 0px 2px 8px 0px;
            border-color: rgba(162, 179, 207, 0.2) !important;
        }

        .task p {
            font-size: 15px;
            margin: 0;
        }

        .task p:nth-child(2) {
            opacity: 0.5;
        }

        .tag {
            border-radius: 100px;
            padding: 4px 13px;
            font-size: 12px;
            color: #ffffff;
        }

        .tags {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .options {
            background: transparent;
            border: 0;
            color: #c4cad3;
            font-size: 17px;
        }

        .options svg {
            fill: #9fa4aa;
            width: 30px;
        }

        .task img {
            width: -webkit-fill-available;
        }

        .produkNama {
            font-weight: 400;
            font-size: 14px;
        }

        .namaBarang {
            display: block;
            position: relative;
            font-weight: 800;
            font-family: "Open Sauce One", "Nunito Sans", -apple-system, sans-serif;
            line-height: 16px;
            letter-spacing: 0px;
            color: var(#212121);
            text-decoration: initial;
            max-width: calc(100% - 89px);
            font-size: 1rem;
            margin: 0px 0px 3px;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .totHarga {
            margin-bottom: 0;
        }

        #totalHarga {
            font-weight: bold;
        }

        .buktibayar {
            height: 100%;
            width: 50%;
            align-items: center;
        }

        .pengiriman-kiri {
            width: 20%;
            font-weight: bold;
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
                                        <th>Tanggal</th>
                                        <th>Nama Customer</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    use Carbon\Carbon;
                                    $num = 1;
                                    ?>
                                    @foreach ($data as $p)
                                        <tr>
                                            <td>{{ $num++ }}</td>
                                            <td>{{ Carbon::parse($p->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') .' Jam: ' .Carbon::parse($p->created_at)->locale('id_ID')->isoFormat('HH:mm:ss') }}
                                            </td>
                                            <td>{{ $p->customerNama }} </td>
                                            <td class="d-flex flex-row" style="gap: 10px">
                                                <button type="button" class="btn btn-warning btn-xs" style="width: 50%"
                                                    id="editButton" data-toggle="modal"
                                                    data-target="#modal-lg-update-{{ $p->id }}"><i
                                                        class="fas fa-edit"></i></button>
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
                        <h4 class="modal-title">Detail Order</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow: auto">
                        <div class="row">
                            <div class="col-12">
                                <div class="task" draggable="false">
                                    <div class="tags">
                                        @php
                                            $con = intval($p->statusOrderId);
                                            $bac = 'bg-light';

                                            if ($con === 1) {
                                                $bac = 'bg-danger';
                                            } elseif ($con === 2) {
                                                $bac = 'bg-warning';
                                            } elseif ($con === 3) {
                                                $bac = 'bg-info';
                                            } elseif ($con === 4) {
                                                $bac = 'bg-primary';
                                            } elseif ($con === 5) {
                                                $bac = 'bg-success';
                                            }
                                        @endphp
                                        <span class="tag {{ $bac }}">{{ strtoupper($p->statusOrder) }}</span>
                                        <span class="tag bg-dark">Tanggal
                                            Order:
                                            {{ Carbon::parse($p->created_at)->locale('id_ID')->isoFormat('D MMMM YYYY') .' Jam: ' .Carbon::parse($p->created_at)->locale('id_ID')->isoFormat('HH:mm:ss') }}</span>

                                    </div>
                                    <div class="row" style="height: 40%; align-items:center">
                                        <div class="col-2">
                                            <img class="produkImage" src="{{ asset('produk/' . $p->gambar . '') }}"
                                                alt="">
                                        </div>
                                        <div class="col-8 produkNama">
                                            <p class="namaBarang">{{ $p->namaMerk }}</p>
                                            <p>Jumlah: {{ $p->jumlah }}</p>
                                            <p class="varian">varian: {{ $p->produkNama . $p->satuan }}</p>
                                        </div>
                                        <div class="col-2 sumPrice">
                                            <p class="totHarga">Total Dibayar</p>
                                            <p class="namaBarang" id="totalHarga">Rp. {{ $p->total_harga }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="task" draggable="false">
                                    <div class="tags">
                                        <span class="tag bg-secondary">Biodata Customer</span>
                                    </div>
                                    <div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="pengiriman-kiri">Nama</td>
                                                    <td>{{ $p->customerNama }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pengiriman-kiri">Nomor Telepon</td>
                                                    <td>{{ $p->customerPhone }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="pengiriman-kiri">Alamat</td>
                                                    <td>{{ $p->customerAlamat }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="task" draggable="false">
                                    <div class="tags">
                                        <span class="tag bg-secondary">Bukti Pembayaran</span>
                                    </div>
                                    <div class="row" style="height: 30vh; align-items:center;justify-content:center;">
                                        @if (!$p->pembayaranId)
                                            <p>Belum Ada Pembayaran</p>
                                        @else
                                            <img class="buktibayar" src="{{ asset('pembayaran/' . $p->pembayaranBukti) }}"
                                                alt="" style="height: 100%;width: 50%;align-items: center;">
                                        @endif






                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="task" draggable="false">
                                    <div class="tags">
                                        <button type="button" class="btn tag btn-danger " onclick="aksi(0)">Tolak</button>
                                        <button type="button" class="btn tag btn-success "
                                            onclick="aksi(1)">Approve</button>
                                        <form action="{{ route('verifikasiPembayaran') }}" method="POST"
                                            id="formVerifikasi">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{ $p->id }}">
                                            <input type="hidden" name="pembayaran_id" value="{{ $p->pembayaranId }}">
                                            <input type="hidden" name="stat" value="" id="stat">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

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


        });

        function aksi(status) {
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                showCancelButton: true,
                confirmButtonText: "Save",
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#stat').val(status);
                    $('#formVerifikasi').submit();
                }
            });
        }
    </script>
@endSection
