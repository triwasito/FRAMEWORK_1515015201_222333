@extends('master')
@section('container')
<div class="panel panel-warning">
	<div class="panel-heading">
		<strong><a href="{{url('mahasiswa')}}">
			<i style="color:#8a6d3b" class="fa text-default fa-chevron-left"></i></a>Detail mahasiswa
		</strong>
	</div>
	<table class="table">
		<tr>
			<td>nama</td>
			<td>:</td>
			<td>{{ $mahasiswa->nama }}</td>
		</tr>
		<tr>
			<td>nim</td>
			<td>:</td>
			<td>{{ $mahasiswa->nim }}</td>
		</tr>
		<tr>
			<td>alamat</td>
			<td>:</td>
			<td>{{ $mahasiswa->alamat }}</td>
		</tr>
		<!-- <tr>
			<td>Pengguna Id</td>
			<td>:</td>
			<td>{{ $mahasiswa->pengguna_id }}</td>
		</tr> -->
		<tr>
			<td class="col-xs-4">Dibuat Tanggal</td>
			<td class="col-xs-4">:</td>
			<td class="col-xs-4">{{$mahasiswa->created_at}}</td>
		</tr>
		<tr>
			<td class="col-xs-4">Diperbarui Tanggal</td>
			<td class="col-xs-4">:</td>
			<td class="col-xs-4">{{$mahasiswa->updated_at}}</td>
		</tr>
		
	</table>
</div>
@stop