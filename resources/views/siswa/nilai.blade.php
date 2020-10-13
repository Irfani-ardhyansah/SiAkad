@extends('siswa.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Nilai
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Akademik</a></li>
    <li><a href="#">Nilai</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="/siswa/nilal/cetak_pdf" class="btn btn-success btn-sm"><i class="fa fa-print" aria-hidden="true"></i></a>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Pelajaran</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($nilai as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->mapel->nama_mapel}}</td>
                            <td>{{$data->uts}}</td>
                            <td>{{$data->uas}}</td>
                            <td>{{($data->uts + $data->uas) / 2}}</td>
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