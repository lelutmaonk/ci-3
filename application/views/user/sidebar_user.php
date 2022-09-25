<body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
             
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?php echo $user['name']?> </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">My Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('auth/logout')?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- QUERY MENU -->
                            <?php
                                $roleId = $this->session->userdata('role_id');
                                $queryMenu = "SELECT `t_user_menu`.`id`, `menu`
                                                FROM `t_user_menu` JOIN `t_user_access_menu`
                                                ON `t_user_menu`.`id` = `t_user_access_menu`.`menu_id`
                                                WHERE `t_user_access_menu`.`role_id` = $roleId
                                                ORDER BY `t_user_access_menu`.`menu_id` ASC";
                                $menu = $this->db->query($queryMenu)->result_array();
                            ?>

                            <!-- Looping Menu -->
                            <?php foreach($menu as $m) : ?>
                                <div class="sb-sidenav-menu-heading">
                                    <?php echo $m['menu']?>
                                </div>

                                <!-- query sub menu -->
                                <?php
                                    $menuId = $m['id'];
                                    $querySubMenu = "SELECT * FROM `t_user_sub_menu`
                                                        WHERE `menu_id` = $menuId
                                                        AND `is_active` = 1";
                                    $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>

                                <!-- looping sub menu -->
                                <?php foreach($subMenu as $sm) : ?>
                                    <a class="nav-link" href="<?php echo base_url($sm['url'])?>">
                                        <div class="sb-nav-link-icon"><i class="<?php echo $sm['icon']?>"></i></div>
                                        <?php echo $sm['title']?>
                                    </a>
                                <?php endforeach;?>

                            <?php endforeach; ?>

                            <a class="nav-link" href="<?php echo base_url('auth/logout')?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                                Logout
                            </a>

                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">