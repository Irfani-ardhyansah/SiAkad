@extends('guru.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nilai Siswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Nilai</a></li>
        <li><a href="#">Nilai Siswa</a></li>
    </ol>
</section>

<!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalAdd"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai UTS</th>
                                    <th>Nilai UAS</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($nilai as $data)
                                <tr>
                                    <td>{{$data-> mapel -> nama_mapel}}</td>
                                    <td>{{$data -> uts}}</td>
                                    <td>{{$data -> uas}}</td>
                                    @if( ($data -> uts + $data -> uas) / 2 >= 77)
                                    <td>Nilai Memenuhi</td>
                                    @else
                                    <td>Nilai Tidak Memenuhi</td>
                                    @endif
                                    <th><form action="{{ url('/guru/nilai/' . $siswa -> id. '/' . $data->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/guru/nilai/' .$siswa -> id. '/edit/'. $data->id) }}" class="btn btn-warning btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')"> <i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                        {{-- <a href="{{ url('/guru/nilai/'. $siswa->id.'/eksten/' . $data->mapel_id) }}" class="btn btn-success btn-xs"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> --}}
                                    </form></th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
      <!-- /.content -->

      <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="anggotaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data <b>Nilai Siswa</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        @csrf
                            <div class="form-group col-xs-6">
                                <label for="nama">Mapel</label>
                                <select name="mapel_id" class="form-control" required>
                                    <option value="">Pilih</option>
                                    @foreach($mapel as $data)
                                    <option value="{{ $data->id }}"> {{$data->nama_mapel}} </option>
                                    @endforeach
                                </select>
                            </div> 
                            
                            <div class="form-group col-xs-6">
                                <label for="nama">Nilai UTS</label>
                                <input name="uts" type="number" class="form-control" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('uts') }}" placeholder="Masukkan Nomor Induk Pegawai">
                            </div>  

                            <div class="form-group col-xs-6">
                                <label for="nama">Nilai UAS</label>
                                <input name="uas" type="number" class="form-control" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ old('uas') }}" placeholder="Masukkan Nomor Induk Pegawai">
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