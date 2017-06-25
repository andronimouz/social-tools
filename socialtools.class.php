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
		#ES: Devuelve el numero de veces que se ha compartido una url dentro de Facebook.
		#EN: Returns the number of times a url has been shared within Facebook.
	*/

	public function getFBShareCount($url) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/?id='.$url);
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj->share->share_count;
		}else{
			$result = file_get_contents('https://graph.facebook.com/?id='.$url);
			$obj = json_decode($result);
			return $obj->share->share_count;
		}
		
	}

	/*
		#ES: Devuelve el número de personas que sigue una cuenta de Instagram.
		#EN: Returns the number of people following an Instagram account.
	*/

	public function getInstagramFollowsCount($user) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$user/?__a=1");
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj->user->follows->count;;
		}else{
			$result = file_get_contents("https://www.instagram.com/$user/?__a=1");
			if ($result !== false) {
			    $data = json_decode($response);
			    if ($data !== null) {
			        return $data->user->follows->count;
			    }
			}
		}
		return 0;
	}

	/*
		#ES: Devuelve el número de seguidores de una cuenta de Instagram.
		#EN: Returns the number of followers in an Instagram account.
	*/

	public function getInstagramFollowedByCount($user) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$user/?__a=1");
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj->user->followed_by->count;;
		}else{
			$result = file_get_contents("https://www.instagram.com/$user/?__a=1");
			if ($result !== false) {
			    $data = json_decode($response);
			    if ($data !== null) {
			        return $data->user->followed_by->count;
			    }
			}
		}
		return 0;
	}

	/*
		#ES: Devuelve la url de la foto de perfil de Instagram.
		#EN: Returns the url of the Instagram profile photo.
	*/

	public function getInstagramProfilePicture($user) {
		if(self::CURL_PREFERED && self::isCurl()){
			$ch = @curl_init();
			@curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			@curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			@curl_setopt($ch, CURLOPT_URL, "https://www.instagram.com/$user/?__a=1");
			$result = @curl_exec($ch);
			curl_close($ch);
			$obj = json_decode($result);
			return $obj->user->profile_pic_url_hd;
		}else{
			$result = file_get_contents("https://www.instagram.com/$user/?__a=1");
			if ($result !== false) {
			    $data = json_decode($response);
			    if ($data !== null) {
			        return $data->user->profile_pic_url_hd;
			    }
			}
		}
		return 0;
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