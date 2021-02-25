<div class="sidebar">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                CT
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="./dashboard.html">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="./icons.html">
                    <i class="tim-icons icon-atom"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li>
                <a href="./map.html">
                    <i class="tim-icons icon-pin"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active ">
                <a href="./user.html">
                    <i class="tim-icons icon-single-02"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li>
                <a href="./tables.html">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li>
                <a href="./typography.html">
                    <i class="tim-icons icon-align-center"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li>
                <a href="./rtl.html">
                    <i class="tim-icons icon-world"></i>
                    <p>RTL Support</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent   ">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo">User Profile</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto ">
                    <div class="search-bar input-group">
                        <!-- <input type="text" class="form-control" placeholder="Search...">
              <div class="input-group-addon"><i class="tim-icons icon-zoom-split"></i></div> -->
                        <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i></button>
                        <!-- You can choose types of search input -->
                    </div>
                    <!-- <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="tim-icons icon-simple-remove"></i>
                </button>
              </div>

              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div> -->
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="notification d-none d-lg-block d-xl-block"></div>
                            <i class="tim-icons icon-sound-wave"></i>
                            <p class="d-lg-none">
                                New Notifications
                            </p>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                            </li>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">You have 5 more tasks</a>
                            </li>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Your friend Michael is in town</a>
                            </li>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Another notification</a>
                            </li>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Another one</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img src="../assets/img/anime3.png">
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                Log out
                            </p>
                        </a>
                        <ul class="dropdown-menu dropdown-navbar">
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Profile</a>
                            </li>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Settings</a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Log out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="separator d-lg-none"></li>
                </ul>
            </div>
        </div>
    </nav>