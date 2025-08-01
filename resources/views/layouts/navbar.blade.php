<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
                    <h1 class="text-white mt-3 ml-3">SMP Negri 2 Kuripan</h1>
            </div>
            <div class="right_topbar">
                <div class="icon_info">
                    <ul class="user_profile_dd">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                {{-- <img class="img-responsive rounded-circle" src="asset/images/layout_img/user_img.jpg" alt="#" /> --}}
                                    <span class="name_user">
                                        {{-- @if (auth('guru')->check())
                                        @php
                                            $user = auth('guru')->user();
                                        @endphp
                                        @if (strtolower(str_replace(' ', '_', $user->status)) === 'kepala_sekolah')
                                        {{ $user->name }}
                                        @else
                                            {{ $user->name }}
                                        @endif
                                    @elseif (auth('admin')->check())
                                        {{ auth('admin')->user()->name }}
                                    @else
                                        Guest
                                    @endif                                     --}}
                                    @auth('admin')
                                    @php
                                        $user = auth('admin')->user();
                                    @endphp
                                    {{ $user->grl_dpn ? $user->grl_dpn . ' ' : '' }}{{ $user->nama }}{{ $user->grl_belakang ? ', ' . $user->grl_belakang : '' }}
                                    (Admin)
                                @endauth
                                @auth('guru')
                                    @php
                                        $user = auth('guru')->user();
                                        $status = strtolower(trim($user->status));
                                    @endphp
                                    {{ $user->grl_dpn ? $user->grl_dpn . ' ' : '' }}{{ $user->nama }}{{ $user->grl_belakang ? ', ' . $user->grl_belakang : '' }}
                                    @if ($status === 'kepala sekolah' || $status === 'kepala_sekolah')
                                        (Kepala Sekolah)
                                    @else
                                        (Guru)
                                    @endif
                                @endauth
                                    </span>
                                    </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('page') }}"><span>Log Out</span> <i
                                        class="fa fa-sign-out"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
