<?php
namespace extend\lib;
use think\View;
use think\Controller;
use think\Session;
class baseController extends Controller
{
	 protected $view;	 
	 protected $currentUser=false;
	 function __construct(){
	 	$user = Session::get('user');
	 	if(!$user)	{
	 		echo json_encode(array('rc'=>0,'msg'=>'not login'));
	 		return;
	 	}
	 	else $this->currentUser = $user;
	 }
}