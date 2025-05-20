<header class="bg-white border-bottom py-2">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-3">
      <button class="btn btn-link d-lg-none p-0 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="#" class="fw-bold fs-4 text-decoration-none text-dark">Constructor</a>
    </div>
    <nav class="d-none d-lg-flex align-items-center gap-3">
      <a href="#" class="nav-link px-2">Women</a>
      <a href="#" class="nav-link px-2">Men</a>
      <a href="#" class="nav-link px-2">Children</a>
      <a href="#" class="nav-link px-2">Contacts</a>
    </nav>
    <div class="d-flex align-items-center gap-3">
      <form class="d-none d-md-flex" role="search">
        <input class="form-control form-control-sm" type="search" placeholder="Search Goods ..." aria-label="Search">
      </form>
      <a href="#" class="text-dark position-relative"><i class="bi bi-person fs-5"></i><span class="d-none d-md-inline ms-1">Account</span></a>
      <a href="#" class="text-dark position-relative"><i class="bi bi-bag fs-5"></i><span class="d-none d-md-inline ms-1">Bag</span></a>
    </div>
  </div>
</header>
<!-- Offcanvas sidebar for mobile -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="sidebarOffcanvasLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <nav class="nav flex-column gap-2">
      <a href="#" class="nav-link">Women</a>
      <a href="#" class="nav-link">Men</a>
      <a href="#" class="nav-link">Children</a>
      <a href="#" class="nav-link">Contacts</a>
    </nav>
  </div>
</div>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
