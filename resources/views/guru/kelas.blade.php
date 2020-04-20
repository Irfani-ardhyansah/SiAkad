@extends('guru.layouts.app')

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
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
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
                        {{-- <td>
                            <form action="{{ url('/admin/kelas/' . $data -> id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT" class="form-control">
                                    <a href="{{ url('/admin/kelas/edit/' . $data->id) }}" class="btn btn-success btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                <button class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Wali Kelas?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                            </form>
                        </td> --}}
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

@endsection