
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="http://demos.creative-tim.com/paper-dashboard-pro/assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="http://demos.creative-tim.com/paper-dashboard-pro/assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Smart School</title>

        <!-- Canonical SEO -->
        <link rel="canonical" href="http://www.creative-tim.com/product/paper-dashboard-pro"/>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="http://demos.creative-tim.com/paper-dashboard-pro/assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Paper Dashboard core CSS    -->
        <link href="http://demos.creative-tim.com/paper-dashboard-pro/assets/css/paper-dashboard.css?v=1.2.1" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="http://demos.creative-tim.com/paper-dashboard-pro/assets/css/demo.css" rel="stylesheet" />


        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="http://demos.creative-tim.com/paper-dashboard-pro/assets/css/themify-icons.css" rel="stylesheet">
    </head>

<body>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard/overview.html">Smart Study Web Portal</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="register.html">
                        HomePage
                    </a>
                </li>
                <li>
                    <a href="contact.html">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="" data-image="{{getenv('baseurl')}}/assets/img/background-2.jpg">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form role="form" method="POST" action="{{ route('login.custom') }}">
                            {{ csrf_field() }}
                            <div class="card" data-background="color" data-color="blue">
                                <div class="card-header">
                                    <h3 class="card-title">Login</h3>
                                </div>
                                <div class="card-content">
                                    <div class="form-group">
                                        @if ($errors->has('token_error'))
                                            {{ $errors->first('token_error') }}
                                        @endif
                                        @include('includes.message-block')
                                    </div>

                                    <div class="form-group">
                                        <label>Username</label>
                                        <input id="username" type="text" placeholder="Enter username" class="form-control input-no-border" name="username" value="{{ old('username') }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password"  name="password" required  placeholder="Password" class="form-control input-no-border">
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                    <div class="forgot">
                                        <a href="#forget">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <div class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Developed by <a href="http://reverb.com.bd">Reverb Limited.</a>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Forms Validations Plugin -->
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/jquery.validate.min.js"></script>



<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/paper-dashboard.js?v=1.2.1"></script>



<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="http://demos.creative-tim.com/paper-dashboard-pro/assets/js/demo.js"></script>

<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>