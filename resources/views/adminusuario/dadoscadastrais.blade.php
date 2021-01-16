@extends('adminusuario.master')
@section('header')
@include('adminusuario.header')

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
    <form method="post" action='{{route('salvardadosusuario')}}'>
      <input type="hidden" name="id_usuario" value={{$usuario['id_usuario']}}>
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
            
              
              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="nome">Nome</label>
                <input type="text" class="form-control" value="{{$usuario['nome']}}"  name="nome" id="nome" placeholder="Digite o seu nome">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="{{$usuario['email']}}" name="email" id="email" placeholder="Digite a sua cidade">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-12 col-sm-3">
                <div class="form-group">
                  <label for="email">Cidade</label>
                  <input type="text" class="form-control" value="{{$usuario['cidade']}}" name="cidade" id="email" placeholder="Digite a sua cidade">
                </div>
                <!-- /.form-group -->
              </div>
              
              
              
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            <!-- /.row -->
          </div>
          
       
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
    
        <!-- /.card -->

      </div>
        <!-- /.card -->

       
        <!-- /.row -->
      
    </section>
  </form>
 
  </div>
 
                 

      @endsection

@section('footer')
@include('adminusuario.footer')
@endsection