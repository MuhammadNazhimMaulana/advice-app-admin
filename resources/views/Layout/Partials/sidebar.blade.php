<section id="menu">
    <div class="logo">
        <img src="{{ asset('Images/Bonevian.png') }}">
        <h2>Book App</h2>
    </div>

    <div class="items">
        <li class="{{ ($title == "Dashboard") ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i><a href="/dashboard">Dashboard</a></li>
        <li class="{{ ($title == "Employee") ? 'active' : '' }}"><i class="fas fa-users"></i><a href="/admin/employee">Petugas Loket</a></li>
    </div>

</section>