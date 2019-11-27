<link href="<?= Config::get('host')?>/root/MDB/css/side_navbar.css" rel="stylesheet" type="text/css"/>
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <p style="color:#000">Welcome</p>
                </div>

                <ul class="list-unstyled components">
                    <?php 
                    //Applicant Menu
                    if(strtolower(Logins::getRoleName()) == "applicant"){
                    ?>
                    <li class="<?= isLinkActive('application/index') ?><?= isLinkActive('application') ?><?= isLinkActive('') ?>">
                        <a href="<?=Config::get('host')?>/application/index">
                            <i class="fa fa-home"></i>
                            Home
                        </a>
                    </li>
                    <li class="<?= isLinkActive('application/apply') ?>">
                        <a href="<?=Config::get('host')?>/application/apply"><i class="fa fa-edit"></i> Apply</a>
                    </li>
                    <!--
                    <li class="<?= isLinkActive('application/status') ?>">
                        <a href="<?=Config::get('host')?>/application/status"><i class="fa fa-clone"></i> Check Status</a>
                    </li>
                    -->
                    <li class="<?= isLinkActive('application/viewApplications') ?>">
                        <a href="<?=Config::get('host')?>/application/viewApplications"><i class="fa fa-desktop"></i> View Applications</a>
                    </li>
                    <?php 
                    }
                    //Admin Menu
                    else if(strtolower(Logins::getRoleName()) == "admin"){
                    ?>
                    <li class="<?= isLinkActive('user/viewUsers') ?>">
                        <a href="<?=Config::get('host')?>/user/viewUsers"><i class="fa fa-edit"></i> 
                            View Users</a>
                    </li>
                    <li class="<?= isLinkActive('user/addUsers') ?>">
                        <a href="<?=Config::get('host')?>/user/addUsers"><i class="fa fa-plus-circle"></i> Add User</a>
                    </li>
                    <li class="<?= isLinkActive('role/addRoles') ?>">
                        <a href="<?=Config::get('host')?>/role/addRoles"><i class="fa fa-plus-circle"></i> Add Roles</a>
                    </li>
                    <li class="<?= isLinkActive('role/processRoleMapping') ?>">
                        <a href="<?=Config::get('host')?>/role/processRoleMapping"><i class="fa fa-bullhorn"></i> Process Roles Mapping</a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li class="<?= isLinkActive('default/index') ?><?= isLinkActive('default') ?><?= isLinkActive('') ?>" >
                        <a href="<?=Config::get('host')?>/default/index">Home</a>
                    </li>
                    <li class="<?= isLinkActive('default/contact')?>" >
                        <a href="<?=Config::get('host')?>/default/contact">Contact</a>
                    </li>
                    <li class="<?= isLinkActive('default/about') ?>" >
                        <a href="<?=Config::get('host')?>/default/about">About</a>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>
            </nav>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>