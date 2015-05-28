<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Twapp</title>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('img') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/jquery.svg.css">
    <script type="text/javascript" src="/js/jquery.svg.js"></script>

    <script type="text/javascript" src="/js/coloranimate.js"></script>

    <!-- MAIN -->
    <link rel="stylesheet" href="main.css">
    <!-- <script src="js/main.js"></script>-->
    <script src="/js/all.js"></script>


    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>



</head>
<body>
<div class="container">
    <div class="row header-logo">
        <div class="col-xs-4">
            <img class="" src="/img/logo.png" alt="">
        </div>
        <div class="col-xs-8 pull-right navContainer">

            <nav class="navbar navbar-default ">
                <div class="container-fluid">

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/search/sae">#SAE</a></li>
                            <li class="inactive"><a href="/search/vucic">#Vucic</a></li>
                            <li class="inactive"><a href="/search/bieber">#Bieber</a></li>
                            <li class="inactive"><a href="/search/messi">#Messi</a></li>
                            <li class="inactive"><a href="/search/severina">#Severina</a></li>
                        </ul>


                        <ul class="nav navbar-nav navbar-right">
                            <form class="navbar-form navbar-left" role="search" method="GET" action="/search">
                                <div class="form-group">
                                    <input type="text" name="query" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="tweet-container col-xs-12">
            @foreach($tweets as $tweet)
                <li data-id="{{$tweet->id}}">
            <div class="col-xs-8 za-tweet">
                <p>{{$tweet->text}}</p>
            </div>
            <div class="col-xs-2 ikonice good text-right">
                <img src="img/good.svg" alt="">
            </div>
            <div class="col-xs-2 ikonice bad text-right">
                <img src="img/bad.svg" alt="">
            </div>
                </li>
            @endforeach
        </div>
</div>




</div>
</body>
<script src="/js/all.js"></script>
</html>