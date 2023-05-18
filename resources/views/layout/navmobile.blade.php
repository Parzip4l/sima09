<nav class="navbar navbar-expand-lg navbar-dark sticky-bottom navbarmenumobile">
  <div class="container d-block">
    <div class="menu-wrap d-md-block col-md-12 col-xl-12" style="padding : 15px;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="list-menu d-flex justify-content-between align-items-center">
                <a href="{{ url('/wargadashboard') }}" class="d-flex nav-link {{ active_class(['wargadashboard']) }}">
                    <i class="link-icon" data-feather="home"></i>
                    <p>Beranda</p>
                </a>
            </div>
            <div class="list-menu d-flex justify-content-between align-items-center">
                <a href="{{ url('/mynotifications') }}" class="notifikasi d-flex nav-link {{ active_class(['mynotifications']) }}">
                    <i class="link-icon" data-feather="bell"></i>
                    <p>Notifikasi</p>
                </a>
            </div>
            <div class="list-menu d-flex justify-content-between align-items-center">
                <a href="{{ url('/berita') }}" class="d-flex nav-link {{ active_class(['berita']) }}">
                    <i class="link-icon" data-feather="file-text"></i>
                    <p>Berita</p>
                </a>
            </div>
            <div class="list-menu d-flex justify-content-between align-items-center">
                <a href="{{ url('/myprofile') }}" class="d-flex nav-link {{ active_class(['myprofile']) }}">
                    <i class="link-icon" data-feather="user"></i>
                    <p>Profile</p>
                </a>
            </div>
        </div>
    </div> 
  </div>
</nav>