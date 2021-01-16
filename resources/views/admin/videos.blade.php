@extends('admin.master')
@section('header')
@include('admin.header')

@endsection

@section('conteudo')

<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
  
    
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Galeria de videos</h3>

    </div>
    <!-- /.card-header -->
  <form method="post" action="{{route('salvarvideo')}}" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="id_modelo" value={{session()->get('acompanhante')->id_modelo}}>
    
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->

          <div class="custom-file">
            <input type="file" name="video" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Escolher vídeo</label>
          </div>
        </div>
      </div>
          <div class="col-sm-12">
        <div class="form-group">
           <label for="customFile">Escolher Thumb do vídeo</label> 

          <div class="custom-file">
            <input type="file" name="fotocapa" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Escolher Thumb</label>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label>Titulo do vídeo</label>
          <input type="text" class="form-control" value="" name="nome" id="titulo" placeholder="Título do vídeo">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label>Créditos</label>
          <input type="number" class="form-control" value="" name="creditos" id="creditos" placeholder="Créditos">
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
 @if($videos != null)
  <div class="card card-default galeriaVideos">
      <div class="card-header">
          <h3 class="card-title">Sua Galeria de vídeos</h3>
    
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($videos as $vid)
            <div class="col-sm-3 video">
              <div class="delete">
              <form method="POST" action="{{route('excluirvideo')}}">
                @csrf
                <input type="hidden" name="id_videomodelo" value="{{$vid['id_videomodelo']}}">
                <input type="hidden" name="caminho" value="{{$vid['caminho']}}">
                <input type="hidden" name="fotocapa" value="{{$vid['fotocapa']}}">
                <button type="submit" class="closeVideo">
                <img src="{{url('/images/delete.png')}}">
                </button>
              </div>
                <video width="100%" height="200" controls>
                    <source src="{{$vid['caminho']}}" type="video/mp4">
                   
                 
                  </video>
                  <div class="row">
                    <div class="col-sm-12">
                        <h4>{{$vid['nome']}}</h4>
                        <h6>${{$vid['creditos']}} créditos</h5>
                    </div>
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