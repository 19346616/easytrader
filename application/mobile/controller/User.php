<?php
namespace app\mobile\controller;
use think\View;
use think\Request;
use think\Controller;
use think\Router;
use extend\lib\baseController;
use think\Session;
use think\Config;
class User extends baseController
{
   
    public function index()
    {
    	   trace("index index");
    	   return $this->view->fetch('index');
    }
    public function home(){
        return $this->view->fetch('home');    
    }
    public function register(){
    		return $this->view->fetch('register');
    }
    public function gethead(){
    		$trader_config = Config::get('traderconfig');
    		$img_dir = $trader_config['img_dir'];
    	    if(isset($this->currentUser->head)&&$this->currentUser->head!='')
    	    		$header = $this->currentUser->head;
    	    	else {
         	$header = "head.png";
     	}
        // //var_dump($trader_dir);
         header("content-type:image/png");
         $str=file_get_contents($img_dir.$header);
         echo $str;
    }
}