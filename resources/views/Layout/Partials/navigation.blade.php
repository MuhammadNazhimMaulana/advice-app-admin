<div class="n1">
    <div>
      <i id="menu-btn" class="fas fa-bars"></i>
    </div>
    {{-- <div class="search">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="cari">
    </div> --}}
  </div>

  <div class="profile">
    <a href="/admin/profile"><img src="{{ asset('images/Default_User.png') }}" class="border border-dark"></a>
    @auth
      <form action="/admin/logout" method="POST">
        @csrf
        <button class="ms-4 border-0 btn btn-dark" type="submit">Logout</button>
      </form>
    @else
    {{-- Jika Belum Login --}}
      <a class="ms-4 btn btn-primary" href="/admin/login">Login</a>
    @endauth
  </div>
