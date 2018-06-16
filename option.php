<?php
/*
*/
require_once("Twitter_get_connect.php");
require_once("Twitter_manager.php");

class Option{

	public function  __construct(){

		add_action('admin_menu', array($this,'twitter_register_options_page'));
		add_action('admin_notices', array($this,'twitter_feed_notice'));
	}

	public function twitter_register_options_page(){
		add_options_page(
			'Twitter Setting', 
			'Twitter Feed',
			'manage_options', 
			'BSF_twitter',
			array($this,'twitter_options_page')
		);
	}

	public function twitter_options_page(){
		echo Twitter_manager::twitter_feed_form();	
	}
	public function twitter_feed_notice(){

		if(Twitter_manager::twitter_form_getdata()==false){
			
			echo '<div class="notice notice-warning is-dismissible">
					<p> Enter API KeyS</p>
				 </div>';
		}
		if(Twitter_manager::twitter_form_setdata()==true){

			echo '<div class="notice notice-warning is-dismissible">
					<p> Setting Saved</p>
				 </div>';
		}
		if(TwitterConnect::twitter_check_connection()==true)
		{
			echo '<div class="notice notice-warning is-dismissible">
					<p> Twitter Server Connect Succfully</p>
				 </div>';
		}
		else{

			echo '<div class="notice notice-warning is-dismissible">
					<p> Something Wrong </p>
				 </div>';
		}

	}
}

$BSF_instance= new Option();
