@extends('admin.layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
    Pilih Wali Kelas
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
                        <form action="{{ url('/admin/kelas/' . $kelas->id . '/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                        <div class="form-group">
                            <label for="nama">Kelas</label>
                            <input name="kelas" type="text" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" value="{{ $kelas->kelas }}" readonly>
                        </div> 

                        <div class="form-group">
                            <label for="">Guru</label>
                            <select name="data_guru_id" class="form-control" required>
                                <option value="">Pilih</option>
                                @foreach ($guru as $guru) 
                                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        
                        <div class="form-group">
                            <button class="btn btn-success btn-sm">Pilih</button>
                        </div>
                    </form>


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