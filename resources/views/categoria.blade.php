@extends('master')

@section('header')
@include('header')
@endsection

@section('conteudo')


<section class="content">
        <!-- newest video -->
      
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
                                @foreach($video as $v)
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
                        <div class="row">
                               
                                {{$video->appends(request()->query())->links('paginator')}}
                        </div>
                    </div>
                   
                </div>
                
            </div>
            @include('side-categorie')
        </div>
    </section>
@endsection

@section('footer')

@endsection