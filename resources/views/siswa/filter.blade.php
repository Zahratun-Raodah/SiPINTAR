@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Data Siswa</h2>
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
                                <h2>Data Siswa</h2>
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
                                       <a href="{{ route('siswa.tambah') }}" class="btn btn-info ml-4 mt-2">tambah</a>
                                       <div class="col-md-12">
                                       <div class="inbox-head mt-3">
                                        <h3>Daftar Siswa</h3>
                                        <form action="{{ route('siswa.search') }}" class="pull-right position search_inbox">
                                            <div class="input-append">
                                                <input type="text" class="sr-input" name="keyword"  value="{{ request('keyword') }}"
                                                    placeholder="Search siswa">
                                                <button class="btn sr-btn" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                       <div class="table_section padding_infor_info">
                                          <div class="table-responsive-sm">
                                             <table class="table table-hover">
                                                <thead>
                                                   <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nis</th>
                                                    <th>Kelas</th>
                                                    <th>Agama</th>
                                                    <th>Alamat</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Nomer whatshapp</th>
                                                    <th>Aksi</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data as $index => $item )
                                                    <tr>
                                                       <td>{{ $index + 1 }}</td>
                                                       <td>{{ $item->nama }}</td>
                                                       <td>{{ $item->nis }}</td>
                                                       <td>{{ $item->kelas }}</td>
                                                       <td>{{ $item->agama }}</td>
                                                       <td>{{ $item->alamat }}</td>
                                                       <td>{{ $item->jenis_kelamin }}</td>
                                                       <td>{{ $item->nomer_whatshapp }}</td>
                                                       <td>
                                                         <a href="{{ route('siswa.edit', [$item->id]) }}" class="btn btn-warning">edit</a>
                                                         <form action="{{ route('siswa.destroy', [$item->id]) }}" method="POST" class="d-inline" id="form-hapus-{{ $item->id }}">
                                                             @csrf
                                                             @method('DELETE')
                                                             <button type="button" class="btn btn-danger" onclick="hapusData({{ $item->id }})">hapus</button>
                                                         </form>
                                                       </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Siswa tidak ditemukan.</td>
                                                    </tr>
                                                    @endforelse
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

@section('scripts')
    <script>
        function hapusData(id) {
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-hapus-' + id).submit();
                }
            });
        }
    </script>
@endsection

{{ $data->withQueryString()->links() }}
