@extends('admin.layouts.app')

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
        <div class="box ">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{$guru->getAvatar()}}" alt="User profile picture">

            <h3 class="profile-username text-center">{{$guru -> nama}}</h3>

            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <strong><div class="text-center">{{$guru -> nip}}</div></strong>
                </li>
            </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box -->
        </div>

        z
        <!-- /.col -->
        <div class="col-md-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#nilai" data-toggle="tab">Data Diri</a></li>
                </ul>
                <div class="tab-content">

                <div class="active tab-pane" id="ortu">
                    <ul class="list-group list-group-unbordered">
                        <strong><i class="fa fa-neuter margin-r-5"></i> Gender</strong>
                        <p class="text-muted mt-5">
                            {{$guru->gender}}
                        </p>
                        <hr>
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                        <p class="text-muted margin-top-4">{{$guru -> alamat}}</p>
                        <hr>
                        <strong><i class="fa fa-circle margin-r-5"></i> Tempat Lahir</strong>
                        <p class="text-muted">{{$guru -> tempat_lahir}}</p>
                        <hr>
                        <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Lahir</strong>
                        <p class="text-muted">{{$guru -> tanggal_lahir}}</p>
                        <hr>
                        <strong><i class="fa fa-mobile margin-r-5"></i> No Hp </strong>
                        <p class="text-muted">{{$guru -> no_hp}}</p>
                        <hr>
    
                    </ul>
                </div>
                <!-- /.tab-pane -->
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </div>
        
    <!-- /.row -->

    </section>

@endsection