@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Siswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Siswa</a></li>
        <li><a href="#">Daftar Siswa</a></li>
    </ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tablesiswa" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nomor Induk</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach($siswa as $data)
                                <tr>
                                    <td>{{$data -> nisn}}</td>
                                    <td><a href="{{ url('/guru/siswa/' .$data->id. '/profile') }}">{{$data -> nama}}</a></td>
                                    <td>{{$data -> alamat}}</td>
                                    <td>{{@$data->kelas->kelas}}</td>
                                    <td>
                                        <form action="{{ url('/guru/siswa/' . $data -> id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                                <a href="{{ url('/guru/siswa/' .$data -> id. '/edit') }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody> --}}
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
      <!-- /.content -->

      <!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Siswa</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-xs-6">
                            <label for="nama">Nomor Induk Siswa</label>
                            <input name="nisn" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nisn') }}" placeholder="Masukkan Nomor Induk Pegawai">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                        </div>  

                        <div class="form-group  col-xs-12">
                            <label for="alamat">Alamat</label>
                            <textarea style="resize:none" name="alamat" class="form-control" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('alamat') }}" rows="2"></textarea>
                        </div>

                        <div class="form-group  col-xs-6">
                            <label for="nama">Kelas</label>
                            <select name="kelas_id" class="form-control" required>
                                <option value="">Pilih</option>
                                @foreach($kelass as $data)
                                <option value="{{ $data->id }}"> {{$data->kelas}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Pilih</option>
                                <option value="Laki-laki"> Laki-laki </option>
                                <option value="Perempuan"> Perempuan </option>
                            </select>
                        </div> 
                        
                        <div class="form-group col-xs-6">
                            <label for="nama">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir">
                        </div> 

                        <div class="form-group col-xs-6">
                            <label for="nama">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('tanggal_lahir') }}" placeholder="dd/mm/yyyy">
                        </div> 

                        <div class="form-group col-xs-6">
                            <label for="nama">No Hp</label>
                            <input name="no_hp" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('no_hp') }}" placeholder="08xxxx">
                        </div> 

                        <div class="form-group col-xs-6">
                            <img id="foto_preview_siswa" class="profile-user-img img-responsive" style="height: 150px; width: 150px; display: block;">
                            <label for="avatar">Picture</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </div>

                        {{-- Data Ortu Wali --}}

                        <div class="form-group col-xs-6">
                            <label for="nama">Nama Ortu / Wali</label>
                            <input name="nama_ortu_wali" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nama_ortu_wali') }}" placeholder="Masukkan Nama">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Tanggal Lahir Ortu / Wali</label>
                            <input name="tanggal_ortu_wali" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('tanggal_ortu_wali') }}" placeholder="dd/mm/yyyy">
                        </div> 

                        <div class="form-group col-xs-12">
                            <label for="alamat">Alamat Ortu / Wali</label>
                            <textarea style="resize:none" name="alamat_ortu" class="form-control" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('alamat_ortu') }}" rows="2"></textarea>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="nama">No Hp Ortu / Wali</label>
                            <input name="no_hp_ortu" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('no_hp_ortu') }}" placeholder="08xxxx">
                        </div> 
                    </div>
                    <div class="modal-footer col-md-auto">
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                </form>
        </div>
    </div>
  </div>
@endsection