<div class="large-4 columns">
        <aside class="secBg sidebar">
                <div class="row">
                    <!-- search Widget -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox">
                            <div class="widgetTitle">
                                <h5>Procurar vídeos</h5>
                            </div>
                            <form  action="{{ route('busca.route') }}" method="GET" >
                                <div class="input-group">
                                    <input class="input-group-field" type="text" name="search" placeholder="">
                                    <div class="input-group-button">
                                        <input type="submit" class="button" value="Search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End search Widget -->

                    <!-- categories -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox">
                            <div class="widgetTitle">
                                <h5>Categorias de vídeos</h5>
                            </div>
                            <div class="widgetContent">
                                <ul class="accordion" data-accordion>
                                    <li class="accordion-item is-active" data-accordion-item>
                                        
                                        <div class="accordion-content" data-tab-content>
                                           <ul>
                                                @foreach(session()->get('categories') as $cat)
                                               <li class="clearfix">
                                                    @if($cat->categoria == '')
                                                   <i class="fa fa-play-circle-o"></i>
                                                   <a href="/categorias/{{$cat->categoria}}">Sem Categoria </a>
                                                   @else
                                                   <i class="fa fa-play-circle-o"></i>
                                                   <a href="/categorias/{{$cat->categoria}}">{{$cat->categoria}} </a>
                                                   @endif
                                               </li>
                                              @endforeach
                                           </ul>
                                        </div>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>



                  </div>
            </aside>
</div>