<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ asset('favicon/pawprint.png') }}"
            alt="User Image" width="20%;">
        <div>
            <p class="app-sidebar__user-name">{{ Auth::guard('admin')->user()->name }}</p>
            <p class="app-sidebar__user-designation">{{ Auth::guard('admin')->user()->email }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                href="{{ route('admin.home') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.veterinarians.*') ? 'active' : '' }}"
                href="{{ route('admin.veterinarians.list') }}">
                <i class="app-menu__icon fa fa-user-md"></i>
                <span class="app-menu__label">Doctor Management</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"
                href="{{ route('admin.gallery.list') }}">
                <i class="app-menu__icon fa fa-image"></i>
                <span class="app-menu__label">Gallery Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}"
                href="{{ route('admin.blog.list') }}">
                <i class="app-menu__icon fab fa-blogger-b"></i>
                <span class="app-menu__label">Blog Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.plan-manage.*') ? 'active' : '' }}" href="{{ route('admin.plan-manage.list') }}">
                <i class="app-menu__icon fas fa-plane"></i>
                <span class="app-menu__label">Plan Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.pet*') ? 'active' : '' }}" href="{{ route('admin.pet.list') }}">
                <i class="fa fa-paw mr-2" aria-hidden="true"></i>
                <span class="app-menu__label">Pets Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.addsServices.*') ? 'active' : '' }}" href="{{ route('admin.addsServices.list') }}">
                <i class="fa-solid fa-gear mr-2"></i>
                <span class="app-menu__label">Services</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('admin.order-details*') ? 'active' : '' }}" href="{{ route('admin.order-details') }}">
                <i class="fa fa-clipboard mr-2" aria-hidden="true"></i>
                <span class="app-menu__label">Order Details</span>
            </a>
        </li>

        {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">UI Elements</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>
                        Bootstrap Elements</a></li>
                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank"
                        rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="charts.html"><i class="app-menu__icon fa fa-pie-chart"></i><span
                    class="app-menu__label">Charts</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form
                        Components</a></li>
                <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom
                        Components</a></li>
                <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form
                        Samples</a></li>
                <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form
                        Notifications</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic
                        Tables</a></li>
                <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data
                        Tables</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a>
                </li>
                <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a>
                </li>
                <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen
                        Page</a></li>
                <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a>
                </li>
                <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice
                        Page</a></li>
                <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar
                        Page</a></li>
                <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a>
                </li>
                <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a>
                </li>
            </ul>
        </li> --}}
    </ul>
</aside>
