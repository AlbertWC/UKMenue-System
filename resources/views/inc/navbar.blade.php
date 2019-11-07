<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  {{-- Dashboard --}}
  <a class="navbar-brand" href="/home">UKMenue Event Planning System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        {{-- Admin navbar --}}
        @if (Auth::guard('admin')->check())
          <li class="nav-item">
            <a class="nav-link" href="/adminvenues">Venues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/adminfeedback">Feedback</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">Event</a>
          </li>
        @endif

        {{-- User navbar --}}
        @if (Auth::guard('web')->check())
          <li class="nav-item">
            <a class="nav-link" href="/venues">View Venue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">Book Venue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/feedbacks">Insert Feedback</a>
          </li>
        @endif

        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else

              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
          </li>
        </ul>
    </div>
</nav>