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



    <div>
        <div class="w-80 bg-gray-300 mx-auto">


            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif



            <form class="p-4" action="{{route('user-profile-information.update')}}" method="post">
                <h1>Edit my profile</h1>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif
                @csrf
                @method('put')
                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="">Name</label>
                <input class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{Auth::user()->name ?? old('name')}} " type="name" name="name" id="name" placeholder="name">
                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="">email</label>
                <input class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{Auth::user()->email ?? old('email')}}" type="email" name="email" id="email" placeholder="Email">
                <br><input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Update">
            </form>
        </div>
    </div>
</body>

</html>