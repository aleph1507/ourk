@include('partials._head')

<body>

    @include('partials._header')

    @include('partials._nav')

    <div class="container">

    @include('partials._messages')

	
    @yield('content')

    </div>
    <!-- /.container -->

    @include('partials._site-footer')

    @include('partials._footer')
