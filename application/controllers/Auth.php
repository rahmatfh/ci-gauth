<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$client_id = 'google_client_id';
        $client_secret = 'google_client_secret';
        $redirect_uri = 'google_redirect_url';

        //Create Client Request
        $client = new Google_Client();
        $client->setApplicationName("RahmatFH");
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");

        //Send Client Request
        $objOAuthService = new Google_Service_Oauth2($client);
        
		//Generate Client Request
        $result['authUrl'] = $client->createAuthUrl();
		$this->load->view('login');
	}
	
	public function callback()
	{
		$client_id = 'google_client_id';
		$client_secret = 'google_client_secret';
		$redirect_uri = 'google_redirect_url';

		//Create Client Request
		$client = new Google_Client();
		$client->setApplicationName("RahmatFH");
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");

		//Send Client Request
		$service = new Google_Service_Oauth2($client);

		$client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();

		//Get user info 
		$user = $service->userinfo->get();

		echo "</br> User ID :".$user->id; 
		echo "</br> User Name :".$user->name;
		echo "</br> Gender :".$user->gender;
		echo "</br> User Email :".$user->email;
		echo "</br> User Link :".$user->link;    
		echo "</br><img src='$user->picture' height='150' width='150' > ";
	}
}
