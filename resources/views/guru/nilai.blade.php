@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Daftar Nilai Siswa
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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nomor Induk</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($siswa as $data)
                                <tr>
                                    <td><a href="{{url('/guru/nilai/'. $data -> id)}}"><span class="btn  btn-xs btn-rounded btn-primary"><i class="fa fa-info" aria-hidden="true"></i></span></a>
                                        <a href="{{ url('/guru/nilai/'. $data->id) }}" class="btn btn-success btn-xs"><i class="fa fa-file-o" aria-hidden="true"></i></a>
                                    </td>   
                                    <td>{{$data -> nisn}}</td>
                                    <td>{{$data -> nama}}</td>
                                    <td>{{$data -> gender}}</td>
                                    <td>{{@$data -> kelas -> kelas}}</td>
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
      <!-- /.content -->
@endsection