<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if lte IE 7]>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/components/font-awesome/css/font-awesome-ie7.min.css" media="screen" type="text/css" />
	<![endif]-->
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> data-spy="scroll" data-target=".secondary-nav" data-offset="40">

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

	<?php get_template_part('templates/header'); ?>

	<div class="wrap container" role="document">
	    <div class="content row">
      
      