<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
	<meta charset="UTF-8">
	@yield('title')

	@yield('style')
    <style>
        body{
            background: #eeeeee;
        }
        #headerBar {
            width: 100%;
            background-color: #5cb85c;
        }
        #headerBar a {
            color: #006400;
        }
        .add-on .input-group-btn > .btn {
            border-left-width:0;left:-2px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }
        /* stop the glowing blue shadow */
        .add-on .form-control:focus {
            box-shadow:none;
            -webkit-box-shadow:none; 
            border-color:#cccccc; 
        }
        .form-control{width:20%}
        #company-name{
            margin: 5px 0px 0px 0px;
        }
        #user-logout{
            margin: 15px 0px 0px 0px;
        }
	    /* make sidebar nav vertical */ 
	    @media (min-width: 768px) {
            .sidebar-nav .navbar .navbar-collapse {
                padding: 0;
                max-height: none;
            }
            .sidebar-nav .navbar ul {
                float: none;
                display: block;
            }
            .sidebar-nav .navbar li {
                float: none;
                display: block;
            } 
            .sidebar-nav .navbar li a {
                padding-top: 12px;
                padding-bottom: 12px;
            }
        }
/*      @brand-primary: darken(#428bca, 6.5%); // #337ab7
        @brand-success: #5cb85c;
        @brand-info:    #5bc0de;
        @brand-warning: #f0ad4e;
        @brand-danger:  #d9534f; */
    </style>
</head>
<body>
    <div id="headerBar">
        <div class="container">
            <div class="col-md-4" id="company-name">  
                <h4>JobBox</h4>
            </div>
            <div class="col-md-4">
                <form class="navbar-form" role="search">
                    <div class="input-group add-on">
                        <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div id="user-logout">
                    <h5 style="text-align:right">
                        @if (Auth::check())
                            <a href="/home">{{{Auth::user()->email}}}</a>
                            &nbsp; | &nbsp;
                            <a href="/logout">Logout<a>
                        @else
                            <a href="/loginhelp">Login Help</a>
                        @endif
                      <!---  <a href="#">John Doe</a> 
                        &nbsp;|&nbsp;
                        <a href="/logout">logout</a> --->
                    </h5>
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
                                <li><a href="#">Add Job</a></li>
                                <li><a href="#">Edit Profile</a></li>
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
        </div>
    </div>
	<script src="{{ URL::asset('boostrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
