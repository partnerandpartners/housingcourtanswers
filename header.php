<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php esc_attr(bloginfo('charset')) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ((is_front_page())) { ?>
			<title><?php bloginfo( 'name' ); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Housing Court Answers | Fighting for Justice"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-img.png"/>
			<meta property="og:description" content="We answer questions about New York City’s Housing Court, housing laws and regulations."/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_category('For Tenants')) {?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Housing Court Answers <?php wp_title('|', true, 'left'); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-tenants.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags(category_description()); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_category('For Landlords')) {?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Housing Court Answers <?php wp_title('|', true, 'left'); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-landlords.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags(category_description()); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_category('For Advocates')) {?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Housing Court Answers <?php wp_title('|', true, 'left'); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-advocates.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags(category_description()); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_page('Glossary')) {
			global $post;
			?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="<?php wp_title(''); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-glossary.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags($post->post_content); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_tag()) {?>
			<title>Glossary <?php wp_title('|'); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Glossary | <?php echo single_tag_title( '', false ); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-glossary.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags(tag_description()); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_search()) {?>
			<title>Search results for "<?php echo get_search_query(); ?>"</title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="Search results for '<?php echo get_search_query(); ?>'"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-img.png"/>
			<meta property="og:description" content="Search Housing Court Answers for housing court topics, terms and tips."/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } elseif (is_category()) { ?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="<?php wp_title(''); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-img.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags(category_description()); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } else {
			global $post;
			?>
			<title><?php wp_title(''); ?></title>
			<meta property="og:site_name" content="Housing Court Answers"/>
			<meta property="og:title" content="<?php wp_title(''); ?>"/>
			<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/housing-share-img.png"/>
			<meta property="og:description" content="<?php echo wp_strip_all_tags($post->post_content); ?>"/>
			<meta name="twitter:card" content="summary_large_image">
		<?php } ?>

		<link rel="apple-touch-icon" sizes="180x180" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/apple-touch-icon.png#v1">
		<link rel="icon" type="image/png" sizes="32x32" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/favicon-32x32.png#v1">
		<link rel="icon" type="image/png" sizes="16x16" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/favicon-16x16.png#v1">
		<link rel="manifest" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/manifest.json#v1">
		<link rel="mask-icon" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/safari-pinned-tab.svg#v1" color="#000000">
		<link rel="shortcut icon" href="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/favicon.ico#v1">
		<meta name="msapplication-config" content="http://housingcourtanswers.org/wp-content/themes/housingcourtanswers/img/browserconfig.xml#v1">
		<meta name="theme-color" content="#ffffff">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<?php wp_head(); ?>
	</head>
	<body data-spy="scroll" data-target="#scroll-nav" data-offset="70" <?php body_class('no-js'); ?>>
	  <?php if ((is_front_page())) { ?>
			<header class="navbar navbar-fixed-top" id="top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hca-navbar" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm">Housing Court Answers</span></a>
					</div>
					<?php
					 wp_nav_menu( array(
							 'menu'              => 'Main Menu',
							 'theme_location'    => 'main',
							 'depth'             => 2,
							 'container'         => 'div',
							 'container_class'   => 'collapse navbar-collapse navbar-right',
			 			 	 'container_id'      => 'hca-navbar',
							 'menu_class'        => 'nav navbar-nav',
							 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							 'walker'            => new wp_bootstrap_navwalker())
					 );
			 ?>
				</div><!-- /.container -->
			</header>
			<!-- search page navigation -->
    <?php } else { ?>
			<!-- sub page navigation -->
			<?php if (is_category('For Tenants')) {?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } elseif (is_category('For Landlords')) { ?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } elseif (is_category('For Advocates')) { ?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } else { ?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } ?>
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#hca-navbar" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm">Housing Court Answers</span></a>
					</div>
					<?php
					 wp_nav_menu( array(
							 'menu'              => 'Main Menu',
							 'theme_location'    => 'main',
							 'depth'             => 2,
							 'container'         => 'div',
							 'container_class'   => 'collapse navbar-collapse navbar-right',
			 			 	 'container_id'      => 'hca-navbar',
							 'menu_class'        => 'nav navbar-nav',
							 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							 'walker'            => new wp_bootstrap_navwalker())
					 );
			 ?>
				</div><!-- /.container -->
			</header>
		<?php } ?>
		<section class="site-content" id="site-content">
			<div id="search-box-wrapper">
				<div class="container">
					<div class="row">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
