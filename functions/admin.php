<?php
/**!
 * Admin Scripts
 */

// Remove top margin created by admin bar
add_action('get_header', function(){
	if(is_admin_bar_showing()) {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}
});

// Add custom admin dashboard messages
add_action('wp_dashboard_setup', function() {
	global $wp_meta_boxes;
	
	// Check if theme update is available
	wp_add_dashboard_widget('custom_help_widget', 'Mikanakawa WordPress Theme', function() {
		$installed_version = wp_get_theme()->get('Version');
		$git_file = wp_remote_get('https://api.github.com/repos/cooperchristenson/Mikanakawa-Lodge-WP-Theme/releases/latest');
		$git_file = wp_remote_retrieve_body($git_file);
		$git_data = json_decode($git_file);
		$latest_version	= $git_data->tag_name ?? '';

		$message = '';
		if(empty($latest_version)){
			$message = '<p>Checking for updates failed. Please visit <a href="https://github.com/CooperChristenson/Mikanakawa-Lodge-WP-Theme/"> to manually check for updates.</p>';
		}
		else if($installed_version == $latest_version || $installed_version=='WR_Child'){
			$message = '<p>You are on the <a href="https://github.com/CooperChristenson/Mikanakawa-Lodge-WP-Theme/releases/latest" target="_blank" title="'.$latest_version.'">latest version</a></p>';
		}
		else if($installed_version >= $latest_version){
			$message = '<p>You are on a development version. Checkout GitHub to downgrade to the <a href="https://github.com/cooperchristenson/Mikanakawa-Lodge-WP-Theme/releases/latest" target="_blank" title="'.$latest_version.'"></p>';
		}
		else{
			$message = '<h2 style="background-color:rgb(128, 0, 0); color:white; padding:15px;">
					An update is available for your theme.
					<a href="https://github.com/cooperchristenson/Mikanakawa-Lodge-WP-Theme/releases/latest" target="_blank" style="color: gold;text-decoration: none;">
						Version '.$latest_version.'
					</a>
				</h2>';
		}

		echo '<p>Welcome to the Mikanakawa Lodge WordPress Theme</p>
			<p>Need help? Contact the development team at:<br/><a href="mailto:cmailto:liturgy.regency.0l@icloud.com">Cooper Christenson</a></p>
			
			<p>Installed theme version: <i>'.$installed_version.'</i></p>
			'.$message;
	});
});

?>