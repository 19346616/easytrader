<?php
namespace extend\lib;
use think\View;
use think\Controller;
use think\Session;
class baseController extends Controller
{
	 protected $view;	 
	 protected $currentUser;
	 function __construct(){
	 	$user = Session::get('user');
	 	if(!$user)	 $this->redirect('mobile/index/mlogin');	
	 	else $this->currentUser = $user;
	 	
		$this->view= new View();
	 }
}