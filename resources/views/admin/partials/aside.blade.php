<aside>
  <nav class="nav flex-column justify-content-center p-0">
    <ul class="p-0 mt-5">
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.home') }}">
          <i class="fa-solid fa-chart-line me-1"></i><span class="d-none d-md-inline">Dashboard</span></a>
      </li>
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.projects.index') }}">
          <i class="fa-solid fa-newspaper me-1"></i><span class="d-none d-md-inline">Projects</span></a>
      </li>
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.types_project') }}">
          <i class="fa-solid fa-folder-open me-1"></i><span class="d-none d-md-inline">Type/Projects</span></a>
      </li>
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.types.index') }}">
          <i class="fa-solid fa-folder-open me-1"></i><span class="d-none d-md-inline">Types</span></a>
      </li>
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.technologies.index') }}">
          <i class="fa-solid fa-bookmark me-1"></i><span class="d-none d-md-inline">Technologies</span></a>
      </li>
      </li>
      <li class="mb-2"><a class="jt-nav-link" href="{{ route('admin.projects.create') }}">
          <i class="fa-solid fa-plus me-1"></i><span class="d-none d-md-inline">New Project</span></a>

    </ul>
  </nav>
</aside>
