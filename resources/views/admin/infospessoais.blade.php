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
    <form method="post" action='{{route('salvarinfospessoais')}}'>
      <input type="hidden" name="id_modelo" value={{$acompanhante['id_modelo']}}>
      @csrf
    <!-- Main content -->
    <section class="content">
    
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Informações pessoais da acompanhante</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <!-- /.row -->

            
            <div class="row">
             
              <div class="col-12 col-sm-12">
                  <div class="form-group">
                      <label for="nome">Aparência</label>
                    <textarea class="form-control"   name="aparencia" id="aparencia" placeholder="Descreva sua aparência" max-length='500'>{{$acompanhante['aparencia']}}
                    </textarea>
                    </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-12 col-sm-3">
                    <label for="olhos">Cor dos olhos</label>
                    <input type="text" class="form-control" value="{{$acompanhante['olhos']}}"  name="olhos" id="olhos" placeholder="Cor dos olhos">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="aparencia">Peso</label>
                    <input type="text" class="form-control" value="{{$acompanhante['peso']}}"  name="peso" id="peso" placeholder="Peso">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="pes">Pés</label>
                    <input type="text" class="form-control" value="{{$acompanhante['pes']}}"  name="pes" id="pes" placeholder="Tamanho dos pés">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="idade">Idade</label>
                    <input type="number" class="form-control" value="{{$acompanhante['idade']}}"  name="idade" id="idade" placeholder="Idade">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="aparencia">Manequim</label>
                    <input type="number" class="form-control" value="{{$acompanhante['manequim']}}"  name="manequim" id="manequim" placeholder="Manequim">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="busto">Busto</label>
                    <input type="number" class="form-control" value="{{$acompanhante['busto']}}"  name="busto" id="busto" placeholder="Busto">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="busto">Cintura</label>
                    <input type="number" class="form-control" value="{{$acompanhante['cintura']}}"  name="cintura" id="cintura" placeholder="Cintura">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="quadril">Quadril</label>
                    <input type="number" class="form-control" value="{{$acompanhante['quadril']}}"  name="quadril" id="quadril" placeholder="Quadril">
                </div>
                <div class="col-12 col-sm-3">
                    <label for="quadril">Idiomas</label>
                    <input type="text" class="form-control" value="{{$acompanhante['idiomas']}}"  name="idiomas" id="idiomas" placeholder="Idiomas">
                </div>
             
              
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
       
        <!-- /.card -->

      

      </div>
      <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Informações quentes</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body">
           
            <!-- /.row -->

            
            <div class="row">
             
              
                <div class="col-12 col-sm-2">
                    <label>Beija na boca?</label><br><br>
                    <input type="checkbox" class="form-control" name="bjoboca" 
                    @if($acompanhante['bjoboca'] == null || $acompanhante['bjoboca'] == "off")
                   
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Faz sexo oral?</label><br><br>
                    <input type="checkbox" class="form-control" name="oral" 
                    @if($acompanhante['oral'] == null || $acompanhante['oral'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Faz sexo anal?</label><br><br>
                    <input type="checkbox" class="form-control" name="anal" 
                    @if($acompanhante['anal'] == null || $acompanhante['anal'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>
                <div class="col-12 col-sm-2">
                    <label>Sadomasoquismo?</label><br><br>
                    <input type="checkbox" class="form-control" name="sado" 
                    @if($acompanhante['sado'] == null || $acompanhante['sado'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>
                <div class="col-12 col-sm-2">
                    <label>Faz suruba?</label><br><br>
                    <input type="checkbox" class="form-control" name="suruba" 
                    @if($acompanhante['suruba'] == null || $acompanhante['suruba'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Atende Fetiches?</label><br><br>
                    <input type="checkbox" class="form-control" name="fetiches" 
                    @if($acompanhante['fetiches'] == null || $acompanhante['fetiches'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Atende casais?</label><br><br>
                    <input type="checkbox" class="form-control" name="atendecasais" 
                    @if($acompanhante['atendecasais'] == null || $acompanhante['atendecasais'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Faz sexo ativo?</label><br><br>
                    <input type="checkbox" class="form-control" name="ativa" 
                    @if($acompanhante['ativa'] == null || $acompanhante['ativa'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>

                <div class="col-12 col-sm-2">
                    <label>Faz sexo passivo?</label><br><br>
                    <input type="checkbox" class="form-control" name="passiva" 
                    @if($acompanhante['passiva'] == null || $acompanhante['passiva'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>
                <div class="col-12 col-sm-2">
                    <label>Tem silicone?</label><br><br>
                    <input type="checkbox" class="form-control" name="silicone" 
                    @if($acompanhante['silicone'] == null || $acompanhante['silicone'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>
                <div class="col-12 col-sm-2">
                    <label>Atende em local próprio?</label><br><br>
                    <input type="checkbox" class="form-control" name="localproprio" 
                    @if($acompanhante['localproprio'] == null || $acompanhante['localproprio'] == "off")
                    
                    @else
                    checked
                    @endif
                    
                    data-bootstrap-switch>
                </div>
               
              
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          
       
        <!-- /.card -->

      

      </div>
        <!-- /.card -->
        <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Informações pessoais da acompanhante</h3>
  
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             
              <!-- /.row -->
  
              
              <div class="row">
               
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label for="nome">Observações</label>
                      <textarea class="form-control"   name="observacoes" id="observacoes" placeholder="Observações" max-length='500'>{{$acompanhante['observacoes']}}
                      </textarea>
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
          <!-- /.card -->
  
        
  
        </div>
       
        <!-- /.row -->
      
    </section>
  </form>

  </div>
 
@endsection

@section('footer')
@include('admin.footer')
@endsection