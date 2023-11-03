<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo get_bloginfo(); ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() . '/assets/favicon.ico'; ?>" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo get_stylesheet_directory_uri() . '/css/styles.css'; ?>" rel="stylesheet" />
</head>

<body id="page-top">
    <?php get_template_part('template-parts/navbar'); ?>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/avataaars.svg'; ?>" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0"><?php echo get_bloginfo(); ?></h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Graphic Designer - Web Designer and Developer</p>
        </div>
    </header>