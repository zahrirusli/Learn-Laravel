@extends('app')

@section('title')
    Edit MahaSiswa
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT MAHASISWA</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU MAHASISWA
				  </a>
				  <a href="/mhs" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
						{!! Form::model($mhsnya,['method'=>'PATCH','action'=>['MhsController@update',$mhsnya->nrp]]) !!}
						<div class="form-group">
							{!! Form::label('nrp', 'NRP') !!}
							{!! Form::text('nrp',null, array('class' => 'form-control','placeholder'=>'NRP')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('namamhs', 'Nama Mahasiswa') !!}
							{!! Form::text('namamhs', null, array('class' => 'form-control','placeholder'=>'Nama Mahasiswa')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('nipdosenwali', 'Dosen Wali') !!}
                            {!! Form::select('nipdosenwali', $dosennya ,null , array('class' => 'form-control')) !!}
						</div>
                        
						{!! Form::button('<i class="fa fa-check-square"></i>'. ' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}
						{!! Form::close()!!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
