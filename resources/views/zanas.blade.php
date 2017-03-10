@extends('master')

@section('title', 'За Нас')

@section('content')
    <div class="container">

        <div class="box">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">За
                        <strong>ООУ "Ристо Крле"</strong>
                    </h2>
                    <hr>
                </div>
                {{-- <div class="col-md-6"> --}}
                    @if($zanas->stringvalue != null)
                        <img src="{{ asset('/img/misc/' . $zanas->stringvalue) }}" alt="" 
                        class="img-responsive img-border-left float-left-img">
                    @else
                        <img class="img-responsive img-border-left" 
                        src="img/slide-2.jpg" alt="">
                    @endif
                {{-- </div> --}}
                {{-- <div class="col-md-6"> --}}
                    <p class="zanasp">
                    @if($zanas->textvalue != null)
                        {!! $zanas->textvalue !!}
                    @else
                        Опис на ООУ "Ристо Крле"
                        Lid est laborum dolo rumes fugats untras. 
                        Etharums ser quidem rerum facilis dolores nemis 
                        omnis fugats vitaes nemo minima rerums unsers sadips amets.

                        Sed ut perspiciatis unde omnis iste natus error 
                        sit voluptatem accusantium doloremque laudantium, 
                        totam rem aperiam, eaque ipsa quae ab illo inventore 
                        veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                    @endif
                    </p>
                {{-- </div> --}}
                <div class="clearfix"></div>
            </div>
        </div>
        </div>

        <div class="box" id="kadar">
            <div class="row">
            {{-- <div class="box"> --}}
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Нашите
                        <strong>вработени</strong>
                    </h2>
                    <hr>
                    @if(Auth::check())
                        @if(Auth::user()->clearance <= 2)
                            <a href="{{ route('vraboteni.index') }}" class="btn btn-primary pull-right vraboteni-control">Администрирај вработени</a>
                        @endif
                    @endif
                </div>

                <div class="clearfix"></div>

                @for($i = 0; $i<3; $i++)
                    @if(count($vraboteni)>$i)
                        <div class="col-sm-4 text-center">
                            @if($vraboteni[$i]->slika)
                                <img src="{{ asset('/img/vraboteni') . '/' . $vraboteni[$i]->slika }}" class="img-responsive vraboten">
                            @else
                                <div style="display:block;height:150px;">&nbsp;</div>
                            @endif
                            <h3>{{ $vraboteni[$i]->ime }}
                                <small>{{ $vraboteni[$i]->pozicija }}</small>
                            </h3> 
                         </div>
                     @endif                   
                @endfor

                <div class="clearfix"></div>
            </div>
            
            @if(count($vraboteni) > 3)
                <div class="col-lg-12 text-center">
                    <hr>
                    <a href="#vraboteni" class="btn btn-default intro-text text-center" id="vrab_btn" 
                        data-toggle="collapse" onclick="vrab_text()">Види ги сите вработени</a>
                    <hr>
                </div>

                <div class="vraboteni collapse" id="vraboteni">

                    @for($i=3; $i<count($vraboteni); $i++)
                        <div class="col-sm-4 text-center">
                            @if($vraboteni[$i]->slika)
                                <img src="{{ asset('/img/vraboteni') . '/' . $vraboteni[$i]->slika }}" class="img-responsive vraboten">
                            @endif
                            <h3>{{ $vraboteni[$i]->ime }}<br>
                                <small>{{ $vraboteni[$i]->pozicija }}</small>
                            </h3> 
                        </div>   
                    @endfor

                   
                <div class="clearfix"></div>
                </div>
            @endif
            </div>
        </div>

    </div>
    <!-- /.container -->
    <script>
        function vrab_text(){
                var vrab = document.getElementById("vrab_btn");
                vrab.innerHTML == "Види ги сите вработени" ?
                     vrab.innerHTML = "Сокриј ги сите вработени"  : "Види ги сите вработени";
            }
    </script>
@endsection