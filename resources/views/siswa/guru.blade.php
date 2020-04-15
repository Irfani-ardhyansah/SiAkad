@extends('siswa.layouts.app')

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

        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">
              <!-- /.timeline-label -->
              <!-- timeline item -->
              @foreach($guru as $data)
              <li>
                <i class="fa bg-blue">{{$loop->iteration}}</i>

                <div class="timeline-item">  
                    <div class="timeline-body">
                        <div style="width: 100px; float: left; margin-right:10px;">
                            <img src="{{$data->getAvatar()}}" style="width:100px; height:120px; border-radius:5px;">
                        </div>
                        <table>
                            <tbody>
                                <tr style="height:25px">
                                    <td  style="width:100px;">NIP / NIK</td>
                                    <td style="width:10px;">:</td>
                                    <td>{{$data->nip}}</td>
                                </tr>
                                <tr  style="height:25px">
                                    <td>Nama Guru</td>
                                    <td>:</td>
                                    <td>{{$data->nama}}</td>
                                </tr>
                                <tr  style="height:25px">
                                    <td>No Telp</td>
                                    <td>:</td>
                                    <td>{{$data->no_hp}}</td>
                                </tr>
                                <tr  style="height:25px">
                                    <td>Alamat lengkap</td>
                                    <td>:</td>
                                    <td>{{$data->alamat}}</td>
                                </tr>
                                @foreach($data->user as $dat)
                                @if($dat->email == TRUE)
                                <tr  style="height:25px">
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$dat->email}}</td>
                                </tr>
                                @else
                                <tr  style="height:25px">
                                    <td>Email</td>
                                    <td>:</td>
                                    <td> - </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
  
      </section>
    <!-- /.content -->
@endsection