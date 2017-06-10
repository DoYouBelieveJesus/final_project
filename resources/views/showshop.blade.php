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
<body class="fluid-container">
@include('layout.navbar')

   <table id="showshop" class="table table-hover">
        <tbody>
            <tr><th>店名</th><th>位置</th><th>電話</th><th>營業時間</th><th>Rank</th><th>官網/粉絲專業</th></tr>
                @if($AllShop->count()==0)
                <tr><td colspan="6">目前沒有資料</td></tr>
                @else   
                @foreach($AllShop as $shop)
                <tr>
                        <td>{{$shop->name}}</td><td>{{$shop->address}}</td><td>{{$shop->businessFrom}}</td><td>{{$shop->website}}</td><td></td><td></td>
                </tr>
                @endforeach

             @endif
        </tbody>
   </table>

</body>
</html>