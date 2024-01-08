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
            <a class="collapse-item" href="index.php?route=medical">Pendaftaran</a>
            <a class="collapse-item" href="index.php?route=vital">Pemeriksaan Vital Sign</a>
            <a class="collapse-item" href="index.php?route=inspection">Pemeriksaan Dokter</a>
        </div>
    </div>
</li>


<hr class="sidebar-divider">

<?php if(str_contains($_SESSION['user_access'],'payment')): ?>
<div class="sidebar-heading">
    Administration
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-credit-card"></i>
        <span>Pembayaran</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=payment">Data Pembayaran</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<?php endif; ?>

<?php if(str_contains($_SESSION['user_access'],'pharmacy')): ?>
<div class="sidebar-heading">
    Pharmacy
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePharmacy"
        aria-expanded="true" aria-controls="collapsePharmacy">
        <i class="fas fa-fw fa-medkit"></i>
        <span>Farmasi</span>
    </a>
    <div id="collapsePharmacy" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=payment">Data Farmasi</a>
        </div>
    </div>
</li>
<hr class="sidebar-divider">
<?php endif; ?>

<?php if(str_contains($_SESSION['user_access'],'master')): ?>
<div class="sidebar-heading">
    Data
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
        aria-expanded="true" aria-controls="collapseData">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseData" class="collapse" aria-labelledby="headingData"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?route=patient">Data Pasien</a>
            <a class="collapse-item" href="index.php?route=service">Data Layanan</a>
            <a class="collapse-item" href="index.php?route=medicine">Data Obat</a>
            <a class="collapse-item" href="index.php?route=doctor">Data Dokter</a>
            <a class="collapse-item" href="index.php?route=user">Data User</a>
            <a class="collapse-item" href="index.php?route=role">Role User</a>
           
        </div>
    </div>
</li>

<hr class="sidebar-divider d-none d-md-block">
<?php endif; ?>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->