@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1><div class="text-center">
    Akun</div>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Pengguna</a></li>
    <li><a href="#">Daftar Akun</a></li>
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
                        <div class="text-center">
                            <div class="col-xs-6">
                                <a href="{{url('/admin/akun_siswa')}}" class="btn btn-primary btn-lg">Akun Siswa</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="{{url('/admin/akun_guru')}}" class="btn btn-primary btn-lg">Akun Guru</a>
                            </div>   
                        </div>    
                    </div>
                <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection