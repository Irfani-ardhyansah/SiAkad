@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Jadwal Mata Pelajaran
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Jadwal</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Jam</th>
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jum'at</th>
                            <th>Sabtu</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $data)
                        <tr>
                            <td>{{$data->jam}}</td>
                            <td>{{$data->senin}}</td>
                            <td>{{$data->selasa}}</td>
                            <td>{{$data->rabu}}</td>
                            <td>{{$data->kamis}}</td>
                            <td>{{$data->jumat}}</td>
                            <td>{{$data->sabtu}}</td>
                            <td>
                                <form action="{{ url('/guru/jadwal/' . $kelas-> id. '/' . $data->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                        <a href="{{ url('/guru/jadwal/' .$kelas -> id. '/edit/'. $data->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Jadwal</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-xs-12">
                            <label for="nama">Jam</label>
                            <input name="jam" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('jam') }}" placeholder="ex.(07.00 - 07.45)">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Senin</label>
                            <select name="senin" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Selasa</label>
                            <select name="selasa" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Rabu</label>
                            <select name="rabu" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Kamis</label>
                            <select name="kamis" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Jum'at</label>
                            <select name="jumat" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Sabtu</label>
                            <select name="sabtu" class="form-control">
                                <option value="">Pilih</option>
                                @foreach($mapel as $data)
                                <option value="{{ $data->nama_mapel }}"> {{$data->nama_mapel}} </option>
                                @endforeach
                            </select>
                        </div>  
                    </div>
                    <div class="modal-footer col-xs-13">
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                </form>
        </div>
    </div>
  </div>
@endsection