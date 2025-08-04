<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SiPintar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ secure_asset('asset/css/style1.css') }}" />

  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        @foreach ($data as $item)
        {{-- <img src="{{ asset($item->logo)}}" class="img-fluid  position-absolute top-0 start-0 m-3 z-4" style="width: 50px;"> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="{{ route('login')}}" class="text-warning fw-bold text-decoration-none fs-3">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir nav -->
    <!-- jum -->
    <div class="jumbotron text-center">
        <p class="lead fs-4 text-warning">Selamat Datang Di</p>
      <h1 class="display-4 text-warning">{{ $item->nama_sekolah }}</h1>
    </div>
    <!-- akhir jum -->

    <!-- info -->
    <section>
      <div class="container mb-5 mt-5">
        <div class="row">
          <div class="col mb-3">
            <h2>Tentang SMPN 2 Kuripan</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-8  mt-3">
            <p>
                Pada tahun 1998 dibangun Gedung Sekolah SMP Negeri 2 Kuripan yang terletak di Desa Kuripan Utara. Dulunya desa Kuripan  adalah merupakan desa IDT  (Impres Desa Tertinggal) sehingga dengan adanya SMP Negeri 2 Kuripan  diharapkan akan mampu membawa perubahan positif terhadap prilaku dan pola pikir peserta didik khususnya, dan masyarakat Kuripan secara umum. Letak SMP Negeri 2 Kuripan tepatnya ada di Desa  Kuripan Utara Kecamatan Kuripan Kabupaten  Lombok Barat dan merupakan daerah perbatasan Kabupaten Lombok Barat dengan  Kabupaten Lombok Tengah yang dilalui jalur lalu lintas jalan negara Kota Mataram - Praya. Jarak SMP Negari 2 Kuripan dengan Ibu Kota Kabupaten Lombok Barat ± 10 Km dan Ibu kota Propinsi NTB  (Mataram)  ± 25 Km.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir info -->

    <!--  -->
    <section class="visi">
      <div class="container">
        <div class="row text-center mb-5 pt-5">
          <h2>Visi Dan Misi</h2>
          <hr />
        </div>
        <div class="row justify-content-center text-center mb-5 pb-5">
          <div class="col-md-4">
            <h3>Visi</h3>
            <p>
                {{ $item->visi }}
            </p>
          </div>
          <div class="col-md-4">
            <h3>Misi</h3>
            <p>
                {{ $item->misi }}
            </p>
          </div>
        </div>
      </div>
    </section>
    <!--  -->

    <!-- layanan  -->
    <section class="mb-5 nail">
      <div class="container conten mb-5">
        <div class="row">
          <div class="col-lg text-center mb-5">
            <h3>Hubungi Kami</h3>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <i class="bi bi-geo-alt float-start me-3" style="font-size: 40px"></i>
            <h6>{{ $item->alamat }}</h6>
          </div>
          <div class="col-lg-4">
            <i class="bi bi-telephone float-start me-3" style="font-size: 40px"></i>
            <h6>{{ $item->noHp_instansi }}</h6>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <i class="bi bi-envelope float-start me-3" style="font-size: 40px"></i>
            <h6>{{ $item->email }}</h6>
          </div>
          <div class="col-lg-4">
            <i class="bi bi-clock float-start me-3" style="font-size: 40px"></i>
            <h6>07.30-13.00</h6>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir layanan -->

    <!-- footer -->
    <footer class="bg-dark">
      <div class="container pt-3">
        <div class="row text-center text-white">
          <div class="col-lg">
            <p>&copy;{{ $item->nama_sekolah }}</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
