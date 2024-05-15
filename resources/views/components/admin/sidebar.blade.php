<div>
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ $setting->site_name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">{{ $alias }}</a>
        </div>
        <ul class="sidebar-menu">
            @can('Dashboard')
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                        <span>Dashboard</span></a>
                </li>
            @endcan
            <li class="menu-header">Artikel</li>
            @can('Kategori View')
                <li>
                    <a class="nav-link" href="{{ route('admin.post-categories.index') }}"><i class="fas fa-list-alt"></i>
                        <span>Kategori</span></a>
                </li>
            @endcan
            @can('Tag View')
                <li>
                    <a class="nav-link" href="{{ route('admin.post-tags.index') }}"><i class="fas fa-tags"></i>
                        <span>Tag</span></a>
                </li>
            @endcan
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fw fa-newspaper"></i>
                    <span>Artikel</span></a>
                <ul class="dropdown-menu">
                    @can('Artikel Create')
                        <li><a href="{{ route('admin.posts.create') }}">Tambah Data</a></li>
                    @endcan
                    @can('Artikel View')
                        <li><a href="{{ route('admin.posts.index') }}">Lihat Data</a></li>
                    @endcan
                </ul>
            </li>
            <li class="menu-header">MASTER</li>
            @can('User View')
                <li>
                    <a class="nav-link" href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i>
                        <span>User</span></a>
                </li>
            @endcan
            @can('Filemanager View')
                <li>
                    <a class="nav-link" target="_blank" href="{{ url('admin/filemanager') }}"><i class="fas fa-folder"></i>
                        <span>File Manager</span></a>
                </li>
            @endcan
            @can('Role View')
                <li>
                    <a class="nav-link" href="{{ route('admin.roles.index') }}"><i class="fas fa-folder"></i>
                        <span>Role</span></a>
                </li>
            @endcan
            @can('Permission View')
                <li>
                    <a class="nav-link" href="{{ route('admin.permissions.index') }}"><i class="fas fa-folder"></i>
                        <span>Hak Akses</span></a>
                </li>
            @endcan
            @can('Setting View')
                <li>
                    <a class="nav-link" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i>
                        <span>Pengaturan Web</span></a>
                </li>
            @endcan
        </ul>

    </aside>
</div>
