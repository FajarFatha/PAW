<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="margin-right: 50px">ZAKATKU</a>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="/home">Home</a>
          <a class="nav-link" href='#profileModal' data-toggle='modal'>Profile</a>
      </div>
      @yield('logout')
      @yield('tombol')
    </div>
</nav>