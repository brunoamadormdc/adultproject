@extends('adminrestrict.master')
@section('header')
@include('adminrestrict.header')

@endsection

@section('conteudo')

<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Salvar novo vídeo</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form method="post" action='{{route('salvarnovovideo')}}' enctype="multipart/form-data">
      
      @csrf
    <!-- Main content -->
    <section class="content">
    
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Insira as informações do vídeo</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <!-- /.row -->

            
            <div class="row">
             
              <div class="col-12 col-sm-6">
                  <div class="form-group">
                      <label for="nome">Título do vídeo</label>
                    <input type="text" class="form-control"  name="titulo" id="titulovideo" placeholder="Digite o título do vídeo">
                    </div>
                  <!-- /.form-group -->
                </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="nome">Iframe Externo</label>
                <input type="text" class="form-control" name="iframe" placeholder="Insira o código Iframe">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label for="email">Tags</label>
                  <input type="text" class="form-control" name="tags" placeholder="Insira as tags separadas por vírgulas">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-6 col-sm-6">
                <div class="form-group">
                  <label for="endereco">Link do vídeo</label>
                  <input type="text" class="form-control" name="link" placeholder="Digite o link do vídeo">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-6 col-sm-6">
                <div class="form-group">
                  <label for="numero">Categoria</label>
                  <input type="text" class="form-control" name="categoria" placeholder="Digite a categoria">
                </div>
                <!-- /.form-group -->
              </div>
                 <div class="col-6 col-sm-6">
                <div class="form-group">
                  <label for="numero">Tempo</label>
                  <input type="text" class="form-control" name="tempo" placeholder="Tempo do vídeo">
                </div>
                <!-- /.form-group -->
              </div>
             
              </div>
                <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <!-- <label for="customFile">Custom File</label> -->

          <div class="custom-file">
            <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Escolher fotinha de capa</label>
          </div>
        </div>
      </div>
      </div>
            <div class="row">
                <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
            </div>
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
       
        <!-- /.card -->

     

      </div>
        <!-- /.card -->

       
        <!-- /.row -->
      
    </section>
  </form>
 
  </div>
 
                 

      @endsection

@section('footer')
@include('adminrestrict.footer')
@endsection