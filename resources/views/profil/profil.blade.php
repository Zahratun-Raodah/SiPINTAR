@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Data Profil</h2>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- table section -->
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Data Profil</h2>
                            </div>
                        </div>
                        <div class="full inbox_inner_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white_shd full margin_bottom_30">
                                       <div>
                                          <div class="heading1 margin_0">
                                          </div>
                                       </div>
                                       <a href="{{ route('profil.tambah') }}" class="btn btn-success ml-5 mt-2">tambah</a>
                                       <div class="table_section padding_infor_info">
                                          <div class="table-responsive-sm">
                                            <table class="table table-bordered">
                                                @if (session('success'))
                                                  <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                                @endif

                                                {{-- @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif --}}
                                                <thead class="bg-info text-white text-center">
                                                   <tr class="text-center">
                                                    <th>Nama Sekolah</th>
                                                    <th>Alamat</th>
                                                    <th>Nama Pimpinan</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as  $item)
                                                    <tr>
                                                       <td>{{ $item->nama_sekolah }}</td>
                                                       <td>{{ $item->alamat }}</td>
                                                       <td>{{ $item->nama_pimpinan }}</td>
                                                       <td>{{ $item->email }}</td>
                                                       <td class="text-center">
                                                         <a href="{{ route('profil.edit') }}" class="btn btn-warning">edit</a>
                                                         <a href="{{ route('profil.show') }}" class="btn btn-success">detail</a>
                                                       </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table section -->
            </div>
        </div>
    </div>
@endsection

