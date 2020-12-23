@extends('app')
@section('title')
    Edit Dosen
@endsection
@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT DATA DOSEN</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU DOSEN
				  </a>
				  <a href="/kelas" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">
                        {!! Form::model($dsn,['method'=>'PATCH','action'=>['DosenController@update',$dsn->nip]]) !!}
						<div class="form-group">
							{!! Form::label('nip', 'NIP') !!}
							{!! Form::text('nip',null, array('class' => 'form-control','placeholder'=>'NIP')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('namadosen', 'Nama Dosen') !!}
							{!! Form::text('namadosen', null, array('class' => 'form-control','placeholder'=>'Nama Dosen')) !!}
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
