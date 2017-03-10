<!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">ОУ Ристо Крле</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Почетна</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            За нас<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/zanas">ООУ Ристо Крле</a></li>
                            <li><a href="/zanas#kadar">Кадар</a></li>
                            <li><a href="/contact">Контакт</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="/novosti">Новости</a>
                    </li>
                    <li>
                        <a href="/raspored">Распоред</a>
                    </li>
                    {{-- <li>
                        <a href="#">Распоред</a>
                    </li> --}}
                    <li>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            {{ Auth::check() ? 'Здраво ' . Auth::user()->name : 'Корисник' }}
                        <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
                            @if(!Auth::check())
                                <li><a href="/login">Најави се</a></li>
                                <li><a href="/register">Регистрирај се</a></li>
                            @endif
                            @if(Auth::check())
                                <li>
                                    {{ Form::open(['url' => '/logout', 'method' => 'POST'])}}
                                        <a>{{ Form::submit('Одјави се', ['class' => 'asubmit']) }}</a>
                                    {{ Form::close() }}
                                </li>
                                {{-- <li><a href="/logout">Одјави се</a></li> --}}
                                
                            @endif
                        </ul>
                    </li>
                    @if(Auth::check())
                        @if(Auth::user()->clearance <= 2)
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Админ<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/novosti">Прегледај новости</a></li>
                                <li><a href="/novosti/create">Додади новост</a></li>
                                <li><a href="/raspored">Распоред</a></li>
                                <li class="divider"></li>
                                <li><a href="/vraboteni">Администрирај вработени</a></li>
                                <li><a href="/korisnici">Администрирај корисници</a></li>
                                <li class="divider"></li>
                                <li><a href="/gallery">Галерија</a></li>
                                <li><a href="/misc">Општо</a></li>
                            </ul>
                        </li>
                        @endif
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>