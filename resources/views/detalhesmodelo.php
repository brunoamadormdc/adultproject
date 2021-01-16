@extends('master')

@section('header')
@include('header')
@endsection

@section('conteudo')


    <section class="fullwidth-single-video">
            <div class="row">
                <div class="large-12 columns">
                    <div class="flex-video widescreen">
                        @if($detalhes['id_site'] == 'videoproprio')
                        {!! $detalhes['iframe'] !!}}
                        @else
                          @if($detalhes['iframe'] != 'uselink')
                            <iframe src="https://www.xvideos.com/embedframe/{{$detalhes['id_site']}}" frameborder=0 width=600 height=600 scrolling=no allowfullscreen=allowfullscreen></iframe>
                        @else 
                        <iframe src="{{$detalhes['link']}}" frameborder=0 width=600 height=600 scrolling=no allowfullscreen=allowfullscreen></iframe>
                        @endif
                        
                        @endif
                          
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
                <!-- left side content area -->
                <div class="large-12 columns">
                    <!-- single post stats -->
                    <section class="SinglePostStats">
                        <!-- newest video -->
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="media-object stack-for-small">
                                   
                                    <div class="media-object-section object-second">
                                        <div class="author-des clearfix">
                                            <div class="post-title">
                                                <h4>{!! \Illuminate\Support\Str::limit(html_entity_decode($detalhes['titulo'], ENT_QUOTES, 'UTF-8'), 150, $end='...') !!}</h4>
                                                <p>
                                                <span><i class="fa fa-clock-o"></i>{{$detalhes['tempo']}}</span>
                                                  
                                                   
                                                </p>
                                            </div>
                                            
                                        </div>
                                        <div class="social-share">
                                            <div class="post-like-btn clearfix">
                                                
                                               

                                                <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com">
                                                    <!-- Total -->
                                                    

                                                    <!-- Facebook -->
                                                    <button data-easyshare-button="facebook">
                                                        <span class="fa fa-facebook"></span>
                                                        <span>Share</span>
                                                    </button>
                                                    <span data-easyshare-button-count="facebook">0</span>

                                                    <!-- Twitter -->
                                                    <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                                        <span class="fa fa-twitter"></span>
                                                        <span>Tweet</span>
                                                    </button>
                                                    <span data-easyshare-button-count="twitter">0</span>

                                                    <!-- Google+ -->
                                                    <button data-easyshare-button="google">
                                                        <span class="fa fa-google-plus"></span>
                                                        <span>+1</span>
                                                    </button>
                                                    <span data-easyshare-button-count="google">0</span>

                                                    <div data-easyshare-loader>Loading...</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End single post stats -->

                    <!-- single post description -->
                    <section class="singlePostDescription">
                        <div class="row secBg">
                            <div class="large-12 columns">
                                <div class="heading">
                                    <h5>Descrição</h5>
                                </div>
                                <div class="description showmore_one">
                                    <p>{!! $detalhes['titulo'] !!}</p>

                                   
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