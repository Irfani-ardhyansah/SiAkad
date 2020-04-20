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
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($kelas as $kelas)
                        <tr>
                            <td>{{ $kelas->kelas }}</td>
                            <td>
                                <a href="{{ url('/guru/jadwal/'. $kelas->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="{{ url('/guru/jadwal/'. $kelas->id . '/print') }}" class="btn btn-success btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
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
@endsection