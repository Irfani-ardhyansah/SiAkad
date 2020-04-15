<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('adminlte/dist/img/avatar.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="/admin">
                        <i class="fa fa-bars"></i>
                        Beranda
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i> <span>Data Pengguna</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/profile"><i class="fa fa-caret-right"></i> Profile Saya</a></li>
                        <li><a href="/admin/akun"><i class="fa fa-caret-right"></i> Data Akun</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i> <span>Data Siswa</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/admin/siswa"><i class="fa fa-caret-right"></i> Daftar Siswa</a></li>
                        <li><a href="/admin/kelas"><i class="fa fa-caret-right"></i> Daftar Kelas </a></li>
                    </ul>
                </li>
                <li>
                    <a href="/admin/guru">
                        <i class="fa fa-file-text-o"></i>
                        <span>Data Guru</span>
                    </a>
                </li>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
