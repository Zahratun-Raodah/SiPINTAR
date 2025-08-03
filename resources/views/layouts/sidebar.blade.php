<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html"><img class="logo_icon img-responsive"
                        src="{{ secure_asset('asset/images/logo/logo_icon.jpg') }}" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info border-bottom border-1 border-warning">
            <h3 class="text-white">SiPINTAR</h3>
            {{-- <div class="icon_setting"></div> --}}
            <div class="user_profle_side">
                {{-- <div class="user_img">
                    <img class="img-responsive" src="{{ secure_asset('asset/images/layout_img/user_img.jpg') }}" alt="#" />
                </div> --}}
                {{-- <div class="user_info">
                    <h6>
                        @auth('admin')
                            {{ auth('admin')->user()->nama }}
                        @endauth

                        @auth('guru')
                            @php
                                $user = auth('guru')->user();
                                $status = strtolower(trim($user->status));
                            @endphp

                            {{ $user->nama }}
                            @if ($status === 'kepala sekolah' || $status === 'kepala_sekolah')
                                Kepala Sekolah
                            @else
                                Guru
                            @endif
                        @endauth
                    </h6>

                    <p><span class="online_animation"></span> Online</p>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        {{-- <h4></h4> --}}
        <ul class="list-unstyled components">
            <li class="active">
                <a href={{ route('dashboard') }}><i class="fa fa-home yellow_color"></i><span>Dashboard</span></a>
            </li>
            @auth('admin')
            <li><a href={{ route('profil') }}><i class="fa fa-id-card-o purple_color2"></i> <span>Data profil</span></a></li>
            <li><a href={{ route('admin') }}><i class="fa fa-user purple_color2"></i> <span>Data Admin</span></a></li>
            <li><a href={{ route('guru') }}><i class="fa fa-users purple_color2"></i> <span>Data Guru</span></a></li>
            <li><a href={{ route('siswa') }}><i class="fa fa-child purple_color2"></i> <span>Data Siswa</span></a></li>
            <li><a href={{ route('mapel') }}><i class="fa fa-table purple_color2"></i> <span>Mapel</span></a></li>
            <li><a href="{{ route('persensi') }}"><i class="fa fa-calendar-check-o orange_color"></i> <span>Presensi</span></a></li>
            <li><a href="{{ route('jurnal') }}"><i class="fa fa-file-text-o orange_color"></i> <span>Jurnal Mengajar</span></a></li>
            <li><a href="{{ route('page') }}"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
            @endauth
            @auth('guru')
            @php
                $user = auth('guru')->user();
            @endphp

            {{-- Menu Umum untuk semua (guru + kepala sekolah) --}}
            <li><a href="{{ route('persensi') }}"><i class="fa fa-calendar-check-o orange_color"></i> <span>Presensi</span></a></li>
            <li><a href="{{ route('jurnal') }}"><i class="fa fa-file-text-o orange_color"></i> <span>Jurnal Mengajar</span></a></li>

            {{-- Menu khusus kepala sekolah --}}
            @if(strtolower($user->status) === 'kepala_sekolah')
                <li><a href="{{ route('laporan') }}"><i class="fa fa-bar-chart orange_color"></i> <span>Laporan Sekolah</span></a></li>
                <li><a href="{{ route('monitoring') }}"><i class="fa fa-eye orange_color"></i> <span>Monitoring Guru</span></a></li>
            @endif
            <li><a href="{{ route('page') }}"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
            @endauth
        </ul>
    </div>
</nav>
