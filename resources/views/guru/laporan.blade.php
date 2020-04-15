@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Laporan
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Laporan</a></li>
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
                            <th>Wali Kelas</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelas as $data)
                        <tr>
                            <td>{{$data->kelas}}</td>
                            @if($data->data_guru_id != null)
                                @foreach($guru as $gur)
                                    @if ($data->data_guru_id == $gur->id)
                                        @foreach($gur->user as $g)
                                            <td>{{ $g -> name }}</td>
                                        @endforeach
                                    @endif
                                @endforeach
                            @else 
                            <td>-</td>
                            @endif
                            <td>
                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-o" aria-hidden="true"></i></a>
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