<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
                <i class="icon-home"></i>
                <span>
					Dashboard
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{Request::is(['users','users/*']) ? 'active' : ''}}">
                <i class="icon-user"></i>
                <span>
					User Management
                </span>
            </a>

        <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{Request::is(['roles','roles/*']) ? 'active' : ''}}">
                <i class="icon-user-lock"></i>
                <span>
					Role Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('status.index') }}" class="nav-link {{Request::is(['status','status/*']) ? 'active' : ''}}">
                <i class="icon-blocked"></i>
                <span>
					Status Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link {{Request::is(['categories','categories/*']) ? 'active' : ''}}">
                <i class="icon-list"></i>
                <span>
					Category Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('genres.index') }}" class="nav-link {{Request::is(['genres','genres/*']) ? 'active' : ''}}">
                <i class="icon-library2"></i>
                <span>
					Genre Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('tags.index') }}" class="nav-link {{Request::is(['tags','tags/*']) ? 'active' : ''}}">
                <i class="icon-price-tag2"></i>
                <span>
					Tag Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('movies.index') }}" class="nav-link {{Request::is(['movies','movies/*']) ? 'active' : ''}}">
                <i class="icon-play"></i>
                <span>
					Movie Management
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('banners.index') }}" class="nav-link {{Request::is(['banners','banners/*']) ? 'active' : ''}}">
                <i class="icon-backward"></i>
                <span>
					Banner Management
                </span>
            </a>
        </li>
    </ul>
</div>
