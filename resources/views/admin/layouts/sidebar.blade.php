<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="{{ asset('admin/img/logo/logo2.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Category</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Category</h6>
          <a class="collapse-item" href="{{ route('category.index') }}">View</a>
          <a class="collapse-item" href="{{ route('category.create') }}">Create</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>SubCategory</span>
      </a>
      <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">SubCategory</h6>
          <a class="collapse-item" href="{{ route('subcategory.index') }}">View</a>
          <a class="collapse-item" href="{{ route('subcategory.create') }}">Create</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
        aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="far fa-fw fa-window-maximize"></i>
        <span>Product</span>
      </a>
      <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Product</h6>
          <a class="collapse-item" href="{{ route('product.index') }}">View</a>
          <a class="collapse-item" href="{{ route('product.create') }}">Create</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
        aria-controls="collapseForm">
        <i class="fab fa-fw fa-wpforms"></i>
        <span>Sliders</span>
      </a>
      <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Sliders</h6>
          <a class="collapse-item" href="{{ route('slider.index') }}">View</a>
          <a class="collapse-item" href="{{ route('slider.create') }}">Create</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>