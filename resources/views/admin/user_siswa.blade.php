@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Akun
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
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $data)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ @$data -> siswa-> nama  }}</td>                            
                            <td>{{ @$data -> siswa -> kelas -> kelas }}</td>
                            <td>{{$data->password}}</td>
                            <td>
                                <form action="{{ url('/admin/akun_siswa/' . $data -> id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        @endforeach
                        </table>
                        {{$users->links()}}
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