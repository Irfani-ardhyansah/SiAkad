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

    <!-- Default box -->
    <!-- Default box -->
    <div class="box">
      <div class="col-md-9">
        <div class="box-body">
          @if (session('success'))
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {!! session('success') !!}
              </div>
          @endif
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-body no-padding">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /. box -->
          </div>
      </div>
    </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection