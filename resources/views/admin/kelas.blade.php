@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Kelas
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Siswa</a></li>
    <li><a href="#">Daftar Kelas</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
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
                        @foreach ($kelas as $data)
                        <tr>
                            <td>{{ $data -> kelas }}</td>
                            @if($data->data_guru_id != null)
                                @foreach($guru as $gur)
                                    @if ($data->data_guru_id == $gur->id)
                                        <td>  {{$gur->nama}}</td>
                                    @endif
                                @endforeach
                            @else 
                            <td>-</td>
                            @endif
                            <td>
                                
                                        
                                <form action="{{ url('/admin/kelas/' . $data -> id) }}" method="POST">
                                @csrf
                                <a href="{{ url('/admin/kelas/' . $data->id . '/edit') }}" class="btn btn-success btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <input type="hidden" name="_method" value="PUT" class="form-control">
                                    <button class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Wali Kelas?')"> <i class="fa fa-trash-o"></i> </button>
                                </form>
                                <form action="{{ url('/admin/kelas/' . $data -> id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> Hapus </button>
                                </form>
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

<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Kelas</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Kelas</label>
                            <input name="kelas" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('kelas') }}" placeholder="Masukkan Kelas">
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Tambah Data</button>
                    </div>
                </form>
        </div>
    </div>
  </div>
@endsection