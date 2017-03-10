<div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            @for($i = 0; $i<count($gis); $i++)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"
                                 class={{ $i == 0 ?  "active" : "" }}></li>
                            @endfor
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @for($i = 0; $i < count($gis); $i++)
                                @if($i == 0)
                                    <div class="item active">
                                        <img src={{ asset('/img/gallery/' . $gis[$i]->image) }} alt="" class="img-responsive img-full">
                                    </div>
                                @else
                                    <div class="item">
                                        <img src={{ asset('/img/gallery/' . $gis[$i]->image) }} alt="" class="img-responsive img-full">
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Општинско Основно Училиште</small>
                    </h2>
                    <h1 class="brand-name">Ристо Крле</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>Почитувани,
                            <strong>Добродојдовте</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>