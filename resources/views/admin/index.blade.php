@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Beranda
    <small>Selamat Datang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Beranda</a></li>
  </ol>
</section>
  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Akun Aktif</span>
            <span class="info-box-number">{{$user}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-graduation-cap"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Siswa</span>
            <span class="info-box-number">{{$siswa}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Guru</span>
            <span class="info-box-number">{{$guru}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jumlah Mapel</span>
            <span class="info-box-number">{{$mapel}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection