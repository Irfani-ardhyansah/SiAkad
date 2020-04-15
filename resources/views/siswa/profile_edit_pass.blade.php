@extends('siswa.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Siswa
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Edit Siswa</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Password <b>Siswa</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif  
                            <form action="{{ url('/siswa/profile/'. $siswa->id .'/edit_password' ) }}" enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('put') }}
         
                                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                                    <label for="current_password" class="col-md-4 control-label">Current Password</label>
         
                                    <div class="col-md-6">
                                        <input id="current_password" type="password" class="form-control" name="current_password" autofocus>
                                        <span class="help-block">{{ $errors->first('current_password') }}</span>
                                    </div>
                                </div>
         
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">New Password</label>
         
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    </div>
                                </div>
         
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password_confirmation" class="col-md-4 control-label">New Password Confirmation</label>
         
                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                    </div>
                                </div>
         
                                <div class="form-group col-xs-11">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">
                                            Change Password
                                        </button>
                                    </div>

                                    <div class="pull-left">    
                                        <a href="{{ url('/siswa/profile/') }}" class="btn btn-link"> Kembali </a>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            <!-- /.box -->
            </div>
            <!-- /.box-body -->
        </div>
            <!-- /.box -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection