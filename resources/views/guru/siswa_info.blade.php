@extends('guru.layouts.app')

@section('content')
    <section class="content-header">
    <h1>
        Profil Siswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{$siswa->getAvatar()}}" alt="User profile picture">

            <h3 class="profile-username text-center">{{$siswa -> nama}}</h3>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Nisn</b> <div class="pull-right">{{$siswa -> nisn}}</div>
                </li>
                <li class="list-group-item">
                    <b>Kelas</b> <div class="pull-right">{{@$siswa->kelas -> kelas}}</div>
                </li>
                <li class="list-group-item">
                    <b>Gender</b> <div class="pull-right">{{$siswa->gender}}</div>
                </li>
            </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active"><a href="#nilai" data-toggle="tab">Nilai</a></li>
            <li><a href="#ortu" data-toggle="tab">Data Orang Tua</a></li>
            </ul>
            <div class="tab-content">
            <div class="active tab-pane" id="nilai">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Nilai UTS</th>
                            <th>Nilai UAS</th>
                            <th>Keterangan</th>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="tab-pane" id="ortu">
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    <b>Nama Orang Tua</b> <div class="pull-right">{{$siswa -> nama_ortu_wali}}</div>
                    </li>
                    <li class="list-group-item">
                    <b>Tanggal Lahir Orang Tua</b> <div class="pull-right">{{$siswa -> tanggal_ortu_wali}}</div>
                    </li>
                    <li class="list-group-item">
                    <b>Alamat Orang Tua</b> <div class="pull-right">{{$siswa -> alamat_ortu}}</div>
                    </li>

                </ul>
            </div>
            <!-- /.tab-pane -->
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    </section>

@endsection