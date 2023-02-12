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
    <div class="flex justify-center items-center h-screen">
        <div class="mx-auto w-80 bg-gray-300 p-3">
            <h1 class="text-4xl text-center">reset pass</h1>
            <br>
            @error('email')
            <div class="mt-2 bg-red-100 border border-red-400 text-red-700 px-2 py-1 rounded relative" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline">{{$message}}.</span>
            </div>
            @enderror
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            <form action="" method="post">
                @csrf
                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="username">
                    Please type your email
                </label>
                <input class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{old('email')}}" type="email" name="email" id="email" placeholder="Email">
                <br><input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Reset">
            </form>
        </div>
    </div>
</body>

</html>