<!DOCTYPE html>
<html>
<head>
    <title> sds </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="{{'css/home.css'}}" type="text/css">

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body class="container-fluid">
@include('layout.navbar')
       <table class="searchbarcontainer">
        <tbody>
        <tr><td>Just Eat</td></tr>
        <tr><td>
        <form  action="" method="get"  role="search" > 
            <div class="col-xs-12">
                <div id="custom-search-input">
                     <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Search for your food" id="search-input"/>
                            <span class="input-group-btn">
                            <button class="btn btn-default btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                            </button>
                            </span>
                    </div>
                </div>
            </div>
        </form>
        </td></tr>
        </tbody>
            <table>


</body>
</html>