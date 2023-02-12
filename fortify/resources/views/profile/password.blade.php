<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Edit pass</title>
</head>

<body>
    @include('nav')
    <br>
    <div class="container mx-auto">
        <div class="row w- justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">{{ __('Change password') }}</div> -->

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="">
                        <form class="w-80 mx-auto p-4" method="POST" action="{{ route('user-password.update') }}">
                            <h1 class="italic">Change password</h1>
                            @if (session ('status') == "password-updated")
                            <div class="mb-4 font-medium text-sm text-green-600">
                                Password updated successfully.
                            </div>
                            @endif
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="current_password">Current password</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" class="form-control @error('current_password','updatePassword') is-invalid @enderror" name="current_password" required autofocus>

                                    @error('current_password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="password"> New pass</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" class="form-control @error('password','updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block my-4 text-gray-700 text-sm font-bold mb-2" for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="shadow my-4 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Save new Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>