<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="{{asset('css/Blog/Base/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/Blog/Base/freelancer.css')}}" />
    <script type="text/javascript" src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Blog/Base/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Blog/Base/cbpAnimatedHeader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Blog/Base/freelancer.js') }}"></script>
    <title>AngkorCMS - {{$title}}</title>

</head>

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">My Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {!! AngkorBlade::display($blocks['navbar'], $parameters, [], ['list-class' => 'nav navbar-nav navbar-right', 'list-item-class' => 'page-scroll', 'list-item-add' => '<li class="hidden"><a href="#page-top"></a></li>']) !!}
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        {!! AngkorBlade::display($blocks['header'], $parameters, [["type" => "header"],["type" => "div", "class" => "container"],["type" => "div", "class" => "row"],["type" => "div", "class" => "col-lg-12"]]) !!}
    </header>

    <!-- About Section -->
    {!! AngkorBlade::display($blocks['body'], $parameters, [["type" => "section", "id"=>true, "class"=>["", "success"]], ["type" => "div", "class"=>"container"]], ['news-list-full' => true]) !!}

    <!-- Footer -->
    <footer class="text-center">
        {!! AngkorBlade::display($blocks['footer'], $parameters, [["type" => "div", "class"=>["footer-above", "footer-below", "stop" => true]], ["type" => "div", "class"=>"container"], ["type" => "div", "class"=>"row"]]) !!}
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

</body>

</html>
