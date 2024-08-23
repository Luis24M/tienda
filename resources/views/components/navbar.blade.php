@if (Route::has('login'))
    <nav class="flex flex-1 justify-center m-5 border border-gray-900 shadow-2xl">
        <a href="{{ url('/productos')}}">Productos</a>
        <a href="{{ url('/carrito')}}">Carrito</a>
        @auth
            <a href="{{ url('/dashboard') }}">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Register
                </a>
            @endif
        @endauth
    </nav>
@endif

<style>
  a {
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    color: #000;
    text-decoration: none;
  }
  a:hover {
    color: #000;
    text-decoration: underline;
  }
  a:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 45, 32, 0.5);
  }
  a:focus-visible {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 45, 32, 0.5);
  }
  
</style>
