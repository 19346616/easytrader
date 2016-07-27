<?php
namespace app\mobile\controller;
use think\View;
use think\Request;
use think\Controller;
use extend\lib\traderApi;
class Trader extends controller
{
	//user exist api
    public function userexist()
    {
	    	$rc = traderApi::userserExist(13568802228);
	    	print_r($rc);
    	 //return $this->view->fetch('index');
    }
    //user detail api
    public function userdetail(){
    		$rc = traderApi::userDetail(13568802228);
    		echo "<pre>";
    		print_r($rc);
    }
    
    public function userreg(){
    		$mobile = '13568802228';
    		$nickname = 'test';
    		$password = '123456';
    		$deviceinfo = '123456';
    		$rc = traderApi::regUser($mobile,$nickname,$password,$deviceinfo);
    		print_r($rc);
    }
    //edit user
    public function changeuser(){
    		$mobile = '13568802228';
    		$nickname = 'testnickname';
    		$name = 'yqj';
    		$addr = 'xxxxyyyy';
    		$bankname = 'testbankname';
    		$bankno = '11111122222';
    		$email = '112@163.com';
    		$rc = traderApi::changeUserDetail($mobile,$nickname,$name,$addr,$bankname,$bankno,$email);
    		print_r($rc);
    }
    public function changepasswd(){
    		$mobile = '13568802228';
    		$password = '1234563';
    		$newpassword = '654321';
    		$rc = traderApi::changePassWord($mobile,$password,$newpassword);
    		print_r($rc);
    }
    public function query(){
    		$userid = '103156';
    		$rc = traderApi::query($userid);
    		print_r($rc);
    }
    public function buyfund(){
    		$userid = '103156';
    		$rc = traderApi::buyfund($userid);
    		print_r($rc);
    }
    public function getpos(){
    		$userid = '103156';
    		$rc = traderApi::getpos($userid);
    		print_r($rc);
    }
    public function upload(){
    		$userid = '103156';
    		$rc = traderApi::upload($userid);
    		print_r($rc);
    }
     public function download(){
    		$userid = '103156';
    		$rc = traderApi::download($userid);
    		print_r($rc);
    }
 }
?>