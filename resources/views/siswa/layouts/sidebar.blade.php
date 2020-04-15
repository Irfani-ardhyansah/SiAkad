<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{auth()->user()->siswa->getAvatar()}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->siswa->nama}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="/siswa">
                        <i class="fa fa-bars"></i>
                        <span>Beranda</span>
                        {{-- <span class="pull-right-container">
                            <span class="label label-primary pull-right">4</span>
                        </span> --}}
                    </a>
                </li>
                <li>
                    <a href="/siswa/profile">
                        <i class="fa fa-user-circle-o"></i> <span>Profile</span>
                        <span class="pull-right-container">
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-text-o"></i> <span>Akademik</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/siswa/nilai"><i class="fa fa-caret-right"></i> Nilai </a></li>
                        <li><a href="/siswa/jadwal"><i class="fa fa-caret-right"></i> Jadwal Sekolah </a></li>
                    </ul>
                </li>
                <li>
                    <a href="/siswa/guru">
                        <i class="fa fa-user-o"></i>
                        <span>Daftar Guru</span>
                        {{-- <span class="pull-right-container">
                            <span class="label label-primary pull-right">4</span>
                        </span> --}}
                    </a>
                </li>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
