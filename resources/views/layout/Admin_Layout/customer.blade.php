@extends('layout.Admin_layout.main_layout.main')
@section('style')
<style>
  .card-header button{
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
              <div class="row">
                <div class="col-6"><h3 class="card-title">DataTable with default features</h3></div>
              </div>
              
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
                  @foreach($data as $p)
                    <tr>
                      <td>1</td>
                      <td>{{ $p->name }}</td>
                      <td>{{ $p->account->email }}</td>
                      <td>{{ $p->phone }}</td>
                      <td>{{ $p->alamat }}</td>
                      <td class="d-flex flex-row" style="gap: 10px">
                        <button type="button" class="btn btn-warning btn-xs" style="width: 50%" id="editButton" data-toggle="modal" data-target="#modal-lg-update-{{ $p->id}}" ><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn  btn-danger btn-xs" style="margin-top: 0;width: 50%" id="deleteButton" ><i class="fas fa-solid fa-trash"></i></button>
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
  @foreach($data as $p)

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
            <form>
              <div class="card-body">
                <div class="row">
                <div class="form-group col-6">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" placeholder="nama" value="{{ $p->name }}">
                </div><div class="form-group col-6">
                  <label for="hp">No Hp</label>
                  <input type="number" class="form-control" id="hp" placeholder="hp" value="{{ $p->phone }}">
                </div>
              </div><div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" id="alamat" placeholder="alamat" >{{ $p->alamat }}</textarea>
                </div>
                <div class="form-group-email">
                  <label for="email">Alamat Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ $p->account->email }}">
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": [{
    //             "text": "Tambah Customer",
    //             "className": "btn btn-primary btn-info",
    //             "action": function() {
    // $('#modal-lg').modal('show');
    //             }
    //         }],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>
@endSection
