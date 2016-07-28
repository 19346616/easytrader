<?php
namespace app\mobile\controller;
use think\View;
use think\Request;
use extend\lib\sms;
use extend\lib\user;
use think\Controller;
use think\Session;
use extend\emchat\Easemob;
use think\Config;

class Index extends controller
{
    public function index()
    {
    	 //return $this->view->fetch('index');
    }
    public function home(){
        $hx_options = Config::get('hx');
        $h = new Easemob($hx_options['hx_options']);
        $token = $h->getToken();
        print_r($h->getUser("13568813239"));
		//return $this->view->fetch('home');    
    }
    
    public function doregister(){
        $phone = Request::instance()->param('phone');
        $name =  Request::instance()->param('name');
        $passwd = Request::instance()->param('passwd');
        $recommend = Request::instance()->param('recommend','');

        //$ret = sms::doPostRequest($phone,$code);

        $ret = user::register(array('userid'=>$phone,'name'=>$name,'recommend'=>$recommend,
                'mobile'=>$phone,'passwd'=>$passwd,'register_date'=>date('Y-m-d H:i:s')));

        if($ret){
            $hx_options = Config::get('hx');
            $h = new Easemob($hx_options['hx_options']);
            $h->getToken();
            $rc = $h->createUser($phone,$passwd);
            if($rc === false) echo  json_encode(array('ret'=>'0','msg'=>'注册失败'));
        }
        else  echo  json_encode(array('ret'=>'0','msg'=>'注册失败'));
    }
    public function mlogin(){
        $view= new View();
        return $view->fetch('mlogin');
    }
      public function register(){
            return $this->view->fetch('register');
    }
    public function auth(){
         $userid = Request::instance()->param('userid');
         $passwd = Request::instance()->param('passwd');
         $user = user::auth($userid,$passwd);
     

         if(!$user){
            echo json_encode(array('ret'=>0,'msg'=>'登录失败'));
            return;
             // return $this->redirect('index.php/mobile/index/mlogin',[]);
         }else{
            $hx_options = Config::get('hx');
            $h = new Easemob($hx_options['hx_options']);
            $h->getToken();
            $hxuser = $h->getUser($userid);
            echo "<pre>";
            print_r($hxuser);
            Session::set('user',$user);
            echo json_encode(array('ret'=>1,'msg'=>'登录成功'));
            // return $this->redirect('index.php/mobile/user/index', [])
         }
    }
}
