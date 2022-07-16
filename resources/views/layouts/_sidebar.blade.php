<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == '' ? '' : 'collapsed' }}" href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'registration' ? '' : 'collapsed' }}" href="{{ url('/registration') }}">
          <i class="bi bi-person"></i>
          <span>Registration</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'performance' ? '' : 'collapsed' }}" href="{{ url('/performance') }}">
          <i class="bi bi-gem"></i>
          <span>Performance</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'survey' ? '' : 'collapsed' }}" href="{{ url('/survey') }}">
          <i class="bi bi-journal-text"></i>
          <span>Survey Form</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->