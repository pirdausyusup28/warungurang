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
        <h1 class="h3 mb-3"><strong>Karyawan</strong> Data</h1>
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
                                <th>Nama Karyawan</th>
                                <th>NIK Karyawan</th>
                                <th>Jenis Kelamin</th>
                                <th>No HP</th>
                                <th>Status Karyawan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $index => $d)
                            <tr>
                              <td>{{ $index+1}}</td>
                              <td>{{ $d->nama_karyawan}}</td>
                              <td>{{ $d->nik_karyawan}}</td>
                              <td>{{ $d->jk_karyawan}}</td>
                              <td>{{ $d->no_hp_karyawan}}</td>
                              <td>{{ $d->status_karyawan}}</td>
                              <td>
                                <button type="button" class="btn btn-success" onclick="viewdata({{ $d->id_karyawan }})">View</button>
                                <button type="button" class="btn btn-primary" onclick="editdata({{ $d->id_karyawan }})">Edit</button>
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $d->id_karyawan }})">Hapus</button>

                                <!-- Form untuk hapus -->
                                <form method="POST" action="{{ route('karyawan.destroy', $d->id_karyawan) }}" id="formDelete{{ $d->id_karyawan }}">
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
            <h5 class="modal-title" id="exampleModalLabel">Form Data Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                  <label for="formGroupExampleInput" class="form-label">NIK Karyawan</label>
                  <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Nama Karyawan</label>
                  <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Tgl Lahir Karyawan</label>
                  <input type="date" class="form-control" id="tgl_lahir_karyawan" name="tgl_lahir_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Jenis Kelamin Karyawan</label>
                  <select name="jk_karyawan" id="jk_karyawan" class="form-control form-select" required>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">No Hp Karyawan</label>
                  <input type="text" class="form-control" id="no_hp_karyawan" name="no_hp_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Alamat Karyawan</label>
                  <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Tgl Mulai Kerja</label>
                  <input type="date" class="form-control" id="tgl_mulai_kerja_karyawan" name="tgl_mulai_kerja_karyawan" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Photo</label>
                  <input type="file" class="form-control" id="photo" name="photo" required placeholder="">
                </div>
                <div class="mb-3">
                  <label for="formGroupExampleInput2" class="form-label">Status Karyawan</label>
                  <select name="status_karyawan" id="status_karyawan" class="form-control form-select" required>
                    <option value="K">Kontrak</option>
                    <option value="T">Tetap</option>
                    <option value="M">Magang</option>
                    <option value="NA">Non Aktif</option>
                  </select>
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
                <h5 class="modal-title" id="editModalLabel">Edit Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <form method="POST" action="{{ route('karyawan.update') }}">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="editNik" class="form-label">NIK Karyawan</label>
                    <input type="hidden" name="id_karyawan" id="editId">
                    <input type="text" class="form-control" id="editNik" name="nik_karyawan" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="editNama" class="form-label">Nama Karyawan</label>
                      <input type="text" class="form-control" id="editNama" name="nama_karyawan" required>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tgl Lahir Karyawan</label>
                    <input type="date" class="form-control" id="editTglLahir" name="tgl_lahir_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="editJk" class="form-label">Jenis Kelamin Karyawan</label>
                      <select name="jk_karyawan" id="editJk" class="form-control form-select" required>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label for="editNoHp" class="form-label">No Hp Karyawan</label>
                      <input type="text" class="form-control" id="editNoHp" name="no_hp_karyawan" required>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Alamat Karyawan</label>
                    <input type="text" class="form-control" id="editAlamat" name="alamat_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tgl Mulai Kerja</label>
                    <input type="date" class="form-control" id="editTglKerja" name="tgl_mulai_kerja_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="editStatus" class="form-label">Status Karyawan</label>
                      <select name="status_karyawan" id="editStatus" class="form-control form-select" required>
                          <option value="K">Kontrak</option>
                          <option value="T">Tetap</option>
                          <option value="M">Magang</option>
                          <option value="NA">Non Aktif</option>
                      </select>
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
                <h5 class="modal-title" id="editModalLabel">Informmasi Data Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <div class="mb-3">
                      <label for="editNama" class="form-label">Photo</label>
                      <img src="" alt="" id="viewPhoto" class="img-fluid">
                  </div>
                  <div class="mb-3">
                    <label for="editNik" class="form-label">NIK Karyawan</label>
                    <input type="hidden" name="id_karyawan" id="veditId">
                    <input type="text" class="form-control" id="veditNik" name="nik_karyawan" readonly>
                  </div>
                  <div class="mb-3">
                      <label for="editNama" class="form-label">Nama Karyawan</label>
                      <input type="text" class="form-control" id="veditNama" name="nama_karyawan" required>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tgl Lahir Karyawan</label>
                    <input type="date" class="form-control" id="veditTglLahir" name="tgl_lahir_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="editJk" class="form-label">Jenis Kelamin Karyawan</label>
                      <input type="text" class="form-control" id="veditJk" name="jk_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="editNoHp" class="form-label">No Hp Karyawan</label>
                      <input type="text" class="form-control" id="veditNoHp" name="no_hp_karyawan" required>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Alamat Karyawan</label>
                    <input type="text" class="form-control" id="veditAlamat" name="alamat_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tgl Mulai Kerja</label>
                    <input type="date" class="form-control" id="veditTglKerja" name="tgl_mulai_kerja_karyawan" required placeholder="">
                  </div>
                  <div class="mb-3">
                      <label for="editStatus" class="form-label">Status Karyawan</label>
                      <input type="date" class="form-control" id="veditStatus" name="status_karyawan" required placeholder="">
                  </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Cetak ID Card</button>
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

      function editdata (id) {
        $.get(apiUrl + "karyawan/" + id, function(data, status){
          console.log('data');
            console.log(data.nama_karyawan);
            $('#editId').val(data.id_karyawan);
            $('#editNama').val(data.nama_karyawan);
            $('#editNik').val(data.nik_karyawan);
            $('#editJk').val(data.jk_karyawan);
            $('#editTglLahir').val(data.tgl_lahir_karyawan);
            $('#editNoHp').val(data.no_hp_karyawan);
            $('#editAlamat').val(data.alamat_karyawan);
            $('#editTglKerja').val(data.tgl_mulai_kerja_karyawan);
            $('#editStatus').val(data.status_karyawan);
            $("#myModal").modal('show');
        });
      }

      function viewdata (id) {
        $.get(apiUrl + "karyawan/" + id, function(data, status){
          console.log('data');
            console.log(data);
            $('#veditId').val(data.id_karyawan);
            $('#veditNama').val(data.nama_karyawan);
            $('#veditNik').val(data.nik_karyawan);
            $('#veditJk').val(data.jk_karyawan);
            $('#veditTglLahir').val(data.tgl_lahir_karyawan);
            $('#veditNoHp').val(data.no_hp_karyawan);
            $('#veditAlamat').val(data.alamat_karyawan);
            $('#veditTglKerja').val(data.tgl_mulai_kerja_karyawan);
            $('#veditStatus').val(data.status_karyawan);
            $('#viewPhoto').attr('src', '{{ asset('storage') }}/' + data.photo);
            $("#myModalview").modal('show');
        });
      }

      $(document).ready(function(){
      });
    </script>  
  </main>
@endsection