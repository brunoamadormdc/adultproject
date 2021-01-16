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
          <div class="col-sm-6">
            <h1>Dados Cadastrais</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <form method="post" action='{{route('salvardadosrestrict')}}'>
      <input type="hidden" name="id_restrict" value={{$usuario['id_restrict']}}>
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