@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Mata Pelajaran
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Nilai</a></li>
    <li><a href="#">Mata Pelajaran</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mata Pelajaran</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($mapel as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->kode_mapel}}</td>
                            <td>{{$data->nama_mapel}}</td>
                            <td>
                                <form action="{{ url('/guru/mapel/' . $data -> id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                        <a href="{{ url('/guru/mapel/' . $data->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                </form>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Kelas</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-xs-6">
                            <label for="nama">Kode Mata Pelajaran</label>
                            <input name="kode_mapel" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('kode_mapel') }}" placeholder="Masukkan Kode Mata Pelajaran">
                        </div>  
                        <div class="form-group col-xs-6">
                            <label for="nama">Mata Pelajaran</label>
                            <input name="nama_mapel" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nama_mapel') }}" placeholder="Masukkan Mata Pelajaran">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection