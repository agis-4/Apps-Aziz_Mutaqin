<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    APLIKASI DU
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
  <link rel="stylesheet" href="{{url('css/sidebar.css')}}">
  <link rel="stylesheet" href="{{url('css/sidelogo.css')}}">
  <link rel="stylesheet" href="{{url('css/sidew.css')}}">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.min.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
            APP DU
        </a>
      </div>
      <div class="sidebar-wrapper">
          @include('template_1.sidebar')
      </div>    
    </div>

    <div class="main-panel">
      <!-- Navbar -->
      @include('template_1.header')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            @yield('content')  
        </div>
      </div>

      @include('template_1.footer')

    </div>
  </div>
  
  <!--   Folder JS   -->
  <script src="{{url('assets/js/core/jquery.min.js')}}"></script>

 <!--   Core JS Files   -->
 <script src="{{url('assets/js/core/popper.min.js')}}"></script>
<script src="{{url('assets/js/core/bootstrap-material-design.min.js')}}"></script>

<!--   Core JS plugins   -->
<script src="{{url('assets/js/plugins/arrive.min.js')}}"></script>
<script src="{{url('assets/js/plugins/bootstrap-notify.js')}}"></script>
<script src="{{url('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
<script src="{{url('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
<script src="{{url('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<script src="{{url('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<script src="{{url('assets/js/plugins/jquery.tagsinput.js')}}"></script>
<script src="{{url('assets/js/plugins/jquery.validate.min.js')}}"></script>
<script src="{{url('assets/js/plugins/moment.min.js')}}"></script>
<script src="{{url('assets/js/plugins/nouislider.min.js')}}"></script>
<script src="{{url('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{url('assets/js/plugins/sweetalert2.js')}}"></script>
<script src="{{url('assets/js/material-dashboard.js')}}"></script>
<script src="{{url('assets/js/material-dashboard.min.js')}}"></script>

 @yield('js')

<script>
  $(document).ready(function() {
    $().ready(function() {
      $sidebar = $('.sidebar');

      $sidebar_img_container = $sidebar.find('.sidebar-background');

      $full_page = $('.full-page');

      $sidebar_responsive = $('body > .navbar-collapse');

      window_width = $(window).width();

      fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
        if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
          $('.fixed-plugin .dropdown').addClass('open');
        }

      }

      $('.fixed-plugin a').click(function(event) {
        // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        if ($(this).hasClass('switch-trigger')) {
          if (event.stopPropagation) {
            event.stopPropagation();
          } else if (window.event) {
            window.event.cancelBubble = true;
          }
        }
      });

      $('.fixed-plugin .active-color span').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-color', new_color);
        }

        if ($full_page.length != 0) {
          $full_page.attr('filter-color', new_color);
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.attr('data-color', new_color);
        }
      });

      $('.fixed-plugin .background-color .badge').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');

        var new_color = $(this).data('background-color');

        if ($sidebar.length != 0) {
          $sidebar.attr('data-background-color', new_color);
        }
      });

      $('.fixed-plugin .img-holder').click(function() {
        $full_page_background = $('.full-page-background');

        $(this).parent('li').siblings().removeClass('active');
        $(this).parent('li').addClass('active');


        var new_image = $(this).find("img").attr('src');

        if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          $sidebar_img_container.fadeOut('fast', function() {
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $sidebar_img_container.fadeIn('fast');
          });
        }

        if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $full_page_background.fadeOut('fast', function() {
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            $full_page_background.fadeIn('fast');
          });
        }

        if ($('.switch-sidebar-image input:checked').length == 0) {
          var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
          var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
        }

        if ($sidebar_responsive.length != 0) {
          $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
        }
      });

      $('.switch-sidebar-image input').change(function() {
        $full_page_background = $('.full-page-background');

        $input = $(this);

        if ($input.is(':checked')) {
          if ($sidebar_img_container.length != 0) {
            $sidebar_img_container.fadeIn('fast');
            $sidebar.attr('data-image', '#');
          }

          if ($full_page_background.length != 0) {
            $full_page_background.fadeIn('fast');
            $full_page.attr('data-image', '#');
          }

          background_image = true;
        } else {
          if ($sidebar_img_container.length != 0) {
            $sidebar.removeAttr('data-image');
            $sidebar_img_container.fadeOut('fast');
          }

          if ($full_page_background.length != 0) {
            $full_page.removeAttr('data-image', '#');
            $full_page_background.fadeOut('fast');
          }

          background_image = false;
        }
      });

      $('.switch-sidebar-mini input').change(function() {
        $body = $('body');

        $input = $(this);

        if (md.misc.sidebar_mini_active == true) {
          $('body').removeClass('sidebar-mini');
          md.misc.sidebar_mini_active = false;

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

        } else {

          $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

          setTimeout(function() {
            $('body').addClass('sidebar-mini');

            md.misc.sidebar_mini_active = true;
          }, 300);
        }

        // we simulate the window Resize so the charts will get updated in realtime.
        var simulateWindowResize = setInterval(function() {
          window.dispatchEvent(new Event('resize'));
        }, 180);

        // we stop the simulation of Window Resize after the animations are completed
        setTimeout(function() {
          clearInterval(simulateWindowResize);
        }, 1000);

      });
    });
  });
</script>

</body>

</html>
