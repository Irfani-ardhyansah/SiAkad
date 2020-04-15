@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Daftar Siswa
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Data Siswa</a></li>
    <li><a href="#">Daftar Siswa</a></li>
  </ol>
</section>

  <!-- Main content -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tabel Siswa</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor Induk</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($siswa as $data)
                  <tr>
                    <td>{{$data -> nisn}}</td>
                    <td>{{$data -> nama}}</td>
                    <td>{{$data -> gender}}</td>
                    <td>{{$data -> alamat}}</td>
                    <td>{{$data -> kelas -> kelas }}</td>

                    @if (empty($data->user))
                      <td> <span class="btn  btn-xs btn-rounded btn-danger disabled">Tidak Aktif</span> </td> 
                    @else
                      <td> <span class="btn  btn-xs btn-rounded btn-info disabled">Aktif</span> </td>
                    @endif

                    <td>
                      <form action="{{ url('/admin/siswa/' . $data -> id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                            <a href="{{ url('/admin/siswa/' . $data -> id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                    </form>
                    </td>
                  </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $siswa->render() }}
              </div>
              <!-- /.box-body -->
            </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        <!-- /.row -->
      </section>
      <!-- /.content -->
@endsection