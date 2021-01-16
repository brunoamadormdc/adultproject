@extends('login.master')

@section('conteudo')
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('/images/logo.png') }}">
  </div>
  <!-- /.login-logo -->
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Digite o token de validação enviado para o email cadastrado</p>
  
        <form action="{{ route('validartokenrestrict') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="token" placeholder="Digite o token ">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
         
         
         
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Validar Token</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
  
        
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
@endsection
