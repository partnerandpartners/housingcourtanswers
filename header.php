<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php esc_attr(bloginfo('charset')) ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
		<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/img/favicon-152.png">
		<!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicon-144.png">

		<!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
		<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/img/favicon-120.png">

		<!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicon-114.png">

		<!-- For first- and second-generation iPad: -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicon-72.png">

		<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/favicon-57.png">

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico"/>

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
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm visible-xs-*">Housing Court Answers</span></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<nav id="hca-navbar" class="collapse navbar-collapse navbar-right">
						<?php
							if( has_nav_menu( 'main' ) ) {
								wp_nav_menu( array(
									'theme_location' => 'main',
									'container' => false,
									'depth' => -1,
									'menu_class' => 'nav navbar-nav',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								) );
							}
						?>
					</nav><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</header>
			<!-- search page navigation -->
    <?php } else { ?>
			<!-- sub page navigation -->
			<?php if (is_category('For Tenants')) {?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } elseif (is_category('For Landlords')) { ?>
				<header class="not-home navbar navbar-fixed-top" id="top" role="navigation">
			<?php } else { ?>
				<header class="not-home navbar navbar-fixed-top bg" id="top" role="navigation">
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
						<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/hcalogo.png" alt="" class="img-responsive"><span class="logo hidden-sm visible-xs-*">Housing Court Answers</span></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<nav id="hca-navbar" class="collapse navbar-collapse navbar-right">
						<?php
							if( has_nav_menu( 'main' ) ) {
								wp_nav_menu( array(
									'theme_location' => 'main',
									'container' => false,
									'depth' => -1,
									'menu_class' => 'nav navbar-nav',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
								) );
							}
						?>
					</nav><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</header>
		<?php } ?>
		<section class="site-content" id="site-content">
