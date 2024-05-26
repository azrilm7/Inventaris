<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row d-flex flex-wrap-reverse justify-content-center align-items-center min-vh-100">
                <div class="col-12 card p-5 col-sm-12 col-md-5 col-lg-5 col-xl-5 d-flex flex-column justify-content-center align-items-center px-5">
                    <div class="row d-flex justify-content-center">
                        <h4 class="fw-bold">Register</h4>
                        <p class="fw-medium text-secondary mt-3">Enter your account details</p>
                        <div class="d-flex flex-column gap-3 justify-content-start">
                            <x-input-label for="name" :value="__('Name')"/>
                            <div class="fom-control">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama anda" value="{{ old('name') }}" required autofocus autocomplete="name">
                                <x-input-error :messages="$errors->get('name')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="username" :value="__('Username')"/>
                            <div class="fom-control">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username anda" value="{{ old('username') }}" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('username')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')"/>
                            <div class="fom-control">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Not set</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <x-input-error :messages="$errors->get('jenis_kelamin')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="email" :value="__('Email')"/>
                            <div class="fom-control">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email anda" value="{{ old('email') }}" required autofocus autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="password" :value="__('Password')"/>    
                            <div class="fom-control">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password Anda" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="password_confirmation" :value="__('Password Confirmation')"/>    
                            <div class="fom-control">
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Konfirmasi Password Anda" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger list-group-item list-none"/>
                            </div>
                            
                            <x-input-label for="role" :value="__('Role')"/>
                            <div class="fom-control">
                                <select name="role" id="role" class="form-control">
                                    <option value="">Not set</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Petugas">Petugas</option>
                                    <option value="Operator">Operator</option>
                                </select>
                                <x-input-error :messages="$errors->get('role')" class="text-danger list-group-item list-none"/>
                            </div>
                        
                                <a href="{{route('login')}} " class="button btn btn-primary text-decoration-none">Login page</a>
                            <button type="submit" class="button text-decoration-none text-center rounded py-2">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
