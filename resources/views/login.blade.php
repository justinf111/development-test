<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Development Test</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<main class="container-lg">
    <div class="d-flex">
        <form class="w-50 m-auto" method="post" action="/login">
            @csrf

            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" name="email" id="email" value="{{old('email', '')}}" class="form-control"/>
                @include('partials._errors', ['field' => 'email'])
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control"/>
                @include('partials._errors', ['field' => 'password'])
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
    </div>
</main>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
