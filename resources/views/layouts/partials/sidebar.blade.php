<div class="navbar-default sidebar hidden-print" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <a class="navbar-brand text-center" title="Home | {{ Option::get('app_tagline', 'Laravel app description') }}" href="{{ route('home') }}">
            {!! Html::image(url('assets/imgs/logo.png'),'Logo ' . Option::get('app_name','Laravel'), ['class' => 'sidebar-logo']) !!}
        </a>
        <ul class="nav" id="side-menu">
            <li>{!! html_link_to_route('home', 'Home', [], ['icon' => 'home']) !!}</li>
            @can('manage_projects')
            <li>
                {!! html_link_to_route('projects.index', trans('project.projects') . ' <span class="fa arrow"></span>', [], ['icon' => 'table']) !!}
                <ul class="nav nav-second-level in">
                    @foreach(getProjectStatusesList() as $key => $status)
                    <li>
                        <a href="{{ route('projects.index', ['status' => $key]) }}">
                            {{ $status }}
                            <span class="badge pull-right">{{ in_array($key, array_keys($projectCounts)) ? $projectCounts[$key] : 0 }}</span>
                        </a>
                    </li>
                    @endforeach
                    <li>{!! html_link_to_route('projects.index', 'Semua Project') !!}</li>
                </ul>
            </li>
            @endcan
            @can('manage_payments')
            <li>
                {!! html_link_to_route('payments.index', trans('payment.payments') . ' <span class="fa arrow"></span>', [], ['icon' => 'money']) !!}
                <ul class="nav nav-second-level">
                    <li>{!! link_to_route('payments.index', trans('payment.payments')) !!}</li>
                </ul>
            </li>
            @endcan
            @can('manage_users')
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i> {{ trans('user.users') }} <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('users.index') }}"><i class="fa fa-users fa-fw"></i> {{ trans('user.users') }}</a></li>
                    @can('manage_role_permissions')
                    <li><a href="{{ route('roles.index') }}"><i class="fa fa-gears fa-fw"></i> {{ trans('role.roles') }}</a></li>
                    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-lock fa-fw"></i> {{ trans('permission.permissions') }}</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('manage_options')
            <li>
                <a href="{{ route('options.index') }}"><i class="fa fa-gears fa-fw"></i> Options <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @can('manage_options')
                    <li><a href="{{ route('options.index') }}"><i class="fa fa-gears fa-fw"></i> Options</a></li>
                    @endcan
                    @can('manage_backups')
                    <li><a href="{{ route('backups.index') }}"><i class="fa fa-refresh fa-fw"></i> Backup/Restore DB</a></li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li><a href="{{ route('auth.change-password') }}"><i class="fa fa-lock fa-fw"></i> {{ trans('auth.change_password') }}</a></li>
            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out fa-fw"></i> {{ trans('auth.logout') }}</a></li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->

