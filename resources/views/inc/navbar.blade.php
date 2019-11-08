<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  {{-- Dashboard --}}
  @if (Auth::guard('web')->check())
  <a class="navbar-brand" href="/home">UKMenue Event Planning System</a>      
  @else
  <a class="navbar-brand" href="/admin">UKMenue Event Planning System</a>
  
  @endif
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        {{-- Admin navbar --}}
        @if (Auth::guard('admin')->check())
          <li class="nav-item">
            <a class="nav-link" href="/admin/venues">Venues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/feedback">Feedback</a>
          </li>
        @endif

        {{-- User navbar --}}
        @if (Auth::guard('web')->check())
          <li class="nav-item">
            <a class="nav-link" href="/venues">View Venue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">My Event List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/feedbacks">Insert Feedback</a>
          </li>
        @endif

          {{-- temporarily logout --}}
            <li class="nav-item">
              <a class="nav-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>

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
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
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