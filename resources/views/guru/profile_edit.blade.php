@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Data Guru
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Profile</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit <b>Profile</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/guru/profile/' . $guru->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group  col-xs-6">
                                <label for="nama">Nomor Induk Pegawai</label>
                                <input name="nip" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $guru->nip }}" placeholder="Masukkan Nomor Induk Pegawai">
                            </div>  

                            <div class="form-group  col-xs-6">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $guru->nama }}" placeholder="Masukkan Nomor Induk Pegawai">
                            </div> 

                            <div class="form-group col-xs-12">
                                <label for="alamat">Alamat</label>
                                <textarea style="resize:none" name="alamat" class="form-control"  required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" rows="2">{{ $guru->alamat }}</textarea>
                            </div>

                            <div class="form-group  col-xs-6">
                                <label for="nama">Jenis Kelamin</label>
                                <select name="gender" class="form-control">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group  col-xs-6">
                                <label for="nama">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $guru->tanggal_lahir }}">
                            </div>  

                            <div class="form-group  col-xs-6">
                                <label for="nama">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $guru->tempat_lahir }}">
                            </div>

                            <div class="form-group col-xs-6">
                                <label for="nama">No Hp</label>
                                <input name="no_hp" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $guru->no_hp }}">
                            </div>  

                            <div class="form-group  col-xs-6">
                                <img id="foto_preview_guru" class="profile-user-img img-responsive" style="height: 150px; width: 150px; display: block;">
                                <label for="avatar">Picture</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>

                            <div class="form-group col-xs-12">
                                <button class="btn btn-success btn-sm">Update</button>
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