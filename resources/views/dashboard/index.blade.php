@extends('index')

@section('content')
                    <div class="section-header">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                    </div>
                    <div class="section-body">
                     <div class="row column1 social_media_section">
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons fb margin_bottom_30">
                              <div class="social_icon">
                                 <i class="fa fa-check-circle"></i>
                              </div>
                              <div class="social_cont d-flex justify-content-center align-items-center">
                                 <ul>
                                    <li>
                                       <span><strong>{{ $rekapBulanIni->total_hadir}}</strong></span>
                                       <span>hadir</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons tw margin_bottom_30">
                              <div class="social_icon">
                                 <i class="fa fa-medkit"></i>
                              </div>
                              <div class="social_cont d-flex justify-content-center align-items-center">
                                 <ul>
                                    <li>
                                       <span><strong>{{ $rekapBulanIni->total_sakit}}</strong></span>
                                       <span>Sakit</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons linked margin_bottom_30">
                              <div class="social_icon">
                                 <i class="fa fa-file-alt"></i>
                              </div>
                              <div class="social_cont d-flex justify-content-center align-items-center">
                                 <ul>
                                    <li>
                                       <span><strong>{{ $rekapBulanIni->total_izin}}</strong></span>
                                       <span>Izin</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full socile_icons google_p margin_bottom_30">
                              <div class="social_icon">
                                 <i class="fa fa-exclamation-triangle"></i>
                              </div>
                              <div class="social_cont d-flex justify-content-center align-items-center">
                                 <ul>
                                    <li>
                                       <span><strong>{{ $rekapBulanIni->total_alpa}}</strong></span>
                                       <span>Alpha</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row column4 graph">
                        <div class="col-md-6 margin_bottom_30">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-calendar"></i> Absensi</span><span class="plus_green_bt"></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Absen Bulan ini</p>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                        <li><p>Hadir</p><br><strong>{{ $rekapBulanIni->total_hadir}}</strong></li>
                                        <li><p>Sakit</p><br><strong>{{ $rekapBulanIni->total_sakit}}</strong></li>
                                        <li><p>Izin</p><br><strong>{{ $rekapBulanIni->total_izin}}</strong></li>
                                        <li><p>Alpa</p><br><strong>{{ $rekapBulanIni->total_alpa}}</strong></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-book"></i> Jurnal</span><span class="plus_green_bt"></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Jurnal Mengajar Guru</p>
                                 </div>
                                 <div class="msg_list_main">
                                    <ul class="msg_list">
                                        @foreach ($data as $item)
                                        <li>
                                           <span><img src="{{secure_asset('asset/images/layout_img/images.jpg') }}" class="img-responsive" alt="#" /></span>
                                           <span>
                                           <span class="name_user">{{$item->guru->nama}}</span>
                                           <span class="msg_user">{{$item->kegiatan_belajar}}</span>
                                           <span class="time_ago">{{$item->created_at}}</span>
                                           </span>
                                        </li>
                                        @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
@endsection
