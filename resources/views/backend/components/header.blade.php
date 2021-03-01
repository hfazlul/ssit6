<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>

        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                        <span class="msg-count">8</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">8 New</h6>
                                <p class="msg-header-subtitle">Application Notifications</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="media align-items-center">
                                    <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-right">14 Sec
                                                ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                                <p class="designattion mb-0">{{ auth()->user()->email }}</p>
                            </div>
                            <img src="{{asset('/')}}assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">

                        <a  href="{{ route('staff.logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="bx bx-power-off"></i><span>Logout</span>
                        </a>

                      <form id="logout-form" action="{{ route('staff.logout') }}" method="POST" class="d-none">
                        @csrf
                       </form>

                    {{--  <form action="{{ route('staff.logout') }}" method="post">
                        @csrf

                        <a class="dropdown-item" href="{{ route('staff.logout') }}"

                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                                    <i class="bx bx-power-off"></i><span>Logout</span>
                         </a>
                    </form>  --}}

                    </div>
                </li>

            </ul>
        </div>
    </nav>
</header>
