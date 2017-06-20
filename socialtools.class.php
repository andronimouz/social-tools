<?php

/* ---------------------------------------------------------- */
/* SocialTools para PHP Ver: 1.00                             */
/* ---------------------------------------------------------- */
/* SocialTools es una clase en la cual podras tener utiles    */
/* herramientas como desarrollador web                        */
/* Desarrollada por @IFGIOVANNI                      		  */
/* ---------------------------------------------------------- */

Class SocialTools 
{
	const CURL_PREFERED = TRUE;
	const FB_APP_ID = "";
	const FB_APP_SECRET = "";
	const YOUTUBE_KEY = ""; 
	public function __construct () {
		
	}

	static function isCurl(){
	    return function_exists("curl_init");
	}

	/*
		#ES: Devuelve el numero de likes de una pagina de Facebook.
		#EN: Returns the likes number of a Facebook page.
	*/

	public function getPagesLikes($id) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/'.$id.'?fields=fan_count&access_token='.self::FB_APP_ID.'|'.self::FB_APP_SECRET);
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj->fan_count;
		}else{
			$result = file_get_contents('https://graph.facebook.com/'.$id.'?fields=fan_count&access_token='.self::FB_APP_ID.'|'.self::FB_APP_SECRET);
			$obj = json_decode($result);
			return $obj->fan_count;
		}
		
	}

	/*
		#ES: Devuelve el numero de seguidores de una cuenta de Twitter.
		#EN: Returns the followers count of a Twitter account.
	*/

	public function getTwitterFollowersCount($username) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, 'https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$username);
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj[0]->followers_count;
		}else{
			$result = file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$username);
			$obj = json_decode($result);
			return $obj[0]->followers_count;
		}
	}

	/*
		#ES: Devuelve el numero de suscriptores de una cuenta de YouTube
		#EN: Returns the suscribers count of a YouTube channel.
	*/

	public function getYouTubeSuscribersCount($channelID) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channelID.'&key='.self::YOUTUBE_KEY);
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result,true);
			return $obj['items'][0]['statistics']['subscriberCount'];
		}else{
			$result = file_get_contents('https://www.googleapis.com/youtube/v3/channels?part=statistics&id='.$channelID.'&key='.self::YOUTUBE_KEY);
			$obj = json_decode($result,true);
			return $obj['items'][0]['statistics']['subscriberCount'];
		}
	}
}
?>