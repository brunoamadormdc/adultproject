@extends('master')

@section('header')
@include('header')
@endsection

@section('conteudo')
<div class="row detalhesModelos">
  <section class="fotoCapa" style="background-image:url({{asset($detalhes['fotocapa'])}})">
                
            </section>
    </div>
<div class="row detalhesModelos">
        <!-- left side content area -->
        <div class="large-12 columns">
            <!--single inner video-->
          
            <!-- single post stats -->
            <section class="SinglePostStats">
                <!-- newest video -->
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="media-object stack-for-small">
                            <div class="media-object-section">
                                <div class="author-img-sec">
                                    <div class="thumbnail author-single-post">
                                        <a href="#"><img src= "{{$detalhes['foto']}}" alt="{{$detalhes['nome']}}"></a>
                                    </div>
                                    <p class="text-center"><a href="#">{{$detalhes['nome']}}</a></p>
                                </div>
                            </div>
                            <div class="media-object-section object-second">
                                <div class="author-des clearfix">
                                    <div class="post-title">
                                        <h4>{{$detalhes['titulo']}}</h4>
                                        <p>
                                            {{$detalhes['descricao']}}
                                        </p>
                                    </div>
                                   
                                </div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End single post stats -->
 <!-- related Posts -->
 <section class="content content-with-sidebar related">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="main-heading borderBottom">
                    <div class="row padding-14">
                        <div class="medium-12 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>Fotos</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row list-group">
                   
                    @foreach($fotos as $fot)
                    <div class="item large-6 columns end fotosModelos">
                        <div class="post thumb-border">
                            <div class="post-thumb">
                                <img src="{{$fot['caminho']}}" alt="foto">
                                <a href="#" class="hover-posts">
                                    <span><i class="fa fa-play"></i>Ampliar</span>
                                </a>
                              
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section><!--end related posts-->
     <section class="content content-with-sidebar related">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="main-heading borderBottom">
                    <div class="row padding-14">
                        <div class="medium-12 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>Vídeos</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row list-group">
                   
                    @foreach($videos as $vid)
                 <div class="item large-12 columns end fotosModelos">
                        <div class="post thumb-border">
                            <div class="post-thumb" style="background-image:url({{asset($vid['fotocapa'])}}); height:500px;" >
                               
                                <a href="#" class="hover-posts">
                                     @if($vid['creditos'] > 0)
                                <div class="paidVideo">
                                    50$
                                </div>
                               
                                    <span><i class="fa fa-play"></i>Adquirir com créditos</span>
                                    @else
                                    <span><i class="fa fa-play"></i>Assistir Vídeo</span>
                                     @endif
                                </a>
                              
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section><!--end related posts-->
    <!-- Comments -->
            <!-- single post description -->
            <section class="singlePostDescription">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="heading">
                            <h5>Description</h5>
                        </div>
                        <div class="description showmore_one">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p>
                            <h6>Bullets List :</h6>
                            <ul>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>But I must explain to you how</li>
                                <li>At vero eos et accusamus et iusto</li>
                                <li>On the other hand, we denounce</li>
                                <li>There are many variations of passages</li>
                            </ul>
                            <div class="categories">
                                <button><i class="fa fa-folder"></i>Categories</button>
                                <a href="#" class="inner-btn">entertainment</a>
                                <a href="#" class="inner-btn">comedy</a>
                            </div>
                            <div class="tags">
                                <button><i class="fa fa-tags"></i>Tags</button>
                                <a href="#" class="inner-btn">3D Videos</a>
                                <a href="#" class="inner-btn">Videos</a>
                                <a href="#" class="inner-btn">HD</a>
                                <a href="#" class="inner-btn">Movies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End single post description -->

           
          
        </div><!-- end left side content area -->
        <!-- sidebar -->
        
    </div>

@endsection

@section('footer')

@endsection