<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agency - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('/front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  {{-- <link href="{{asset('/front/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css"> --}}
  <link rel="stylesheet" href="{{asset('/adminres/css/modals.css')}}" type="text/css">
  <link href="{{asset('/front/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('/front/css/agency.min.css')}}" rel="stylesheet">

  {{-- Toastr --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <img src="{{asset('/front/img/logos/logo.png')}}" alt="Logo" style="width: 50px">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Mubaligh Hijrah</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#apaitu">Apa Itu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kegiatan">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#alur">Alur</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#kesan">Kesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Daftar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in" style="color:">Selamat Datang Peserta</div>
        <div class="intro-heading text-uppercase">Mubaligh Hijrah Unires</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#apaitu">Apa itu MH ?</a>
      </div>
    </div>
  </header>

  <!-- apaitu -->
  <section class="page-section" id="apaitu">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Apa itu Mubaligh Hijrah ?</h2>
          <h3 class="section-subheading text-muted">Mubaligh Hijrah adalah Program dari Unires Bla bla bla......</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="{{$tentang->icon1}} fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{$tentang->judul1}}</h4>
          <p class="text-muted">{{$tentang->deskripsi1}}</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="{{$tentang->icon2}} fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{$tentang->judul2}}</h4>
          <p class="text-muted">{{$tentang->deskripsi2}}</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="{{$tentang->icon3}} fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">{{$tentang->judul3}}</h4>
          <p class="text-muted">{{$tentang->deskripsi3}}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- kegiatan Grid -->
  <section class="bg-light page-section" id="kegiatan">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Kegiatan</h2>
          <h3 class="section-subheading text-muted">Kegiatan-kegiatan yang ada di Masjid saat Program Mubaligh Hijrah Berlangsung</h3>
        </div>
      </div>
      <div class="row">
        @foreach ($kegiatan as $k)
          @php
              $thumbnail = explode("|", $k->gambar);
              $thumbnail = $thumbnail[0];
          @endphp
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1" onclick="showGambar('{{$k->gambar}}', '{{$k->judul}}', '{{$k->deskripsi}}')">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{asset('storage/kegiatan')}}/{{$thumbnail}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$k->judul}}</h4>
              <p class="text-muted">{{$k->deskripsi}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- alur -->
  <section class="page-section" id="alur">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Alur Kegiatan</h2>
          <h3 class="section-subheading text-muted">Berikut adalah Alur Kegiatan Mubaligh Hijrah : </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            @php
                $posalur = 0;
            @endphp

            @foreach ($alur as $a)
              @if ($posalur==($alur->count()-1))
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <h4>{{$a->judul}}</h4>
                  </div>
                  
                </li>
                <div class="timeline-body" style="text-align: center">
                  <p>{{$a->tanggal}}</p>
                  <p class="text-muted">{{$a->deskripsi}}</p>
                </div>
              @else
                @if (($posalur%2)==0)
                  <li>
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>{{$a->judul}}</h4>
                        <h4 class="subheading">{{$a->tanggal}}</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">{{$a->deskripsi}}</p>
                      </div>
                    </div>
                  </li>
                @else
                  <li class="timeline-inverted">
                    <div class="timeline-panel">
                      <div class="timeline-heading">
                        <h4>{{$a->judul}}</h4>
                        <h4 class="subheading">{{$a->tanggal}}</h4>
                      </div>
                      <div class="timeline-body">
                        <p class="text-muted">{{$a->deskripsi}}</p>
                      </div>
                    </div>
                  </li>
                @endif
              @endif
              
              @php
                $posalur++;
              @endphp
            @endforeach
            
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- kesan -->
  <section class="bg-light page-section" id="kesan">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Pesan Kesan Peserta MH</h2>
          <h3 class="section-subheading text-muted">Apa kata mereka tentang Mubaligh Hijrah ?</h3>
        </div>
      </div>
      <div class="row">
        @foreach ($kesan as $ke)
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="{{asset('/front/img/kesan')}}/{{$ke->gambar}}" alt="">
              <h3><span>{{$ke->nama}}</span></h3>
              <p class="all-pro-ad">{{$ke->status}}</p>
              <p>
                {{$ke->kesan}}
              </p>
            </div>
          </div>
        @endforeach
      </div>
      
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Dan masih banyak lagi, Pesan dan Kesan menarik dalam Program Mubaligh Hijrah</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  {{-- <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('/front/img/logos/envato.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('/front/img/logos/designmodo.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('/front/img/logos/themeforest.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('/front/img/logos/creative-market.jpg')}}" alt="">
          </a>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Daftar Sekarang!</h2>
          <h3 class="section-subheading" style="color:bisque">Kuota Terbatas</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          {!! Form::open(['url' => 'daftar']) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::text('nama', '', ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nama Lengkap', 'required' => 'required', 'data-validation-required-message' => 'Tolong Masukkan Nama Anda']) !!}
              </div>
              <div class="form-group">
                {!! Form::email('email', '', ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'required' => 'required', 'data-validation-required-message' => 'Tolong Masukkan Email Anda']) !!}
              </div>
              <div class="form-group">
                {!! Form::text('telpon', '', ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Nomor Telpon ~ ex. 085712345678', 'required' => 'required', 'data-validation-required-message' => 'Tolong Masukkan No. HP Anda']) !!}
              </div>
              <div class="form-group">
                {!! Form::select('jenis_kelamin', ['L' => 'Laki-laki', 'P' => 'Perempuan'], '', ['class' => 'form-control']) !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                {!! Form::textarea('alasan', '', ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'Alasan ~ Kenapa ingin mengikuti Program MH ? Apa yang anda inginkan ? (Opsional)']) !!}
              </div>
            </div>
            <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                {!! Form::submit('Daftar', ['class' => 'btn btn-primary btn-xl text-uppercase', 'id' => 'senMessageButton', 'style' => 'color: black']) !!}
              </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">
              <a href="/admin">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- Modal -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 id="TitleModalKegiatan" class="text-uppercase">Project Name</h2>
                
                  {{-- CAROUSEL --}}
                  {{-- ====== --}}
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                  
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <img id="imgCarousel1" src="la.jpg" alt="Los Angeles">
                      </div>
                  
                      <div class="item">
                        <img id="imgCarousel2" src="chicago.jpg" alt="Chicago">
                      </div>
                  
                      <div class="item">
                        <img id="imgCarousel3" src="ny.jpg" alt="New York">
                      </div>
                    </div>
                  
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                    {{-- ===== --}}
                    {{-- END CAROUSEL --}}

                <p id="DeskirpsiModalKegiatan"></p>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('/front/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('/front/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Contact form JavaScript -->
  <script src="{{asset('/front/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('/front/js/contact_me.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('/front/js/agency.min.js')}}"></script>
  {{-- Toastr --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if(Session::has('berhasil'))
      toastr.success("{{Session::get('berhasil')}}", "Selesai")
		@endif
  </script>
  <script>
  function showGambar(Image, title, deskripsi) {
    var t = document.getElementById('TitleModalKegiatan');
    var d = document.getElementById('DeskirpsiModalKegiatan');
    var img1 = document.getElementById('imgCarousel1');
    var img2 = document.getElementById('imgCarousel2');
    var img3 = document.getElementById('imgCarousel3');

    var srcimg = Image.split("|");
    var srcimg1 = srcimg[0];
    var srcimg2 = srcimg[1];
    var srcimg3 = srcimg[2];
    
    img1.src = "{{asset('storage/kegiatan/')}}/"+srcimg1;
    img2.src = "{{asset('storage/kegiatan/')}}/"+srcimg2;
    img3.src = "{{asset('storage/kegiatan/')}}/"+srcimg3;

    t.innerHTML = title;
    d.innerHTML = deskripsi;
  }
  </script>
</body>

</html>
