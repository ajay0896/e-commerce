<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container mx-auto">
        <a href="{{ route('home') }}" class="navbar-brand">CUY e-commers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">

   
                @guest
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                @endguest
                @auth
                    @if (auth()->user()->role == 'admin')
                        <li class="nav-item me-5">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Home</a>
                    </li>
                        <li class="nav-item">
                            <a href="{{ route('keranjang') }}" class="nav-link">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('summary') }}" class="nav-link">Summary</a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                        </li>
                    @endif
                @endauth


            </ul>
        </div>
    </div>
</nav>
