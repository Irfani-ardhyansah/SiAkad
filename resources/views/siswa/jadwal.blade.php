@extends('siswa.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Jadwal Mata Pelajaran Kelas {{$kelas}}
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Akademik</a></li>
    <li><a href="#">Jadwal Sekolah</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="/siswa/jadwal/cetak_pdf" class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
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