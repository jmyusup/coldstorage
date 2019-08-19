<!-- Header Navigation Right -->
<ul class="nav-header pull-right">
    <li>
        <div class="btn-group">
            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                <img src="{upload_path}users_avatar/<?php echo ($user_avatar == '' ? 'default.jpg':$user_avatar); ?>" alt="Avatar">
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">{user_name}</li>
                <li>
                    <a tabindex="-1" href="{base_url}musers/profile">
                        <i class="si si-user pull-right"></i>Profile
                    </a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">Actions</li>
                <li>
                    <a tabindex="-1" href="{base_url}musers/sign_out">
                        <i class="si si-logout pull-right"></i>Log out
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
<!-- END Header Navigation Right -->

<!-- Header Navigation Left -->
<ul class="nav-header pull-left">
    <li class="hidden-md hidden-lg">
        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
            <i class="fa fa-navicon"></i>
        </button>
    </li>
    <li class="hidden-xs hidden-sm">
        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
            <i class="fa fa-ellipsis-v"></i>
        </button>
    </li>
</ul>
<!-- END Header Navigation Left -->
