<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/master.css') }}">
	<meta charset="UTF-8">
	@yield('title')

	@yield('style')
</head>
<body>
    <div id="headerBar">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-4" id="company-name">
                    <h4 id="nav_title">JobBox</h4>
                </div>
                <div class="hidden-xs col-sm-4">
                    <form class="navbar-form" role="search">
                        <div class="input-group add-on">
                            <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <div id="user-logout">
                        <h5 style="text-align:right">
                            @if (Auth::check())
                                <a href="/home">{{{Auth::user()->email}}}</a>
                                &nbsp; | &nbsp;
                                <a href="/logout">Logout</a>
                            @else
                                <a href="/loginhelp">Login Help</a>
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar-nav">
                    <div id="verticalNav" class="navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <span class="visible-xs navbar-brand">Sidebar menu</span>
                        </div>
                        <div class="navbar-collapse collapse sidebar-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">My Page</a></li>
                                <li><a href='/jobs'>View My Jobs</a></li>
                                <li><a href='/addjob'>Add Job</a></li>
                                <li><a href="/profile">Edit Profile</a></li>
                                <li><a href="#">Manage Documents</a></li>
                                <li><a href="#">Manage Contacts</a></li>
                                <li><a href="#">Archived Jobs</a></li>                     
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
	            @yield('content')
            </div>
        <!--end of first row-->
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ URL::asset('boostrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('/js/jquery-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="/js/jquery-3.1.0.min.js"></script>
    <script src='/js/vue.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	@yield('footer')
</body>
</html>
