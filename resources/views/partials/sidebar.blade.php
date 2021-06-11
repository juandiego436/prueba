<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        @auth('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
              <span data-feather="file"></span>
              Usuarios
            </a>
          </li>
        @endauth
        @auth('user')
        <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Correos
            </a>
          </li>
        @endauth
        @auth('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logs') }}">
              <span data-feather="shopping-cart"></span>
              Logs
            </a>
          </li>
        @endauth
      </ul>
  </nav>
