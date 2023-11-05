@extends('layout.Admin_layout.main_layout.main')
@section('style')
<style>
  .card-header button {
    width: 20%;
  }
  .deskripsi{
    text-align: justify;
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
            
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fas fa-check"></i> 
              {{ session('success') }}
            </div>
  
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $num = 1;
                ?>
                @foreach($data as $merk)
                <tr>
                  <div class="row">
                    <td class="col-1" style="width: 5%">{{ $num++ }}</td>
                    <td class="col-3" style="width: 20%"> {{  Str::upper($merk->nama) }}</td>
                    <td class="col-6 deskripsi"> {{ $merk->deskripsi != " "? $merk->deskripsi :"Belum Ada Deskripsi" }}</td>
                    <td class="d-flex flex-row" style="gap: 10px;">
                      <button type="button" class="btn btn-warning btn-xs" style="width: 50%" data-toggle="modal" data-target="#modal-update-{{ $merk->id }} "><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn  btn-danger btn-xs" style="margin-top: 0;width: 50%" id="deleteButton" onclick="hapusMerk({{ $merk->id }});"><i class="fas fa-solid fa-trash"></i></button>
                      <form action="{{ route('deleteMerk', ['id' => $merk->id]) }}" method="post" id="formHapusMerk{{ $merk->id }}">
                        @method('delete')
                        @csrf
                      </form>  
                      
                    </td>
                  </div>
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
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Merk Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/merk" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Merk</label>
                <input type="text" class="form-control" placeholder="Merk Produk" name="nama">
              </div>
            </div>
            <div class="col-sm-12">
              <!-- textarea -->
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="3" placeholder="Penjelasan Singkat" name="deskripsi"></textarea>
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
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

@foreach ($data as $merk )
<div class="modal fade" id="modal-update-{{ $merk->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kategori Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/updateMerk/{{ $merk->id }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Merk</label>
                <input type="text" class="form-control" placeholder="Merk Produk" name="nama" value="{{ $merk->nama }}">
              </div>
            </div>
            <div class="col-sm-12">
              <!-- textarea -->
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="3" placeholder="Penjelasan Singkat" name="deskripsi">{{ $merk->deskripsi }}</textarea>
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
        "buttons": [{
                  "text": "Tambah Merk",
                  "className": "btn btn-primary btn-info",
                  "action": function() {
      $('#modal-add').modal('show');
                  }
              }],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  function hapusMerk(id){
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
    $('form#formHapusMerk'+id).submit();
  }
})
}
</script>
@endSection