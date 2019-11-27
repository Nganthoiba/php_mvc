<!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark custom-nav-color fixed-top">
            <?php 
                if(Logins::isAuthenticated()){
            ?>
            <span class="navbar-toggler-icon" id="sidebarCollapse"></span>
            <?php } ?>
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#"><?= Config::get('app_name') ?></a>
            </div>
            <?php 
                if(Logins::isAuthenticated()){
            ?>
                <ul class="navbar-nav">
                    
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        
                        <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown" style="min-width: 250px;text-align: right">
                            <span style="font-size: 10pt;color:#FFFFFF;">
                                <?php 
                                if(Logins::isAuthenticated()){
                                    $user_info = $_SESSION['user_info'];
                                    echo $user_info['full_name'];
                                } 
                                ?>
                            </span>
                            <span class="fa fa-angle-down"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= Config::get('host')?>/account/manageAccount">Manage Account</a>
                            <a class="dropdown-item" href="#">Setting</a>
                            <a class="dropdown-item" href="<?= Config::get('host')?>/account/logout">Log out</a>
                        </div>
                    </li>
                </ul>
                <!--
                <a id="navbar-static-logout" class="btn btn-default btn-rounded btn-sm waves-effect waves-light" 
                   href="<?= Config::get('host')?>/account/logout">Log out
                </a>
                -->
            <?php
                }
                else{
            ?>
                <a id="navbar-static-login" class="btn btn-default btn-rounded btn-sm waves-effect waves-light" 
                   href="<?= Config::get('host')?>/account/login">Log In
                </a>
            <?php
                } 
            ?>
            <!-- Links -->
        </nav>
        <!--/.Navbar-->


