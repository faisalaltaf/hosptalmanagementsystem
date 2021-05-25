<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
</head>
<body>
<p>{{Auth::guard('doctor')->user()->email}}</p>

      <span><a href="{{route('doctor.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit(); ">Logout</a></span>

    <form action="{{route('doctor.logout')}}" method="post" id="logout-form">
    @csrf</form>
</body>
</html>