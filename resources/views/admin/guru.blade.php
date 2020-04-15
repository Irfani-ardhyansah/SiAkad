@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Daftar Guru
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Guru</a></li>
</ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Nomor Induk Pegawai</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($guru as $data)
                        <tr>
                            <td>{{ $data -> nip }}</td>
                            <td><a href="{{ url('/admin/guru/' .$data->id. '/profile') }}"> {{$data->nama}} </a></td>
                            <td>{{ $data -> gender }}</td>
                            <td>{{ $data -> alamat }}</td>

                            @if (sizeof($data->user) > 0)
                            <td> <span class="btn  btn-xs btn-rounded btn-info disabled">Aktif</span> </td>
                            @else
                            <td> <span class="btn  btn-xs btn-rounded btn-danger disabled">Tidak Aktif</span> </td>
                            @endif

                            <td>
                                <form action="{{ url('/admin/guru/' . $data -> id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" class="form-control">
                                        <a href="{{ url('/admin/guru/' . $data->id . '/edit') }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        {{ $guru->links() }}
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

    <!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Guru</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group col-xs-6">
                            <label for="nama">Nomor Induk Pegawai</label>
                            <input name="nip" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nip') }}" placeholder="Masukkan Nomor Induk Pegawai">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Nama</label>
                            <input name="nama" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('nama') }}" placeholder="Masukkan Nomor Induk Pegawai">
                        </div>  
                        
                        <div class="form-group col-xs-12">
                            <label for="alamat">Alamat</label>
                            <textarea style="resize:none" name="alamat" class="form-control" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('alamat') }}" rows="2"></textarea>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="nama">Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-xs-6">
                            <label for="nama">Tanggal Lahir</label>
                            <input name="tanggal_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('tanggal_lahir') }}" placeholder="dd/mm/yyyy">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="nama">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('tempat_lahir') }}" placeholder="Masukkan Tempat Lahir">
                        </div> 
                        
                        <div class="form-group col-xs-6">
                            <label for="nama">No Hp</label>
                            <input name="no_hp" type="number" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('no_hp') }}" placeholder="08xxxx">
                        </div>  

                        <div class="form-group col-xs-6">
                            <label for="avatar">Picture</label>
                            <input type="file" name="avatar" class="form-control">
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