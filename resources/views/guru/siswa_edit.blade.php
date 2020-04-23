@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Siswa
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Edit Siswa</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Data <b>Siswa</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/guru/siswa/' . $siswa->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group col-xs-6">
                                <label for="nama">Nomor Induk Siswa</label>
                                <input name="nisn" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->nisn }}">
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->nama }}">
                            </div>  
    
                            <div class="form-group col-xs-12">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize:none" name="alamat" class="form-control" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" rows="2">{{ $siswa->alamat }}</textarea>
                            </div>
 
                            <div class="form-group col-xs-6">
                                <label for="nama">Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki"  @if($siswa->gender==='Laki-laki') selected='selected' @endif> Laki-laki </option>
                                    <option value="Perempuan"  @if($siswa->gender==='Perempuan') selected='selected' @endif> Perempuan </option>
                                </select>
                            </div>  

                            <div class="form-group col-xs-6">
                                <label for="nama">Kelas</label>
                                <select name="kelas_id" class="form-control" required>
                                    @foreach($kelass as $data)
                                    <option value="{{ $data->id }}"  @if($data->kelas===$siswa->kelas->kelas) selected='selected' @endif> {{$data->kelas}} </option>
                                    @endforeach
                                </select>
                            </div>  
                            
                            <div class="form-group col-xs-6">
                                <label for="nama">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->tempat_lahir }}">
                            </div> 
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->tanggal_lahir }}">
                            </div> 
    
                            <div class="form-group col-xs-6">
                                <label for="nama">No Hp</label>
                                <input name="no_hp" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->no_hp }}">
                            </div> 
    
                            <div class="form-group col-xs-6">
                                <label for="avatar" class="pull-left">Picture</label>
                                <div class="form-group col-xs-6">
                                    <img src="{{ asset('images/' . $siswa->avatar) }}" id="foto_preview_siswa" class="profile-user-img img-responsive pull-left" style="height: 150px; width: 150px; display: block;">
                                </div>
                                <input type="file" name="avatar" id="avatar"  class="form-control">
                            </div>

                            {{-- Data Ortu Wali --}}
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Nama Ortu / Wali</label>
                                <input name="nama_ortu_wali" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->nama_ortu_wali }}">
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Tanggal Lahir Ortu / Wali</label>
                                <input name="tanggal_ortu_wali" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->tanggal_ortu_wali }}">
                            </div> 
    
                            <div class="form-group col-xs-12">
                                <label for="alamat">Alamat Ortu / Wali</label>
                                <textarea style="resize:none" name="alamat_ortu" class="form-control" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" rows="2">{{ $siswa->alamat_ortu }}</textarea>
                            </div>
    
                            <div class="form-group col-xs-6">
                                <label for="nama">No Hp Ortu / Wali</label>
                                <input name="no_hp_ortu" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $siswa->no_hp_ortu }}">
                            </div>   

                            <div class="form-group col-xs-12">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
            <!-- /.box-body -->
        </div>
            <!-- /.box -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection