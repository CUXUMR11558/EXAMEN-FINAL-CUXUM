<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="../../vistas/empleado/index.php">
      <img src="../../src/images/logo.webp" alt="Logo" width="40" height="40" class="me-2">
      <span>ADMINISTRADOR</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="empleadoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle me-2"></i>EMPLEADO
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="empleadoDropdown">
            <li><a class="dropdown-item" href="../../vistas/empleado/index.php"><i class="bi bi-plus-circle me-2"></i>Ingresar Empleado</a></li>
            <li><a class="dropdown-item" href="../../vistas/empleado/buscar.php"><i class="bi bi-search me-2"></i>Buscar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="puestoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-building-add me-2"></i>PUESTO
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="puestoDropdown">
            <li><a class="dropdown-item" href="../../vistas/puesto/index.php"><i class="bi bi-plus-circle me-2"></i>Crear Puesto</a></li>
            <li><a class="dropdown-item" href="../../vistas/puesto/buscar.php"><i class="bi bi-search me-2"></i>Buscar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="areaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-buildings me-2"></i>AREA
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="areaDropdown">
            <li><a class="dropdown-item" href="../../vistas/area/index.php"><i class="bi bi-plus-circle me-2"></i>Crear</a></li>
            <li><a class="dropdown-item" href="../../vistas/area/buscar.php"><i class="bi bi-search me-2"></i>Buscar</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="asignacionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-building-add me-2"></i>ASIGNACION de AREA
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="asignacionDropdown">
            <li><a class="dropdown-item" href="../../vistas/asignacion/index.php"><i class="bi bi-plus-circle me-2"></i>Crear</a></li>
            <li><a class="dropdown-item" href="../../vistas/asignacion/buscar.php"><i class="bi bi-search me-2"></i>Buscar</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../controladores/organizacion/buscar.php">
            <i class="bi bi-bank2 me-2"></i>ORGANIZACION
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

