<?php


class Twitter_tweets{

	public function twitter_getkeys(){

		if(!empty(get_option('api_key',true))&&!empty(get_option('api_secret_key',true))&&!empty(get_option('access_token',true))&&!empty(get_option('access_secret_token',true))){

			$setting['api_key']				=trim(get_option('api_key',true));
			$setting['api_secret_key']		=trim(get_option('api_secret_key',true));
			$setting['access_token']		=trim(get_option('access_token',true));
			$setting['access_secret_token']	=trim(get_option('access_secret_token',true));
			return $setting;
		}
		if(!empty(get_option('api_key',true))||!empty(get_option('api_secret_key',true))||!empty(get_option('access_token',true))||!empty(get_option('access_secret_token',true))){

		}
	}

}