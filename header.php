<?php 
	$phone_number=get_theme_option('phone-number');
	$fb_link=get_theme_option('facebook');
	$twit_link=get_theme_option('twitter');
	$gplus_link=get_theme_option('gplus');
	
	$html_social_links='';
	
	if ($phone_number) { $html_social_links.='<a href="tel: '. $phone_number .'" target="_blank" class="social-tel"><span class="icon-phone-right"></span> '. $phone_number .'</a>';}
	if ($fb_link) { $html_social_links.='<a href="'. $fb_link .'" target="_blank" class="social-fb"><span class="icon-facebook"></span></a>'; }
	if ($twit_link) { $html_social_links.='<a href="'. $twit_link .'" target="_blank" class="social-twitter"><span class="icon-twitter"></span></a>'; }
	if ($gplus_link) { $html_social_links.='<a href="'. $gplus_link .'" target="_blank" class="social-gplus"><span class="icon-gplus"></span></a>'; }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body <?php body_class(); ?>>

		<div id="wrapper-all">						
						
			<header id="site-header" class="layout">				
				<div id="main-header" class="container">
					<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo home_url(); ?>" class="site-logo">
								<img src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('name'); ?>">
							</a>							
							
							<div class="pull-right text-right">
								<div class="social-links hidden-xs"><?= $html_social_links ?></div>
								
								<div class="visible-sm visible-xs">
									<button type="button" id="main-nav-toggle" class="nav-toggle">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
																	
								<div id="header-nav-wrapper" class="hidden-sm hidden-xs">
									<?php 
										$search_dropdown='
											<li class="item-search">
												<a class="search-button"><span class="icon-search"></span></a>
												<div class="search-dropdown">
													<form action="'. esc_url( home_url( '/' ) ) .'">
														<input type="text" name="s" value="'. get_search_query() .'" placeholder="Search...">
													</form>
												</div>
											</li>
										';
									
										wp_nav_menu(array(
											'theme_location' => 'header',
											'menu_class' => 'nav self-dropdown',
											'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'. $search_dropdown .'</ul>',
										));
									?>
								</div>
							</div>						
							
							<div class="clearfix"></div>
						
							<div class="social-links text-center visible-xs"><?= $html_social_links ?></div>
						</div>			
					</div>
				</div>
			</header>
		
			<div id="wrapper-content">

	
