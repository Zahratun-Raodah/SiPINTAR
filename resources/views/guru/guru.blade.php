@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Data Guru</h2>
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
                                <h2>Data Guru</h2>
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
                                       <a href="{{ route('guru.tambah') }}" class="btn btn-success ml-5 mt-2">tambah</a>
                                       <div class="table_section padding_infor_info">
                                          <div class="table-responsive-sm">
                                             <table class="table table-hover table-bordered">
                                                @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
                                                <thead class="bg-info text-white text-center">
                                                   <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Mapel</th>
                                                    <th>Agama</th>
                                                    {{-- <th>Alamat</th> --}}
                                                    <th>Jenis Kelamin</th>
                                                    <th>Aksi</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $index => $item)
                                                    <tr>
                                                       <td class="text-center">{{$index + 1}}</td>
                                                       <td>{{ $item->nama }}</td>
                                                       <td>{{ $item->mapel }}</td>
                                                       <td>{{ $item->agama }}</td>
                                                       {{-- <td>{{ $item->alamat }}</td> --}}
                                                       <td>{{ $item->jenis_kelamin }}</td>
                                                       <td class="text-center">
                                                         <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-warning">edit</a>
                                                         <a href="{{ route('guru.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                         <form action="{{ route('guru.destroy', [$item->id]) }}" method="POST" class="d-inline" id="form-hapus-{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger" onclick="hapusData({{ $item->id }})">hapus</button>
                                                        </form>
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