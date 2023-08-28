    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"> + Música </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Quienes somos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Servicios</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Marcas
                </a>
                <ul class="dropdown-menu">

                  <?php \Nigromante\Framework\View::include_part( 'nav-productos', $data ) ;?>
                  
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contacto/form">Contacto</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Búsqueda" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"> Búsqueda </button>
            </form>
          </div>
        </div>
    </nav>