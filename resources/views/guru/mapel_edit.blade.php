@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Mapel
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Edit Mapel</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Data <b>Mapel</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/guru/mapel/' . $mapel->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group col-xs-6">
                                <label for="nama">Kode Mata Pelajaran</label>
                                <input name="kode_mapel" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $mapel->kode_mapel }}">
                            </div>  
                            <div class="form-group col-xs-6">
                                <label for="nama">Mata Pelajaran</label>
                                <input name="nama_mapel" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $mapel->nama_mapel }}">
                            </div>    

                            <div class="form-group col-xs-6">
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