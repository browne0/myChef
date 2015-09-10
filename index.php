<?php 
    require("common.php");

    if(empty($_SESSION['user'])){
        ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>myChef - Coming Soon</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png"> 

    </head>

    <body id="main">
        <!-- Header -->

        <!-- Coming Soon -->
        <div class="imgcontainer">
            <div class="coming-soon">
                <div class="inner-bg">
                    <div class="container vcenter">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="shadowbox col-sm-8 col-sm-offset-2">
                                    <h2>Welcome to <em>myChef</em></h2>
                                    <p>A community of chefs for you.</p>
                                </div>
                                
                                <!--<div class="timer">
                                    <div class="days-wrapper">
                                        <span class="days"></span> <br>days
                                    </div>
                                    <div class="hours-wrapper">
                                        <span class="hours"></span> <br>hours
                                    </div>
                                    <div class="minutes-wrapper">
                                        <span class="minutes"></span> <br>minutes
                                    </div>
                                    <div class="seconds-wrapper">
                                        <span class="seconds"></span> <br>seconds
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="arrowdown bounce">
                        <a class="glyphicon glyphicon-menu-down full-link" aria-hidden="true" href="#about"></a>
                    </div> 
                </div>
            </div>
        </div>
            <nav class="navbar sticky" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand logo" href="#main"><p class="special">Westchester's</p> <p>myChef</p></a>
                    </div>
                                
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="cl-effect" href="login">Login</a></li>
                            <li><a class="cl-effect" href="register">Sign Up</a></li>
                            <li><a class="cl-effect" href="#">Contact</a></li>
                        </ul>
                    </div> 
                </div>
            </nav>

     
        
        <!-- Content -->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <h1>What is <em>myChef?</em></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-center abouttext">
                        <p>We are a newly founded company in the Westchester area that will allow customers to choose their own personal meals from different chefs that we have hand picked ourselves.</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">
                        <div class="col-sm-4 col-xs-12">
                            <div class="aboutimg"><img src="http://placehold.it/200x200" alt=""></div>
                            <h2 class="abouttitle">Pick a Chef</h2>
                            <p class="aboutinfo">Choose a chef based on your preferences such as location, specialty, menu style, and rating.</p>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="aboutimg"><img src="http://placehold.it/200x200" alt=""></div>
                            <h2 class="abouttitle">Choose a meal</h2>
                            <p class="aboutinfo">Choose a meal that you would like to have, and communicate with your chef.</p>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="aboutimg"><img src="http://placehold.it/200x200" alt=""></div>
                            <h2 class="abouttitle">Enjoy!</h2>
                            <p class="aboutinfo">Enjoy great food that is perfect for any event.</p>
                        </div>
                    </div>
                </div>  
            </div>
        </section>

        <!--<div class="hr col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3"></div>-->

        <section id="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 subscribe">
                        <h3>Subscribe to our newsletter</h3>
                        <p>Sign up now to our newsletter, and you'll be one of the first to know when the site is ready:</p>                    
                        <form class="form-inline" role="form" action="assets/subscribe.php" method="post">
                            <div class="form-group">
                                <label class="sr-only" for="subscribe-email">Email address</label>
                                <input type="text" name="email" placeholder="Enter your email..." class="subscribe-email form-control" id="subscribe-email">
                            </div>
                            <button type="submit" class="btn">Subscribe</button>
                        </form>
                        <div class="success-message"></div>
                        <div class="error-message"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 social">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Flickr"><i class="fa fa-flickr"></i></a>
                    </div>
                </div>

                <div class="hr col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-4"></div>

                <div class="row">
                    <div class="col-sm-12 footer">
                        <p class="text-center copy"> &copy; Copyright 2015 <em class="copyright">myChef</em>. All rights reserved.</p>
                        <p class="text-center">Website made by <a href="http://beesdesign.net">Bee's Design</a></p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.js"></script>
        <!-- <script src="assets/js/jquery.countdown.min.js"></script> -->
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
<?php 
    }
    else
    {
        ?>

<!DOCTYPE html>
<html>
    <head>

    <title>Welcome to myChef</title>
    <!-- CSS Stylesheets -->

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Fonts -->

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
    <link href='http://fonts.googleapis.com/css?family=Cabin:600' rel='stylesheet' type='text/css'>

    <!-- Favicon -->

    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <div id="main">
        <div class="container ">
            <nav class="navbar sticky">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand logo" href="http://dev.beesdesign.net/mychef"><p class="special">Westchester's</p> <p>myChef</p></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <p> Hello, 
                                <?php 
                                    echo htmlentities($_SESSION['user']['fname'], ENT_QUOTES, 'UTF-8')." ";
                                    echo htmlentities($_SESSION['user']['lname'], ENT_QUOTES, 'UTF-8');
                                ?>! 
                            </p>
                        </li>
                        <li><a class="cl-effect" href="logout">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="container vcenter">
            <div class="setyourlocation">
                <p class="locationhead">
                    1. Set your location <br>
                    <span>Enter your zip code to find chefs near you.</span>
                </p>
            </div>
                <div class="locationcont">
                    <form action="">
                        <div class="inputmarker">
                            <i class="fa fa-3x fa-map-marker"></i>
                            <input type="text" class="enterzip" placeholder=" Enter ZIP Code">
                        </div>
                        <input type="submit" class="submitzip" value="Search">
                    </form>
                </div>
        </div>
    </body>
</html>
<?php
    }
 ?>