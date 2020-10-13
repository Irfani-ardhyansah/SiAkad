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
        <h5>Hasil Nilai Siswa</h4>
            <h5>SDN BUKUR 1</h5>
            <H6>{{$nama}} - Kelas {{$kelas}}</H6>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Pelajaran</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
            </tr>
		</thead>
		<tbody>
            @foreach($nilai as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->mapel->nama_mapel}}</td>
                <td>{{$data->uts}}</td>
                <td>{{$data->uas}}</td>
                <td>{{($data->uts + $data->uas) / 2}}</td>
            </tr>
            @endforeach
		</tbody>
    </table>
</body>
</html>