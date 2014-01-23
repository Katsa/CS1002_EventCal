<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MiddLife</title>

    <!-- Bootstrap core CSS -->
    <!-- Add custom CSS here -->
    <link href="css/bootstrap.css" rel="stylesheet">

    
    <link href="css/full-slider.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php">MiddLife</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav row">
                    <li>
                        <a href="create_event.html">Create an Event</a>
                    </li>
                    <li>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                         </form>
                    </li>
                    <li>
                        <a href="search.html">Advanced Search</a>
                    </li>
                    <li>
                        <a href="login.html" class="btn-login login">Login</a>
                    </li>
                    <li>
                        <a href="approve.php">Approve</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h1><?php echo date('l, F j, Y'); ?></h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+2, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Four');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+3, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Five');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+4, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>
                        <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Six');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Seven');"></div>
                <div class="carousel-caption">
                    <h1><?php $date  = mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")); echo date('l, F j, Y', $date); ?></h1>
                </div>
            </div>            
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 0000 //changes the speed
    })
    </script>
</body>

</html>
