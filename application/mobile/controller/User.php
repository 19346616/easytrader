<?php
namespace app\mobile\controller;
use think\View;
use think\Request;
use think\Controller;
use think\Router;
use extend\lib\baseController;
use extend\lib\sms;

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
  
}