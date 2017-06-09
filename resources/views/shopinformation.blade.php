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
 <div class="col-md-offset-4 col-md-4">
<h1>店家名稱</h1>
<table id="commentcontainer">
    <tbody>
        <tr><th>留言</th></tr>
        @for($i=0;$i<3;$i++)
    
        <tr><td>留言者</td></tr>
        <tr><td style="height:70px">comment</td></tr>
        <tr><td>time</td></tr>
        @endfor
        <tr><td>留言<td></tr>
        <tr>
            <td>
                 <form action="" type="post" id="comment" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <textarea name="commentword"></textarea>
                </form>
            
            </td>

        </tr>
        <tr>
                <td colspan="2" style="text-align:right">
                    <input type="submit" value="留言" form="comment">
                </td>
        </tr>
     </tbody>
<table>
<div>
</body>
</html>