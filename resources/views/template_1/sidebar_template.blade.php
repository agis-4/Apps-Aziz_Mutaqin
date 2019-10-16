<div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{$page == 'DASHBOARD' ? 'active' : ''}} ">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">dashboard</i>
              <p> Master Data
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item {{$page == 'USER'? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('index_us') }}">
                    <span class="sidebar-mini"> LU </span>
                    <span class="sidebar-normal"> List User </span>
                  </a>
                </li>
                <li class="nav-item {{$page == 'UNDANGAN PRIBADI' ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('index_up') }}">
                    <span class="sidebar-mini"> LUP </span>
                    <span class="sidebar-normal"> List Undangan Pribadi </span>
                  </a>
                </li>
                <li class="nav-item {{$page == 'UNDANGAN KELUARGA' ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('index_uk') }}">
                    <span class="sidebar-mini"> LUK </span>
                    <span class="sidebar-normal"> List Undangan Keluarga </span>
                  </a>
                </li>
                <li class="nav-item {{$page == 'Master Data || Data Pengeluaran' ? 'active' : ''}}">
                  <a class="nav-link" href="{{ route('index_pe') }}">
                    <span class="sidebar-mini"> LUK </span>
                    <span class="sidebar-normal"> List Pengeluaran </span>
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
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">
              <i class="material-icons">exit_to_app</i>
              <p> Logout </p>
            </a>
          </li>
        </ul>
      </div>