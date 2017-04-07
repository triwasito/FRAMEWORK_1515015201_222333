@extends('master')
@section('container')
<div class="panel panel-primary">
	<div class="panel-heading">
		<strong><a href="{{url('jadwal_matakuliah')}}">
		<i style="color: white;" class="fa text-default fa-chevron-left"></i>
		</a>Tambah data jadwal_matakuliah</strong>
	</div>
		{!! Form::open(['url' => 'jadwal_matakuliah/simpan','class' => 'form-horizontal']) !!}
        		@include('jadwal_matakuliah.form')
	
<!-- 
{!! Form::open(['url'=>'mahasiswa/simpan','class'=>'form-horizontal']) !!}
	@include('mahasiswa.form')
 -->		<div style="width: 100%;text-align: right;">
			<button class="btn btn-primary">
				<i class="fa fa-save"></i>Simpan
			</button>
			<button class="btn btn-danger">
				<i class="fa fa-undo"></i>ulangi
			</button>
		</div>
		{!! Form::close() !!}
		</div>
@stop