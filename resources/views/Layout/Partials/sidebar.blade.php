<section id="menu">
    <div class="logo">
        <img src="{{ asset('images/Bonevian.png') }}">
        <h2>{{__('Aplikasi Penilaian Kepuasan Pelanggan') }}</h2>
    </div>

    <div class="items">
        <li class="{{ ($title == "Dashboard") ? 'active' : '' }}"><i class="fas fa-tachometer-alt"></i><a href="/">Dashboard</a></li>
        <li class="{{ ($title == "Employee") ? 'active' : '' }}"><i class="fas fa-users"></i><a href="/admin/employee">Petugas Loket</a></li>
        <li class="{{ ($title == "Performance") ? 'active' : '' }}"><i class="fas fa-clipboard-list"></i><a href="/admin/employee-performance">Performance Board</a></li>
        <li class="{{ ($title == "Report") ? 'active' : '' }}"><i class="fa fa-file"></i> <a href="/admin/report">Laporan</a></li>
    </div>

</section>