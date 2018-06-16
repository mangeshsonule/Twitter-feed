<?php
require_once("Twitter_get_tweets.php");
require_once('twitter-api-php/TwitterAPIExchange.php');

class TwitterConnect{

	public function twitter_setkeys(){

		$api_keys=Twitter_tweets::twitter_getkeys();
		if(is_array($api_keys)){
			extract($api_keys);

			$settings = array(
    			'oauth_access_token' 		=> $api_keys['access_token'],
    			'oauth_access_token_secret' => $api_keys['access_secret_token'],
    			'consumer_key' 				=> $api_keys['api_key'],
   				'consumer_secret' 			=> $api_keys['api_secret_key']
			);
			return $settings;
		}
		
	}
	public function twitter_connceted(){

		$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
		$requestMethod = "GET";
		$getfield = '?count=20';
		$twitter = new TwitterAPIExchange(self::twitter_setkeys());
		$string = json_decode($twitter->setGetfield($getfield)
                  ->buildOauth($url, $requestMethod)
                  ->performRequest(),$assoc = TRUE);

		return $string;
	}
	public function twitter_check_connection(){
		$data= json_decode(self::twitter_connceted());
		if($data["errors"][0]["message"] != "")
		 return false;
		else 
		return true;	
	}
}