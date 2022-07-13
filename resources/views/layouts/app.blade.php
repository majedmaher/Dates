<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Dashboard </title>
    <link rel="stylesheet" href="{{asset('css/style-dashboard.css')}}">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
   
   
  @yield('styles')


</head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Dates</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route('dashboard')}}">
          <i class="fas fa-tachometer-alt"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('dashboard')}}">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{route('blog.index')}}">
            <i class="fab fa-blogger"></i>
            <span class="link_name">Blogs</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{route('blog.index')}}">Blogs</a></li>
          <li><a href="{{route('blog.index')}}">All Blogs</a></li>
          <li><a href="{{route('blog.create')}}">Add Blog</a></li>
          <li><a href="{{route('blog.trashed')}}">Trashed Blogs</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{route('product.index')}}">
            <i class="fab fa-product-hunt"></i>
            <span class="link_name">Products</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{route('product.index')}}">Products</a></li>
          <li><a href="{{route('product.index')}}">All Products</a></li>
          <li><a href="{{route('product.create')}}">Add Product</a></li>
          <li><a href="{{route('product.trashed')}}">Trashed Products</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{route('slider.index')}}">
            <i class="fas fa-eye"></i>
            <span class="link_name">Sliders</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{route('slider.index')}}">Sliders</a></li>
          <li><a href="{{route('slider.index')}}">All Sliders</a></li>
          <li><a href="{{route('slider.create')}}">Add Sliders</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{route('subscribe.index')}}">
            <i class="fas fa-user-check"></i>
            <span class="link_name">Subscribe</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{route('subscribe.index')}}">Subscribe</a></li>
          <li><a href="{{route('subscribe.index')}}">All Subscribe</a></li>
          <li><a href="{{route('subscribe.trashed')}}">Trashed Subscribe</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dates</span>
    </div>
    <div>
        @yield('content')
    </div>
  </section>


  @yield('scripts')

  <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js')}}"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

    <script>
      document.addEventListener('contextmenu', event => event.preventDefault());


//         document.onkeydown = function (e) {
//         return false;
// }
    document.onkeydown = function(e) {
      if(event.keyCode == 123) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }
      if(e.ctrlKey == 'U'.charCodeAt(0)) {
        return false;
      }
    }
    
    </script>
</body>
</html>
