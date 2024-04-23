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
        <h1 class="h3 mb-3"><strong>Barang Produk</strong> Data</h1>
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
                                <th>Kode Barang</th>
                                <th>Kategori Barang</th>
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $index => $d)
                            <tr>
                              <td>{{ $index+1}}</td>
                              <td>{{ $d->kd_barang}}</td>
                              <td>{{ $d->kategori_barang}}</td>
                              <td>{{ $d->nama_barang}}</td>
                              <td>{{ $d->supplier->nama_supplier}}</td>
                              <td>{{ $d->satuan_barang}}</td>
                              <td>{{ number_format($d->harga_barang)}}</td>
                              <td>{{ $d->deskripsi}}</td>
                              <td>
                                <button type="button" class="btn btn-success" onclick="viewdata({{ $d->id_barang }})">View</button>
                                <button type="button" class="btn btn-primary" onclick="editdata({{ $d->id_barang }})">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $d->id_barang }})">Hapus</button>

                                <!-- Form untuk hapus -->
                                <form method="POST" action="{{ route('barang.destroy', $d->id_barang) }}" id="formDelete{{ $d->id_barang }}">
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
            <h5 class="modal-title" id="exampleModalLabel">Form Data Barang</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Kode Barang</label>
                  <input type="text" class="form-control" id="kd_barang" name="kd_barang" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Kategori Barang</label>
                  <select name="kategori_barang" id="kategori_barang" class="form-control">
                    <option value="-">Pilih</option>
                    <option value="Makanan">Makanan</option>
                    <option value="Minuman">Minuman</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Supplier</label>
                  <select name="supplier_id" id="supplier_id" class="form-control">
                    <option value="-">Pilih</option>
                    @foreach ($supplier as $index => $s)
                      <option value="{{ $s->id_supplier}}">{{ $s->nama_supplier}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Satuan Barang</label>
                  <select name="satuan_barang" id="satuan_barang" class="form-control">
                    <option value="-">Pilih</option>
                    <option value="Gram">Gram</option>
                    <option value="Liter">Liter</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Harga</label>
                  <input type="text" class="form-control" id="harga_barang" name="harga_barang" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Deskripsi</label>
                  <input type="text" class="form-control" id="deskripsi" name="deskripsi" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Gambar Barang</label>
                  <input type="file" class="form-control" id="gambar" name="gambar" required placeholder="">
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
                    <input type="hidden" name="id_barang" id="editId">
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

    {{-- MODAL VIEW DATA --}}
    <div class="modal fade" id="myModalview" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Informmasi Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <div class="mb-3">
                      <label for="editNama" class="form-label"></label>
                      <img src="" alt="" id="viewPhoto" class="img-fluid">
                  </div>
                  <table class="table table-striped">
                    <tbody>
                      <tr>
                        <td>Kode Barang</td>
                        <td>: <span id="v0"></span></td>
                      </tr>
                      <tr>
                        <td>Kategori Barang</td>
                        <td>: <span id="v1"></span></td>
                      </tr>
                      <tr>
                        <td>Nama Barang</td>
                        <td>: <span id="v2"></span></td>
                      </tr>
                      <tr>
                        <td>Nama Supplier</td>
                        <td>: <span id="v3"></span></td>
                      </tr>
                      <tr>
                        <td>Satuan Barang</td>
                        <td>: <span id="v4"></span></td>
                      </tr>
                      <tr>
                        <td>Harga Barang</td>
                        <td>: <span id="v5"></span></td>
                      </tr>
                      <tr>
                        <td>Deskripsi</td>
                        <td>: <span id="v6"></span></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
      </div>
    </div>
    {{-- MODAL VIEW DATA --}}

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

      function editdata(id) {
        $.get(apiUrl + "barang/" + id, function(data, status){
          console.log('data');
            console.log(data.nama_karyawan);
            $('#eid').val(data.id_barang);
            $('#e0').text(data.kd_barang);
            $('#e1').text(data.kategori_barang);
            $('#e2').text(data.nama_barang);
            $('#e3').text(data.supplier.nama_supplier);
            $('#e4').text(data.satuan_barang);
            $('#e5').text(data.harga_barang);
            $('#e6').text(data.deskripsi);
            $('#viewPhoto').attr('src', '{{ asset('storage') }}/' + data.gambar);
            $("#myModal").modal('show');
        });
      }

      function viewdata (id) {
        $.get(apiUrl + "barang/" + id, function(data, status){
          console.log('data');
            console.log(data);
            $('#v0').text(data.kd_barang);
            $('#v1').text(data.kategori_barang);
            $('#v2').text(data.nama_barang);
            $('#v3').text(data.supplier.nama_supplier);
            $('#v4').text(data.satuan_barang);
            $('#v5').text(data.harga_barang);
            $('#v6').text(data.deskripsi);
            $('#viewPhoto').attr('src', '{{ asset('storage') }}/' + data.gambar);
            $("#myModalview").modal('show');
        });
      }

      $(document).ready(function(){
      });
    </script>  
  </main>
@endsection