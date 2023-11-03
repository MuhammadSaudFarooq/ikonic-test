<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <?php
        $web_logo = get_option('web_logo');
        if (isset($web_logo) && $web_logo != site_url('/wp-content/themes/ikonic/assets/logo-placeholder.jpg')) {
            echo "<a href='".site_url()."'><img src='" . $web_logo . "' class='header_logo' /></a>";
        } else {
            echo '<a class="navbar-brand" href="'.site_url().'">' . get_bloginfo() . '</a>';
        }
        ?>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <?php
                $primary_menu = wp_get_nav_menu_items(2);
                foreach ($primary_menu as $menu_key => $menu_value) {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded' href='" . $menu_value->url . "'>" . $menu_value->post_title . "</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>