 <nav class="navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="inner-menu">
          <a href="{{route('home')}}"><img src="{{asset('assets/front/images/logo.png')}}" class="img-fluid logo-resp logo-width"></a>
        <button class="navbar-toggler" type="button" onclick="myFunction()">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse cus-collapse" id="navbarSupportedContent">
          <ul class="cus-menu cus-menu-inner">
            <li><a class="active links" href="{{route('about')}}">ABOUT</a></li>
            <li><a class="links" href="{{route('services.all')}}">SERVICES</a></li>
            <li><a class="links" href="{{route('project.all')}}">PROJECTS</a></li>
            <li><a class="links" href="{{route('sponsorship')}}">SPONSORSHIPS</a></li>
            <li><a class="links" href="{{route('gallery')}}">GALLERY</a></li>
            <li><a class="links" href="{{route('job.all')}}">CAREER</a></li>
            <li><a class="links" href="{{route('contactus')}}">CONTACT</a></li>
          </ul>
        </div>
        </div>
      </div>



    </div>
  </div>
</nav>