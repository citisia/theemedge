<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-users"></i> User Management</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-file"></i> Enquiries <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('degree.index') }}"><i class="fa fa-fw fa-graduation-cap"></i> Degree</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-graduation-cap"></i> Diploma</a>
                    </li>
                </ul>
            </li>
            <!-- Admission Menus -->
            <li>
                <a href="#"><i class="fa fa-fw fa-users"></i> Admissions </a>
            </li>
            <!-- Fees Management -->
            <li>
                <a href="#"><i class="fa fa-fw fa-rupee"></i> Fees Management <span class="fa fa-fw arrow"></span></a>
            </li>
            <!-- Reports Menus -->
            <li>
                <a href="#"><i class="fa fa-fw fa-file-text-o"></i> Reports <i class="fa fa-fw arrow"></i></a>
            </li>
            <!-- Admin Settings -->
            <li>
                <a href="#"><i class="fa fa-fw fa-gears"></i> Settings <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-book"></i> Courses</a>
                        <a href="{{route('department.index')}}">
                            <i class="fa fa-fw fa-dedent"></i> Departments</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>