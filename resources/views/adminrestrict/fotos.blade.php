@extends('admin.master')
@section('header')
@include('admin.header')

@endsection

@section('conteudo')
<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
  
    
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Fotos da galeria</h3>

    </div>
    <!-- /.card-header -->
  <form method="post" action="{{route('salvarfotogaleria')}}" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="id_modelo" value={{session()->get('acompanhante')->id_modelo}}>
    <input type="hidden" name="nome" value={{session()->get('acompanhante')->nome}}>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->

          <div class="custom-file">
            <input type="file" name="fotogaleria" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
      </div>
      </div>
      <!-- /.row -->
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
    <!-- /.card-body -->
    
  </div>
  @if($fotos != null)
  <div class="card card-default galeriafotos">
      <div class="card-header">
          <h3 class="card-title">Sua Galeria de fotos</h3>
    
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($fotos as $fot)
            <div class="col-sm-3 fotos" style="background-image:url({{url($fot['caminho'])}})">
              <div class="delete">
              <form method="POST" action="{{route('excluirfoto')}}">
                @csrf
                <input type="hidden" name="id_foto" value="{{$fot['id_foto']}}">
                <input type="hidden" name="caminho" value="{{$fot['caminho']}}">
                <button type="submit" class="closefoto">
                <img src="{{url('/images/delete.png')}}">
                </button>
              </div>
            
            </div>
            @endforeach
          </div>
        </div>
  </div>
  @endif
  </div>
@endsection

@section('footer')
@include('admin.footer')
@endsection