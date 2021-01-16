@extends('admin.master')
@section('header')
@include('admin.header')

@endsection

@section('conteudo')

<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dados Cadastrais</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form method="post" action='{{route('salvardados')}}'>
      <input type="hidden" name="id_modelo" value={{$acompanhante['id_modelo']}}>
      @csrf
    <!-- Main content -->
    <section class="content">
    
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Insira seus dados pessoais</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <!-- /.row -->

            
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Gênero</label>
                  <select class="form-control select2 select2-danger" name="id_categoriamodelo" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    @foreach($categoria as $cat) 
                  <option value="{{$cat['id_categoriamodelo']}}">{{$cat['descricao']}}</option>
                    
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-6">
                  <div class="form-group">
                      <label for="nome">Whatsapp</label>
                    <input type="text" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask value="{{$acompanhante['whatsapp']}}"  name="whatsapp" id="whatsapp" placeholder="Digite o whatsapp">
                    </div>
                  <!-- /.form-group -->
                </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="nome">Nome</label>
                <input type="text" class="form-control" value="{{$acompanhante['nome']}}"  name="nome" id="nome" placeholder="Digite o seu nome">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="{{$acompanhante['email']}}" name="email" id="email" placeholder="Digite o seu email">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-10">
                <div class="form-group">
                  <label for="endereco">Local de atendimento</label>
                  <input type="text" class="form-control" name="endereco" value="{{$acompanhante['endereco']}}" id="endereco" placeholder="Digite o local de atendimento">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-2">
                <div class="form-group">
                  <label for="numero">Digite o número</label>
                  <input type="number" class="form-control" value="{{$acompanhante['numero']}}" name="numero" id="numero" placeholder="Nº">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-4">
                <div class="form-group">
                  <label for="estado">Estado</label>
                  
                  <select class="form-control select2 select2-danger" name="estado" id="estado" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option >São Paulo</option>
                    
                    
                  </select>
                </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" value="{{$acompanhante['cidade']}}" name="cidade" id="cidade" placeholder="Cidade">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-12 col-sm-4">
                  <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" value="{{$acompanhante['bairro']}}" name="bairro" id="bairro" placeholder="Bairro">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.form-group -->
              </div>
              
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
       
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Informações do Anúncio</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Título do Anúncio</label>
                  <input type="text" class="form-control" value="{{$acompanhante['titulo']}}" name="titulo" id="titulo" placeholder="Bairro">
                </div>
                <!-- /.form-group -->
               
                <!-- /.form-group -->
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="10" name="descricao"  placeholder="{{$acompanhante['descricao']}}">{{$acompanhante['descricao']}}</textarea>
                </div>
                
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
             
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->

      </div>
        <!-- /.card -->

       
        <!-- /.row -->
      
    </section>
  </form>
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Foto de perfil</h3>

    </div>
    <!-- /.card-header -->
  <form method="post" action="{{route('salvarfotoperfil')}}" enctype="multipart/form-data">
    @csrf
    @if(isset($acompanhante['id_modelo']))
    <input type="hidden" name="foto" value={{$acompanhante['foto']}}>
    @endif
    <input type="hidden" name="id_modelo" value={{$acompanhante['id_modelo']}}>
    <input type="hidden" name="nome" value={{$acompanhante['nome']}}>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->

          <div class="custom-file">
            <input type="file" name="fotoperfil" class="custom-file-input" id="customFile">
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
  <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Foto de capa</h3>
  
      </div>
      <!-- /.card-header -->
    <form method="post" action="{{route('salvarfotocapa')}}" enctype="multipart/form-data">
      @csrf
      @if(isset($acompanhante['id_modelo']))
      <input type="hidden" name="foto" value={{$acompanhante['fotocapa']}}>
      @endif
      <input type="hidden" name="id_modelo" value={{$acompanhante['id_modelo']}}>
      <input type="hidden" name="nome" value={{$acompanhante['nome']}}>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
          <div class="form-group">
            <!-- <label for="customFile">Custom File</label> -->
  
            <div class="custom-file">
              <input type="file" name="fotocapa" class="custom-file-input" id="customFile">
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
  </div>
 
                 

      @endsection

@section('footer')
@include('admin.footer')
@endsection