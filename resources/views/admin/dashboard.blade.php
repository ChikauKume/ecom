@include('admin.layouts.header')
  <div id="wrapper">
    @include('admin.layouts.sidebar')
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('admin.layouts.navbar')
        <!-- Topbar -->
        <!-- Container Fluid-->
        @include('admin.layouts.container')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
        @include('admin.layouts.footer')
      <!-- Footer -->
