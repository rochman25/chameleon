<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                            <img alt="image" src="<?= base_url() ?>assets/admin/img/avatar/avatar-1.png" class="rounded-circle">
                            <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                            <b>System</b>
                            <p>Belum ada pesan masuk!</p>
                            <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Belum ada notifikasi!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Selamat datang di Chameleon Cloth Admin!
                            <div class="time">Yesterday</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li> -->
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url() ?>assets/admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata['admin_data']['username'] ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                <a href="<?= base_url() ?>admin/home/profile" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="<?= base_url() ?>admin/home/ubah_pass" class="dropdown-item has-icon">
                    <i class="fas fa-key"></i> Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url() ?>admin/home/logout" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Chameleon Cloth</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item active">
                <a href="<?= base_url() ?>admin/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/toko" class="nav-link"><i class="fas fa-store"></i><span>Profile Toko</span></a>
            </li>
            <li class="menu-header">Produk</li>
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/kategori" class="nav-link"><i class="fas fa-tags"></i><span>Kategori</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/produk" class="nav-link"><i class="fas fa-boxes"></i><span>Produk</span></a>
            </li>
            <li class="menu-header">Transaksi</li>
            <!-- <li class="nav-item">
                <a href="<?= base_url() ?>admin/transaksi/pembayaran" class="nav-link"><i class="fas fa-shopping-bag"></i><span>Pembayaran</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/transaksi/pengiriman" class="nav-link"><i class="fas fa-paper-plane"></i><span>Pengiriman</span></a>
            </li> -->
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/transaksi" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Transaksi</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() ?>admin/transaksi/cart" class="nav-link"><i class="fas fa-cart-arrow-down"></i><span>Cart</span></a>
            </li>
            <?php if ($this->session->userdata['admin_data']['role'] == 1) { ?>
                <li class="menu-header">Privileges</li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/pengguna" class="nav-link"><i class="fas fa-users"></i><span>Pengguna</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>admin/akun" class="nav-link"><i class="fas fa-user-tie"></i><span>Admin</span></a>
                </li>
            <?php } ?>
            <li class="menu-header">Report</li>
            <li class="nav-item">
                <a href="<?=base_url()?>admin/transaksi/laporan" class="nav-link"><i class="fas fa-file"></i><span>Laporan Penjualan</span></a>
            </li>
        </ul>
    </aside>
</div>