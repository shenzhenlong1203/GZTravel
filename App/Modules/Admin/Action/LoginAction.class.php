<?php/** * 后台登录验证 * @author  <[l@easycms.cc]> */class LoginAction extends Action{		//空操作	public function _empty(){		$this->redirect("Admin/Index/index");	}	//加载登录页面	public function login(){		$this->theme('default');		$this->display("login");	}		//执行登录验证方法	public function checkLogin(){		if(!IS_POST) _halt('页面不存在');		//判断验证码		if (I('code','','md5')!=session('verify')) {			$this->error('验证码错误');		}		$username=I('name');		$pwd=I('password','','md5');		//判断用户是否存在		$m=M('admin');		$user=$m->where(array('username'=>$username))->find();		if (!$user || $user['password']!=$pwd) {			$this->error('帐号或密码错误');		}		//判断用户是否被锁定		if($user['islock']) $this->error('用户被锁定');		//获取用户登陆后需要修改的数据		$data=array(			'id'=>$user['id'],			'logintime'=>time(),			'loginip'=>get_client_ip()			);		$m->save($data);		session(C('USER_AUTH_KEY'),$user['id']);		session(C('ADMIN_AUTH_KEY_B'),$user['username']);		session('logintime',date('Y-m-d H:i:s',$user['logintime']));		session('loginip',$user['loginip']);        session(C('ADMIN_AUTH_KEY'),true);				$this->redirect('Admin/Index/index');	}		//执行退出操作方法	public function logout(){		$this->theme('default');		$_SESSION[C('USER_AUTH_KEY')]=null;		$_SESSION[C('ADMIN_AUTH_KEY')]=null;		//$_SESSION[C('ADMIN_AUTH_KEY')]=null;		unset($_SESSION['_ACCESS_LIST']);		$this->display("login");	}		//加载验证码	public function verify(){		import('ORG.Util.Image');		Image::buildImageVerify();	}}