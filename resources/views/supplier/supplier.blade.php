@extends('layouts.app')
@section('content')

<main class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Supplier</strong> Data</h1>
        <div class="row">
            <div class="">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0"></h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Tambah
                        </button>
                    </div>
                    <table class="table table-striped my-0 table-responsive">
                        <thead>
                            <tr>
                                <th>No. </th>
                                <th>Nama Supplier</th>
                                <th>Kontak</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $index => $d)
                            <tr>
                              <td>{{ $index+1}}</td>
                              <td>{{ $d->nama_supplier}}</td>
                              <td>{{ $d->kontak}}</td>
                              <td>{{ $d->deskripsi}}</td>
                              <td>
                                <button type="button" class="btn btn-primary" onclick="editdata({{ $d->id_supplier }})">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $d->id_supplier }})">Hapus</button>

                                <!-- Form untuk hapus -->
                                <form method="POST" action="{{ route('karyawan.destroy', $d->id_supplier) }}" id="formDelete{{ $d->id_supplier }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Data Supplier</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Nama Supplier</label>
                  <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Kontak</label>
                  <input type="text" class="form-control" id="kontak" name="kontak" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" required placeholder="">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- MODAL EDIT DATA --}}
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{ route('supplier.update') }}">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="edit_nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="hidden" name="id_supplier" id="editId">
                    <input type="text" class="form-control" id="edit_nama_supplier" name="nama_supplier" required>
                  </div>
                  <div class="mb-3">
                      <label for="editNama" class="form-label">Kontak</label>
                      <input type="text" class="form-control" id="edit_kontak" name="kontak" required>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="edit_deskripsi" name="deskripsi" required placeholder="">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- MODAL EDIT DATA --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      function confirmDelete(id) {
          Swal.fire({
              title: 'Apakah Anda yakin?',
              text: 'Data yang dihapus tidak dapat dikembalikan!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus!',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  document.getElementById('formDelete' + id).submit();
              }
          });
      }

      function editdata (id) {
        $.get(apiUrl + "supplier/" + id, function(data, status){
          console.log('data');
            console.log(data.nama_karyawan);
            $('#editId').val(data.id_supplier);
            $('#edit_nama_supplier').val(data.nama_supplier);
            $('#edit_deskripsi').val(data.deskripsi);
            $('#edit_kontak').val(data.kontak);
            $("#myModal").modal('show');
        });
      }

      $(document).ready(function(){
      });
    </script>  
  </main>
@endsection