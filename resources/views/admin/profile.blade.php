@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Data Diri
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Pengguna</a></li>
        <li><a href="#">Profile Saya</a></li>
    </ol>
</section>

  <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div  class="tab-content mar-top">
                <div id="tab1" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">

                                        Foto Profile
                                    </h3>

                                </div>
                                <div class="panel-body">
                                    <div class="col-sm-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                    <img src="../adminlte/dist/img/avatar.png" alt="profile pic">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped" id="users">
                                                    <tr>
                                                        
                                                        <td>Nama</td>
                                                        <td>
                                                            {{ $users -> name }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tempat Lahir </td>
                                                        <td>
                                                            - 
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Tanggal Lahir </td>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Email</td>
                                                        <td>
                                                            {{ $users -> email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Jenis Kelamin
                                                        </td>
                                                        <td>
                                                            {{ $users -> gender }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Hp </td>
                                                        <td>
                                                            -
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-10">    
                                            <a href="" class="btn btn-primary"> Edit Profile</a>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <form class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputpassword" class="col-md-3 control-label">
                                                Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password" id="password" placeholder="Password"
                                                            class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnumber" class="col-md-3 control-label">
                                                Confirm Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                            </span>
                                                    <input type="password" id="password-confirm" placeholder="Password"
                                                            class="form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" id="change-password">Submit
                                            </button>
                                            &nbsp;
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            &nbsp;
                                            <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
</section>
    <!-- /.content -->
@endsection