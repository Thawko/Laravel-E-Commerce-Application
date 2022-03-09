<!DOCTYPE html>
<html lang="en">
<head>

    <title>Layout title - @yield('title')</title>
</head>
<body>
@section('sidebar')
    Ana sidebar
@show

<div class="container">
    @yield("content")
</div>
<div class="row">
    <div class="col-sm-6">AS </div>
    <div class="col-sm-6">DS</div>
</div>
</body>
</html>
