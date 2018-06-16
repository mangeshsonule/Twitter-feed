<?php


require_once("option.php");
require_once("Twitter_get_connect.php");

class Twitter_manager
{
	public function twitter_feed_form(){
		?>
		<div class="BSF-twitter-feed">
			<div class="BSF-twitter-feed-title">
				<h1>Twitter Fedd</h1>
		</div>
		<div class="BSF-twitter-feed-form">
					<form method="post" action="">
					<table>
						<tr>
							<td>API KEY</td>
							<td><input type="text" value="<?php echo get_option('api_key',true);?>" name="api_key"></td>
						</tr>
						<tr>
							<td>API Secret</td>
							<td> <input type="text" value="<?php echo get_option('api_secret_key',true);?>" name="api_secret_key"></td>
						</tr>
						<tr>
							<td>Access-token</td>
							<td>
							<input type="text" value="<?php echo get_option( 'access_token',true);?>" name="access_token">
							</td>
						</tr>
						<tr>
							<td>Access-Secret-Token</td>
							<td><input type="text" value="<?php echo get_option('access_secret_token',true); ?>" name="access_secret_token"></td>
						</tr>
						<tr>
							<td><input type="submit" name="save_key" value="Save Change" class="button-primary"></td>
						</tr>
					</table>
					</form>
		</div>
		<div class="BSF-twitter-time-line">
			<table>
				<tr>
					<td>Screen Name</td>
					<td><input type="text" name="screen_name" value="<?php echo $string['user']['screen_name']; ?>"></td>
				<tr>
			</table>
		</div>
		</div>
	<?php		
	}
	public function twitter_form_getdata(){

		if(isset($_POST['save_key'])){

			if(empty($_POST['api_key'])||empty($_POST['api_secret_key'])||empty($_POST['access_token'])||empty($_POST['access_secret_token']))
				return false;
			if(!empty($_POST['api-key'])||!empty($_POST['api_secret_key'])||!empty($_POST['access_token'])||!empty($_POST['access_secret_token']))
				return true;
		}
	}
	public function twitter_form_setdata(){

		if(self::twitter_form_getdata()==true){
			$api_key 			=trim($_POST['api_key']);
			$api_secret_key		=trim($_POST['api_secret_key']);
			$access_token 		=trim($_POST['access_token']);
			$access_secret_token=trim($_POST['access_secret_token']);

			update_option( 'api_key', $api_key);
			update_option( 'api_secret_key', $api_secret_key);
			update_option( 'access_token', $access_token);
			update_option( 'access_secret_token', $access_secret_token);
			return true;
		}
		return false;
	}

}