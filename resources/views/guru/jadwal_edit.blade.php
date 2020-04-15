@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Edit Jadwal
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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ url('/guru/jadwal/' . $kelas->id. '/edit/' . $jadwal->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group col-xs-9">
                                <label for="nama">Jam</label>
                                <input name="jam" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $jadwal->jam }}" placeholder="ex.(07.00 - 07.45)">
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Senin</label>
                                <select name="senin" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->senin) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Selasa</label>
                                <select name="selasa" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->selasa) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Rabu</label>
                                <select name="rabu" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->rabu) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Kamis</label>
                                <select name="kamis" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->kamis) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Jum'at</label>
                                <select name="jumat" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->jumat) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  
    
                            <div class="form-group col-xs-6">
                                <label for="nama">Sabtu</label>
                                <select name="sabtu" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->nama_mapel }}" @if($data->nama_mapel===$jadwal->sabtu) selected='selected' @endif> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div>  

                            <div class="form-group col-xs-12 pull-right">
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