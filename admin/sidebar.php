<style>
    #admin-img {
        position: relative;
    }

    #admin-img::before {
        content: '';
        height: 10px;
        width: 10px;
        position: absolute;
        background: #0de33e;
        border-radius: 50%;
        bottom: 0;
        right: 0;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php
    $query = $mysqli->query("SELECT admin_img, admin_name FROM site_settings ORDER BY id ASC LIMIT 1");
    if ($query) {
        $res = $query->fetch_assoc();
        $theAdminName = $res["admin_name"] ?? '';
        $theAdminImg = $res["admin_img"] ?? '';
    }
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" id="admin-img">
                <img <?php
                        if ($theAdminImg == "" || $theAdminImg == null) {
                            echo 'src="assets/images/default-user.jpg"';
                        } else {
                            if (file_exists('assets/images/admin-details/' . $theAdminImg)) {
                                echo 'src="assets/images/admin-details/' . $theAdminImg . '"';
                            } else {
                                echo 'src="assets/images/default-user.jpg"';
                            }
                        }
                        ?> class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $theAdminName ?? 'Testing Web'; ?> (Admin)</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <?php
        // get the pagename   
        $url = $_SERVER['REQUEST_URI'];
        $pagename = explode('/', $url);
        // print_r($pagename);
        ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="index.php" class="nav-link 
                    <?php
                    if ($pagename[3] == 'index.php' || $pagename[3] == '') {
                        echo 'active';
                    }
                    ?>
                    ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="services.php" class="nav-link 
                    <?php
                    if ($pagename[3] == 'services.php' || explode('?', $pagename[3])[0] == 'add-edit-services.php') {
                        echo 'active';
                    }
                    ?>
                    ">
                        <i class="nav-icon fas fa-couch"></i>
                        <p>
                            Our Services
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="projects.php" class="nav-link 
                    <?php
                    if ($pagename[3] == 'projects.php' || explode('?', $pagename[3])[0] == 'add-edit-projects.php') {
                        echo 'active';
                    }
                    ?>
                    ">
                        <i class="nav-icon fas fa-hammer"></i>
                        <p>
                            Projects
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="teams.php" class="nav-link 
                    <?php
                    if ($pagename[3] == 'teams.php' || explode('?', $pagename[3])[0] == 'add-edit-teams.php') {
                        echo 'active';
                    }
                    ?>
                    ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Teams
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="testimonials.php" class="nav-link 
                    <?php
                    if ($pagename[3] == 'testimonials.php' || explode('?', $pagename[3])[0] == 'add-edit-testimonials.php') {
                        echo 'active';
                    }
                    ?>">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="site-settings.php" class="nav-link
                    <?php
                    if ($pagename[3] == 'site-settings.php') {
                        echo 'active';
                    }
                    ?>
                    ">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Site Settings
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>