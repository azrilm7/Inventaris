<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    {{-- @if($user->jenis_kelamin === 'Laki-laki') --}}
                    <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                    
                    {{-- @elseif($user->jenis_kelamin === 'Perempuan') --}}
                    {{-- <img src="image/girl.jpeg" class="avatar img-fluid rounded" alt="">
                    @endif --}}
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                    </x-dropdown-link>
                    </form>                
                </div>
            </li>
        </ul>
    </div>
</nav>