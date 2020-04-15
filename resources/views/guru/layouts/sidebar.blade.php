<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{auth()->user()->guru->getAvatar()}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->guru->nama}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="/guru">
                    <i class="fa fa-bars"></i>
                    <span>Beranda</span>
                    {{-- <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span> --}}
                </a>
            </li>
            <li> 
                <a href="/guru/profile">
                    <i class="fa fa-user-o"></i> <span>Profile</span>
                    <span class="pull-right-container">
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Data Siswa</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/guru/siswa"><i class="fa fa-caret-right"></i> Daftar Siswa</a></li>
                    <li><a href="/guru/kelas"><i class="fa fa-caret-right"></i> Daftar Kelas</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Data Nilai</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/guru/mapel"><i class="fa fa-caret-right"></i>Mata Pelajaran</a></li>
                    <li><a href="/guru/nilai"><i class="fa fa-caret-right"></i>Nilai Siswa</a></li>
                </ul>
            </li>
            <li>
                <a href="/guru/jadwal">
                    <i class="fa fa-file-text-o"></i>
                    <span>Data Jadwal</span>
                    {{-- <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span> --}}
                </a>
            </li>
            <li>
                <a href="/guru/laporan">
                    <i class="fa fa-file-o"></i>
                    <span>Laporan</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
