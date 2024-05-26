<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        {{-- font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
    
        {{-- css --}}
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 left-box rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background:#7469B6;">
                <div class="feautured-image mb-3 pt-4">
                    <img src="image/anjay.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace font-weight:600px">Be verified</p>
                <small class="text-white text-wrap text-center" style="width:17rem">yooooooooooooo</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <p>Hello again,</p>
                        <p>---------------</p>
                    </div>
                    <div class="input-group mb-3">
                        {{-- <x-input-label for="username" :value="('username')"/> --}}
                        <div class="fom-control">
                            <input type="text" name="username" id="username" class="form-control form-control-lg bg-light fs-6 " placeholder="Masukan username anda" value="{{old('username')}}" required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('username')" class="text-danger list-group-item list-none"/>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        {{-- <x-input-label for="password" :value="('Password')"/>     --}}
                        <div class="fom-control">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6 " id="password" placeholder="Masukan Password Anda" required autocomplete="current-password">
                            <x-input-error :messages="$errors->get('password')" class="text-danger list-group-item list-none"/>
                        </div>
                    </div>
                    <div class="input-group mb-5">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <button type="submit" class="button text-decoration-none text-center rounded py-2" value="Login">Login</a>
                </div>
            </div>
            
        </div>
    </div>
</body>
in
</html>