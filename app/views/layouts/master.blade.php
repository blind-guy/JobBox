<!doctype html>
<html lang="en">
<head>
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
	<meta charset="UTF-8">
	@yield('title')

	@yield('style')
    <style>
        #headerBar {
            width: 100%;
            background-color: #ffffff;
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
    </style>
</head>
<body>
    <div id="headerBar">
        <div class="container">
            <div class="col-md-4" id="company-name">  
                <h4>JopBox</h4>
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
                        <a href="#">John Doe</a>
                        &nbsp;|&nbsp;
                        <a href="/logout">logout</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
	@yield('content')


	<script src="{{ URL::asset('boostrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
