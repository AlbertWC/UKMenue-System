<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="">UKMenue Event Planning System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              {{-- <span class="nav-link" href="#"><span class="sr-only">(current)</span></span> --}}
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/venue">Venue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/venues/create">Create Venue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/events">Event</a>
            </li>
  
              
              <li class="nav-item dropdown">
                {{-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown link
                </a> --}}
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="">Login</a>
                <a href="">Register</a>
              </li>
            </ul>
        </div>
      </nav>