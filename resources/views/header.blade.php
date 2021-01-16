<header>
  <!-- Top -->
  <section id="top" class="topBar show-for-large">
      <div class="row">
          <div class="medium-6 columns">
              
          </div>
          <div class="medium-6 columns">
              <div class="top-button">
                  <ul class="menu float-right">
                      
                      <li class="dropdown-login">
                          <a class="loginReg" data-toggle="example-dropdown" href="#">Login e cadastro para modelos</a>
                          <div class="login-form">
                              
                              <form  action="{{route('fazerlogin')}}" method="post" >
                                @csrf
                                  <div class="input-group">
                                      <span class="input-group-label"><i class="fa fa-user"></i></span>
                                      <input class="input-group-field" name="email" type="text" placeholder="Digite seu email">
                                  </div>
                                  <div class="input-group">
                                      <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                      <input class="input-group-field" name="senha" type="text" placeholder="Digite a sua senha">
                                  </div>
                                  
                                  <input type="submit" name="submit" value="Entrar">
                              </form>
                              <p class="text-center">Nova por aqui? <a class="newaccount" href="/sign/register">Crie uma conta</a></p>
                          </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </section><!-- End Top -->
  <!--Navber-->
  <section id="navBar">
      <nav class="sticky-container" data-sticky-container>
          <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
              <div class="row">
                  <div class="large-12 columns">
                      <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                          <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                          <div class="title-bar-title"><img src="{{ asset('/images/logo.png') }}" alt="logo"></div>
                      </div>

                      <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                          <div class="top-bar-left">
                              <ul class="menu">
                                  <li class="menu-text">
                                      <a href="index.html"><img src="{{ asset('/images/logo.png') }}" alt="logo"></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="top-bar-right search-btn">
                              <ul class="menu">
                                  <li class="search">
                                      <i class="fa fa-search"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="top-bar-right">
                              <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                  
                                  <li><a href="/">Home</a></li>
                                
                                 
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div id="search-bar" class="clearfix search-bar-light">
                  <form  class="form-inline my-2 my-lg-0" action="{{ route('busca.route') }}" method="GET" >
                      <div class="search-input float-left">
                          <input type="search" name="search" placeholder="Procurar o seu video">
                      </div>
                      <div class="search-btn float-right text-right">
                          <button class="button"  type="submit">Procurar</button>
                      </div>
                  </form>
              </div>
          </div>
      </nav>
  </section>
</header>
