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
          <!-- /.card-header -->
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
                @foreach($data as $kategori)
                <tr>
                  <div class="row">
                    <td class="col-1" style="width: 10%">{{ $num++ }}</td>
                    <td class="col-3" style="width: 20%"> {{  Str::upper($kategori->nama) }}</td>
                    <td class="col-6 deskripsi"> {{ $kategori->deskripsi != " "? $kategori->deskripsi :"Belum Ada Deskripsi" }}</td>
                    <td class="d-flex flex-row" style="gap: 10px">
                      <button type="button" class="btn btn-warning btn-xs" style="width: 50%" data-toggle="modal" data-target="#modal-update-{{ $kategori->id}}"><i class="fas fa-edit"></i></button>
                      <button type="button" class="btn  btn-danger btn-xs" style="margin-top: 0;width: 50%" id="deleteButton" onclick="hapusKategori({{ $kategori->id }});"><i class="fas fa-solid fa-trash"></i></button>
                      <form action="{{ route('deleteKategori', ['id' => $kategori->id]) }}" method="post" id="formHapusKategori{{ $kategori->id }}">
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
        <h4 class="modal-title">Tambah Kategori Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/kategori" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" placeholder="Kategori Produk" name="nama">
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

@foreach ($data as $kategori )
<div class="modal fade" id="modal-update-{{ $kategori->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kategori Produk</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/updateKategori/{{ $kategori->id }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <!-- text input -->
              <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" placeholder="Kategori Produk" name="nama" value="{{ $kategori->nama }}">
              </div>
            </div>
            <div class="col-sm-12">
              <!-- textarea -->
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="3" placeholder="Penjelasan Singkat" name="deskripsi">{{ $kategori->deskripsi }}</textarea>
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
      "autoWidth": true,
        "buttons": [{
                  "text": "Tambah Kategori",
                  "className": "btn btn-primary btn-info",
                  "action": function() {
      $('#modal-add').modal('show');
                  }
              }],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    

  });

function hapusKategori(id){
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $('form#formHapusKategori'+id).submit();
  }
})
}
</script>
@endSection