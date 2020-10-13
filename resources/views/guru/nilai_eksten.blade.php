@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nilai Siswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Nilai</a></li>
        <li><a href="#">Nilai Siswa</a></li>
    </ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3>
                        @foreach ($nilai as $data)
                        {{$data -> mapel -> nama_mapel}}
                        @endforeach
                    </h3>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>KD</th>
                                    <th>Tema 1</th>
                                    <th>Tema 2</th>
                                    <th>Tema 3</th>
                                    <th>Tema 4</th>
                                    <th>NPH</th>
                                    <th>NPTS</th>
                                    <th>NPAS</th>
                                    <th>Nilai KD</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $data)
                                <tr>
                                    <td>{{$data-> mapel -> nama_mapel}}</td>
                                    <td>{{$data -> uts}}</td>
                                    <td>{{$data -> uas}}</td>
                                    @if($data -> uts + $data -> uas / 2 >= 77)
                                    <td>Nilai Memenuhi</td>
                                    @else
                                    <td>Nilai Tidak Memenuhi</td>
                                    @endif
                                    <th><form action="{{ url('/guru/nilai/' . $siswa -> id. '/' . $data->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/guru/nilai/' .$siswa -> id. '/edit/'. $data->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                    </form></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection