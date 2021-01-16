@extends('adminrestrict.master')
@section('header')
@include('adminrestrict.header')

@endsection

@section('conteudo')

<div class="content-wrapper">
  <section class="content">
    <div class="row">
        <div class="col-sm-12">
        <table class="table tabelaVideos">
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">Link</th>
      <th scope="col">IFRAME</th>
      <th scope="col">Categoria</th>
      <th scope="col">Tags</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      @foreach($videos as $vid)
      
    <tr>
  <form method="post" action="{{route('editarvideorestrict')}}">
      @csrf
      <input type="hidden" name="id" value="{{ $vid->id }}">
      <td>
            <a href="{{$vid->link}}" target="_blank">
            <img src="{{ $vid->thumbnail }}">
            </a>
        </td>
      <td><input class="form-control" name="link" value="{{$vid->link}}"></td>
      <td><input class="form-control" name="titulo" value="{{$vid->titulo}}"></td>  
      <td><input class="form-control" name="iframe" value="{{$vid->iframe}}"></td>
      <td>{{$vid->categoria}}</td>
      <td><input class="form-control" name="tags" value="{{$vid->tags}}"></td>
      <td><button  class="form-control" type="submit">Editar</button></td>
  </form>
   <form method="post" action="{{route('excluirvideorestrict')}}">
       @csrf
         <input type="hidden" name="id" value="{{ $vid->id }}">
      <td><button class="form-control" type="submit">Excluir</button></td>
   </form>
    </tr>
   @endforeach
  </tbody>
</table>
  </div>
        </div>
      <div class="row">
          {{$videos->appends(request()->query())->links('paginator')}}
      </div>
   
  </section>
   
  </div>

 
                 

      @endsection

@section('footer')
@include('adminusuario.footer')
@endsection