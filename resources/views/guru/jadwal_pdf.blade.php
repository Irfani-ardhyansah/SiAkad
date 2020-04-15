<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h5>JADWAL PELAJARAN K13 SDN BUKUR 1</h4>
            <h5>TAHUN PELAJARAN</h5>
            <H6>KELAS {{$kelas}}</H6>
            <h6>Wali Kelas {{$guru}}</h6>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>Jam</th>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jum'at</th>
                <th>Sabtu</th>
            </tr>
		</thead>
		<tbody>
            @foreach($jadwal as $data)
            <tr>
                <td>{{$data->jam}}</td>
                <td>{{$data->senin}}</td>
                <td>{{$data->selasa}}</td>
                <td>{{$data->rabu}}</td>
                <td>{{$data->kamis}}</td>
                <td>{{$data->jumat}}</td>
                <td>{{$data->sabtu}}</td>
            </tr>
            @endforeach
		</tbody>
    </table>
</body>
</html>