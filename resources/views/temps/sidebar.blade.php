<div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="../assets/img/faces/avatar.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Tania Andrew
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="../examples/dashboard.html">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">image</i>
              <p> Master Data
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item {{$page == 'PHOTO'? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('index_photo') }}">
                    <span class="sidebar-mini"> PL </span>
                    <span class="sidebar-normal"> Photo List </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/pages/rtl.html">
                    <span class="sidebar-mini"> LP </span>
                    <span class="sidebar-normal"> List Pengeluaran </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/pages/timeline.html">
                    <span class="sidebar-mini"> LUP </span>
                    <span class="sidebar-normal"> List Undangan Pribadi </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/pages/login.html">
                    <span class="sidebar-mini"> LUK </span>
                    <span class="sidebar-normal"> List Undangan Keluarga </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../examples/pages/register.html">
                    <span class="sidebar-mini"> MD </span>
                    <span class="sidebar-normal"> Master Data </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">logout</i>
              <p> Logout </p>
            </a>
          </li>
        </ul>
      </div>