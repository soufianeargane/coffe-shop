<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>edit profile</title>
</head>

<body>
    @include('nav')
    <br>
    <h1>edit profile</h1>


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

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif


    <form action="{{route('user-profile-information.update')}}" method="post">
        @csrf
        @method('put')
        <br><input value="{{Auth::user()->name ?? old('name')}} " type="name" name="name" id="name" placeholder="name">
        <br><input value="{{Auth::user()->email ?? old('email')}}" type="email" name="email" id="email" placeholder="Email">
        <br><input type="submit" value="Update">
    </form>

</body>

</html>