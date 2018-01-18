<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function get_api_key ($type=null){
	if($type=='facebook'){
		$apps['id'] 	= '1528676940783629'; //Facebook App ID
		$apps['secret'] = '3af4c7143d65c165f49673f347161039'; // Facebook App Secret
		$apps['url'] 	= 'http://localhost/ayopiknik.id';  //return to home
		$apps['permissions'] 	= 'email';  //Required facebook permissions
	}
	else if($type=='google') {
		$apps['id'] 	= '818840302870-vglqre5v8ff3b9nm3hm704682vnvv5sm.apps.googleusercontent.com'; //Client App ID
		$apps['secret'] = 'sP41Y0asJNPsuKvPEhwkZExb'; // Client App Secret
		$apps['url'] 	= 'http://localhost/ayopiknik.id/auth/google';  //return to home
		//$apps['permissions'] 	= 'email';  //Required facebook permissions

	}

	return $apps;

}


function set_password ($value){
	return md5(sha1(md5(md5(sha1(md5($value))))));
}

?>