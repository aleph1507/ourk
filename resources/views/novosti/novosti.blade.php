@extends('master')

@section('content')
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">О.O.У. Ристо Крле
                        <strong>Новости</strong>
                    </h2>
                    <hr>
                    @if(Auth::check())
                        @if(Auth::user()->clearance <= 2)
                            <a href="{{ route('novosti.create') }}" class="btn btn-primary pull-right novosti-control">Додади новост</a>
                        @endif
                    @endif
                </div>

                <div class="clearfix"></div>
        
                @foreach($novosti as $novost)

                    @if($novost->slika1 != null)
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <img src="{{ asset('/img/novosti/' . $novost->slika1) }}" class="img-responsive img-border novosti-main-slika img-full">    
                            </div>
                        </div>
                    @endif
        
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <h2 class="text-center">
                                {{ $novost->title == null ? '' : $novost->title }}
                                <small>{{ $novost->updated_at }}</small>
                            </h2>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="novost-tekst">
                                    <p>
                                        {!! substr($novost->tekst, 0, 300) !!}
                                        {{ strlen($novost->tekst) > 300 ? "..." : "" }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-5">
                                <a href="{{ route('novosti.show', $novost->id) }}" class="btn btn-default btn-lg">
                                    Прочитај повеќе...
                                </a>
                            </div>
                        </div>

                @endforeach

                    <div class="pages-spacing div-lg text-center">
                        {{$novosti->links()}}
                    </div>

                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
    
@endsection