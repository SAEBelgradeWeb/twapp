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
    <link rel="stylesheet" type="text/css" href="css/jquery.svg.css">
    <script type="text/javascript" src="js/jquery.svg.js"></script>

    <script type="text/javascript" src="js/coloranimate.js"></script>

    <!-- MAIN -->
    <link rel="stylesheet" href="main.css">
    <!-- <script src="js/main.js"></script>-->
    <script src="js/main.js"></script>


    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>



</head>
<body>
<div class="container">
    <div class="row header-logo">
        <div class="col-xs-4">
            <img class="" src="img/logo.png" alt="">
        </div>
        <div class="col-xs-8 pull-right navContainer">

            <nav class="navbar navbar-default ">
                <div class="container-fluid">

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">#SAE</a></li>
                            <li class="inactive"><a href="#">#Vucic</a></li>
                            <li class="inactive"><a href="#">#Bieber</a></li>
                            <li class="inactive"><a href="#">#Messi</a></li>
                            <li class="inactive"><a href="#">#Severina</a></li>
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
        <div class="col-sm-5 pull-left">
            <h1>GOOD</h1>
            @foreach($goodTweets as $tweet)
            <div class="col-sm-12 pull-left"  data-id="{{$tweet->id}}>
            <p  class="text">{{$tweet->text}}</p>
        </div>
        @endforeach
    </div>
        <div class="col-sm-5 pull pull-right">
            <h1>BAD</h1>
            @foreach($badTweets as $tweet)
            <div class="col-sm-12 pull pull-right"  data-id="{{$tweet->id}}>
            <p class="text">{{$tweet->text}}</p>
        </div>
    @endforeach
</div>




</div>
</body>
<script src="/js/all.js"></script>
</html>