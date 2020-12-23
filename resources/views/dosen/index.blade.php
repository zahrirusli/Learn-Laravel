@extends('app')

@section('title')
    Data Dosen
@endsection

@section('content')
    <div class="panel panel-default">
    <div class="panel-body">
        <h4><i class="fa fa-university"></i> DAFTAR Dosen</h4><hr>

        <div class=row>
            <div class="col-md-6">
                <a href="/dosen/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
            </div>
            <div class="col-md-2">
            </div>
<!-- Form Pencarian -->
            <div class="col-md-4">
                {!! Form::open(['method'=>'GET','url'=>'caridosen','role'=>'search'])  !!}
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
                        <span class="input-group-btn">
					        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
					     </span>
                     </span>
                 </div>
                 {!! Form::close() !!}
            </div>
        </div><br>

     
        </div>
        
        <br>
        @if($dsn->count())
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-condensed tfix">
                    <thead align="center">
                       <tr>
                           <td><b>NIP</b></td>
                           <td><b>Nama Dosen</b></td>
                           <td><b>Anak Wali</b></td>
                           <td colspan="2"><b>MENU</b></td>
                       </tr>
                   </thead>
                   @foreach($dsn as $m)
                       <tr>
                           <td>{{ $m->nip }}</td>
                           <td>{{ $m->namadosen }}</td>
                            <td align="center" width="30px">
                               <a href="/dosen/listMhsWali/{{$m->nip}}" class="btn btn-success btn-sm" role="button"><i class="fa fa-pencil-square"></i> Detil Anak Wali</a>
                           </td>
                           <td align="center" width="30px">
                               <a href="/dosen/{{$m->nip}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
                           </td>
                           <td align="center" width="30px">
                               {!! Form::open(array(
                                    'route' => array('dosen.destroy', $m->nip),
                                    'method' => 'delete',
                                    'style' => 'display:inline')) !!}
                                    <button class='btn btn-sm btn-danger delete-btn' type='submit'>
                                        <i class='fa fa-times-circle'></i> Delete
                                    </button>
                                {!! Form::close() !!}

                           </td>
                       </tr>
                   @endforeach
              </table>
              {{$dsn->render()}}
          </div>
        @else
            <div class="alert alert-warning">
                <i class="fa fa-exclamation-triangle"></i> Data Dosen tidak ditemukan
            </div>
        @endif
    </div>
    </div>
@endsection
