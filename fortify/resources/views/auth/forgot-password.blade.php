<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <title>Reset password</title>
</head>

<body>
    <h1>reset pass</h1>
    <br>
    <h2>type email</h2>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="post">
        @csrf
        <br><input value="{{old('email')}}" type="email" name="email" id="email" placeholder="Email">
        <br><input type="submit" value="Reset">
    </form>
</body>

</html>