@extends('login.master')

@section('conteudo')
<div class="login-box">
  @if(isset($error))
Email ja cadastrado
  @endif
  <div class="login-logo">
    <img src="{{ asset('/images/logo.png') }}">
  </div>
  <!-- /.login-logo -->
  <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Inicie o seu cadastro</p>
  
        <form action="{{route('saveregister')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name='nome' placeholder="Nome">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name='email' placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name='senha' placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                  <a href="{{ route('login')}}" class="text-center">Já sou cadastrado</a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
  
        
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
@endsection
