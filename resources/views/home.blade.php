@extends('master')

@section('header')
@include('header')
@endsection

@section('conteudo')

<section class="content">
    <!-- newest video -->

        <section id="premium">
                <div class="row">
                    <div class="heading clearfix">
                        <div class="large-11 columns">
                        <h4>Modelos destaque em {{ $cidade }}</h4>
                        </div>
                        <div class="large-1 columns">
                            <div class="navText show-for-large">
                                <a class="prev secondary-button"><i class="fa fa-angle-left"></i></a>
                                <a class="next secondary-button"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="owl-demo" class="owl-carousel carousel" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-responsive-small="1" data-responsive-medium="2" data-responsive-xlarge="5">
                      
                    @foreach($models as $mod)
                    <div class="item">
                        <figure class="premium-img">
                            @if($mod['foto'])
                            <img src="{{ $mod['foto'] }}" alt="carousel">
                            @else 
                            <img src="http://placehold.it/400x300" alt="carousel">
                            @endif
                        
                            <figcaption>
                                <h5>{{$mod['nome']}}</h5>
                            <p>{{$mod['estado']}} - {{$mod['estado']}}</p>
                            </figcaption>
                        </figure>
                        <a href="/detalhes-modelo/{{\Illuminate\Support\Str::slug($mod['nome'])}}/{{$mod['id_modelo']}}" class="hover-posts">
                            <span><i class="fa fa-play"></i>Ver Modelo</span>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </section><!-- End Premium Videos -->
  
    <div class="row secBg">
        <div class="large-8 columns">
            <div class="row column head-text clearfix">
               
                <div class="grid-system pull-right show-for-large">
                    <a class="secondary-button current grid-default" href="#"><i class="fa fa-th"></i></a>
                    <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                    <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                </div>
            </div>
            <div class="tabs-content" data-tabs-content="newVideos">
                <div class="tabs-panel is-active" id="new-all">
                    <div class="row list-group">
                            @foreach($videos as $v)
                        <div class="item large-4 medium-4 columns group-item-grid-default">
                            <div class="post thumb-border">
                                <div class="post-thumb">
                                    <img src="{{$v->thumbnail}}" alt="{{$v->thumbnail}}"  onerror="this.src='http://pic.vartuc.com/imgs/b/p/f/q/z/sinfulxxx_com_wet_sensual_doggystyle_sex-4_tmb.jpg'">
                                    <a href="/detalhes/{!! \Illuminate\Support\Str::slug($v->titulo) !!}/{{$v->id}}" class="hover-posts">
                                            
                                        <span><i class="fa fa-play"></i>Ver vídeo</span>
                                    </a>
                               
                                </div>
                                <div class="post-des">
                                    <h6><a href="single-video-v2.html">{!! \Illuminate\Support\Str::limit(html_entity_decode($v->titulo, ENT_QUOTES, 'UTF-8'), 25, $end='...') !!}</a></h6>
                                    <div class="post-stats clearfix">
                                        <p class="pull-left">
                                            <i class="fa fa-user"></i>
                                            <span><a href="#">admin</a></span>
                                        </p>
                                        <p class="pull-left">
                                            <i class="fa fa-clock-o"></i>
                                            <span></span>
                                        </p>
                                        <p class="pull-left">
                                            <i class="fa fa-eye"></i>
                                            <span>1,862K</span>
                                        </p>
                                    </div>
                                    <div class="post-summary">
                                        <p>     {!! \Illuminate\Support\Str::limit(html_entity_decode($v->titulo, ENT_QUOTES, 'UTF-8'), 25, $end='...') !!}</p>
                                    </div>
                                    <div class="post-button">
                                        <a href="/detalhes/{!! \Illuminate\Support\Str::slug($v->titulo) !!}/{{$v->id}}" class="secondary-button"><i class="fa fa-play-circle"></i>ver vídeo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
               
            </div>
            
        </div>
        @include('side-categorie')
    </div>
</section>




@endsection

@section('footer')
@include('footer')
@endsection