<?php 
	add_action("admin_init", "theme_options_init");
	add_action("admin_menu", "theme_options_add_page");

	function theme_options_init() {
	  register_setting("theme_options", "the_theme_options", "theme_options_validate");
	}

	function theme_options_add_page() {
		add_theme_page("Theme Options", "Theme Options", "edit_theme_options", "theme_options", "theme_options_do_page");
	}
	
	function theme_options_validate( $input ) {return $input;}
	
	function inputName($name) {return "the_theme_options[". $name ."]";}
	
	function theme_options_do_page() { ?>
		<div id="theme-options">
			
			<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'sampletheme' ) . "</h2>"; ?>
			
			<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
				<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sampletheme' ); ?></strong></p></div>
			<?php endif; ?>
			
			<form method="post" action="options.php">
				<?php
					settings_fields("theme_options");
					
					$theme_option=get_option("the_theme_options");
					
					$inputName="the_theme_options";
					
					$tabs=array(
						"basic" => "Basic",
						"social" => "Social",
					);
					
					$currentTab=(isset($_GET["tab"]))?$_GET["tab"]:"basic";
				?>
				
				<h2 class="nav-tab-wrapper">
					<?php foreach($tabs as $tab => $name) { ?>
						<a class="nav-tab <?= ( $currentTab == $tab ) ? ' nav-tab-active' : '' ?>" href='?page=theme_options&tab=<?= $tab ?>'><?= $name ?></a>
					<?php } ?>
				</h2>
					
				<div id="basic" class="theme-opt-part">
					<p>
						<label for="<?= inputName('portfolio_description') ?>">Portfolio Description</label>
						<textarea name="<?= inputName('portfolio_description') ?>"><?= $theme_option['portfolio_description'] ?></textarea>
					</p>
					
					<p>
						<label for="<?= inputName('copyright') ?>">Copyright</label>
						<textarea name="<?= inputName('copyright') ?>"><?= $theme_option['copyright'] ?></textarea>
					</p>
				</div>
				
				<div id="social" class="theme-opt-part">
					<p>
						<label for="<?= inputName('phone-number') ?>">Phone Number</label>
						<input type="tel" name="<?= inputName('phone-number') ?>" value="<?= $theme_option['phone-number'] ?>">
					</p>
					
					<p>
						<label for="<?= inputName('public-email') ?>">Public Eamil</label>
						<input type="tel" name="<?= inputName('public-email') ?>" value="<?= $theme_option['public-email'] ?>">
					</p>			
					
					<p>
						<label for="<?= inputName('facebook') ?>">Facebook</label>
						<input type="url" name="<?= inputName('facebook') ?>" value="<?= $theme_option['facebook'] ?>">
					</p>
					
					<p>
						<label for="<?= inputName('twitter') ?>">Twitter</label>
						<input type="url" name="<?= inputName('twitter') ?>" value="<?= $theme_option['twitter'] ?>">
					</p>
										
					<p>
						<label for="<?= inputName('gplus') ?>">Google +</label>
						<input type="url" name="<?= inputName('gplus') ?>" value="<?= $theme_option['gplus'] ?>">
					</p>					
				</div>
							
				<?php submit_button(); ?>
			</form>	
		</div>	
		
		<style>
			#theme-options textarea{display: block; width: 400px; height: 100px;}
		</style>
	
		<script>
			jQuery("#theme-options .theme-opt-part").hide();					
			jQuery("#theme-options #<?= $currentTab ?>.theme-opt-part").show();
		</script><?php
	}
