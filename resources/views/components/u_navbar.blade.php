<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Ecommerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              @if(Auth::check())
                <li class="nav-item">
                  <a class="nav-link active text-danger" aria-current="page" href="/signout">LogOut</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link active text-success" aria-current="page" href="/signin">Login</a>
                </li>
              @endif
              <li class="nav-item">
                <a class="nav-link active" href="/managecart">Manage Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/vieworders">Orders</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</div>