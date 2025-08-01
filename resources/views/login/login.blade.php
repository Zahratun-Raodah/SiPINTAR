<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SiPINTAR</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('asset/style.css') }}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('asset/css/colors.css') }}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-select.css') }}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('asset/css/perfect-scrollbar.css') }}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="{{asset('asset/js/semantic.min.css')}}" />
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <h2 class="text-white">SMPN 2 KURIPAN</h2>
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <fieldset>
                           @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul class="mb-0">
                                       @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                       @endforeach
                                 </ul>
                              </div>
                           @endif
                           <div class="field mt-5">
                              <label class="label_field">Email Address</label>
                              <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}"/>
                              {{-- @error('email')
                                 <small class="text-danger">{{ $message }}</small>
                              @enderror --}}
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" name="password" placeholder="Password" />
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt mt-5">Login</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{asset('asset/js/jquery.min.js')}}"></script>
      <script src="{{asset('asset/js/popper.min.js')}}"></script>
      <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{asset('asset/js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{asset('asset/js/bootstrap-select.js')}}"></script>
      <!-- nice scrollbar -->
      <script src="{{asset('asset/js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{asset('asset/js/custom.js')}}"></script>
   </body>
</html>