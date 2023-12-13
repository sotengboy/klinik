<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/klinik">
    <div class="sidebar-brand-icon rotate-n-15">
        
    </div>
    <div class="sidebar-brand-text mx-3">Klinik Mufad Medika</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php?route=home">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Main
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Layanan Medis</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=penggunaan">Pendaftaran</a>
            <a class="collapse-item" href="index.php?route=pembayaran">Pemeriksaan Vital Sign</a>
            <a class="collapse-item" href="index.php?route=pembayaran">Pemeriksaan Dokter</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Administration
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Pembayaran</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=patient">Data Pembayaran Pending</a>
            <a class="collapse-item" href="index.php?route=tarif">Data Pembayaran Lunas</a>
           
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
        aria-expanded="true" aria-controls="collapseData">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseData" class="collapse" aria-labelledby="headingData"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=patient">Data Patient</a>
            <a class="collapse-item" href="index.php?route=tarif">Data Layanan</a>
            <a class="collapse-item" href="index.php?route=tarif">Data Obat</a>
            <a class="collapse-item" href="index.php?route=tarif">Data Dokter</a>
            <a class="collapse-item" href="index.php?route=user">Data User</a>
            <a class="collapse-item" href="index.php?route=role">Role User</a>
           
        </div>
    </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->