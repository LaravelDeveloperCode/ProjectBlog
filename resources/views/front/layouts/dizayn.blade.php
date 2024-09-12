<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title','Blog saytı') - {{$Confing->title}}</title>
        <link rel="icon" type="image/x-icon" href="{{asset('front/')}}/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="{{asset('front/')}}/https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="{{asset('front/')}}/https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{asset('front/')}}/https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{url('css/styles.css')}}" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="{{ asset($Confing->favicon) }}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{route('homepagee')}}">
                    @if($Confing->logo!=null)
                        <img src="{{ asset($Confing->logo) }}" style="width: 100px; height: auto;">
                      @else
                        {{$Confing->title}}
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('homepagee')}}">Ana səhifə</a></li>
                        @foreach($Pages as $Page)
                            <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('pages',$Page->slug)}}">{{$Page->title}}</a></li>
                        @endforeach
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contaCctt')}}">Əlaqə</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->                 <!-- postlara daxil olduqda yuxaridaki foto yerine postun sheklinin gelmeyi ucundur-->
        <header class="masthead" style="background-image: url('@yield('image', asset('front/../assets/img/home-bg.jpg'))');">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-12 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>@yield('title')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Header End-->

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">


            @yield('homepage')
            @yield('category')
            @yield('single')
            @yield('page')
            @yield('contact')


            </div>
        </div>
        <!-- Main Content End-->

        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">

                    @php
                        $socials = ['facebook', 'twitter', 'github', 'linkedin', 'youtube', 'instagram'];
                    @endphp

                    <ul class="list-inline text-center">
                        @foreach($socials as $social)
                            @if(!empty($Confing->$social))
                                <li class="list-inline-item">
                                    <a href="{{ $Confing->$social }}" target="_blank">
                                        <span class="fa-stack fa-lg">
                                            <i class="fas fa-circle fa-stack-2x"></i>
                                            <i class="fab fa-{{$social}} fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                        <div class="small text-center text-muted fst-italic">Copyright &copy; {{$Confing->title}} - {{Date('Y')}}</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
