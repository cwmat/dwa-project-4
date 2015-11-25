<!doctype html>

<!--
Chaz Mateer HES DWA Project 3 - Developer's Best Friend

Sources:
  Laravel:
    http://laravel.com/

  HTML5 Boilerplate (includes jquery and modernizr):
    https://html5boilerplate.com/

  Bootstrap:
    http://getbootstrap.com/

  Bootstrap theme/template:
    http://startbootstrap.com/template-overviews/clean-blog/

  Images:
    Unsplash:
      https://unsplash.com/

  Icon:
    favicon.cc:
      http://www.favicon.cc/?action=icon&file_id=838007
 -->

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="HES DWA Project 4 Micro Blog.">
  <meta name="author" content="Chaz Mateer">
  <link rel="icon" href= {{ asset('/favicon.ico') }} >

  <title>
    {{-- Yield the title if it exists, otherwise default to 'Micro Blog' --}} @yield('title', "Micro Blog")
  </title>

  <!-- Bootstrap Core CSS -->
  <link href= {{ asset('bower/bootstrap/dist/css/bootstrap.min.css') }} rel="stylesheet">

  <!-- Themes and Custom CSS -->
  <link href= {{ asset('css/theme.css') }} rel="stylesheet">
  <link rel="stylesheet" href= {{ asset('css/main.css') }} >
  {{-- Yield any page specific header content --}}
  @yield('head')

  <!-- Custom Fonts -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Home</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.html">Login</a>
          </li>
          <li>
            <a href="about.html">Register</a>
          </li>
          <li>
            <a href="post.html">User Control Panel</a>
          </li>
          <li>
            <a href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  {{-- Flash message --}}
  @if(\Session::has('flash_message'))
    <div class='flash-message is-center'>
      {{ \Session::get('flash_message') }}
    </div>
  @endif

  <!-- Page Header -->
  <!-- Set your background image for this header on the line below. -->
  <header
    class="intro-header"
    style="background-image: url(@yield('hero-image'))">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <div class="site-heading">
            <h1>@yield('hero-heading')</h1>
            <hr class="small">
            <span class="subheading">@yield('hero-sub-heading')</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  {{--Yield main content --}}
  @yield('main-content')

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
          <ul class="list-inline text-center">
            <li>
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="bower/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="bower/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="js/theme.js"></script>

  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-68637968-1', 'auto');
    ga('send', 'pageview');
  </script>

</body>

</html>
