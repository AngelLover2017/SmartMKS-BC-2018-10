<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function test(){
		echo "test";
	}
    public function index(){
        $this->display('index');
    }
    public function login(){
    	// 实例化LoginModel
    	$login = D('Login');
    	// 获取变量（表单参数）
    	$id = I('post.GH','0');
    	$password = I('post.PSW','0');
    	$auth = '';
    	// 先判断传参是否为空
    	if($id != 0 && $password != 0){
    		// 判断账号密码是否为数字类型的数据
    		if(is_numeric($password) && is_numeric($id)){
    		//sql查询方式，query方法查询
    		$content = $login->query(" select auth from think_login where id = '{$id}' and pd = '{$password}' ");
    		$auth = $content[0][auth];
	    	//表单验证
	    	if($auth == ''){
	    		$this->error($login->errorIfo(2));  
	    		$this->display('index');  	
	    	}
	    	// 权限解析,根据权限登录不同页面
	    	else{
	    		// 成功登陆
	    		$page = $login->authResolve($auth);
	    		if($page != ''){
                    
	    			// 设置登陆的cookie，以识别用户
	    			cookie('id',$id,array('expire'=>3600*3,'prefix'=>'login_'));
	    			cookie('password',$password,array('expire'=>3600*3,'prefix'=>'login_'));
	    			cookie('auth',$auth,array('expire'=>3600*3,'prefix'=>'login_'));
                    //实例化UserInfoModel，将教师姓名放入cookie
                    $user = D('UserInfo');
                    $user_name = $user->query("select name from think_user_info where id='{$id}' ");
                    cookie('name',$user_name[0]['name'],array('expire'=>3600*3,'prefix'=>'user_'));
                    /*根据不同的page返回值进行前台后台分模块*/
                    if($page=='superAdmin' || $page=='scienResearchSec' || $page=='teachingSec'){
                        $this->redirect('Admin/'.$page);
                    }else{
                        $this->redirect('Home/'.$page);
                    }
	    			
	    		}else{
	    			$this->error($login->errorIfo(3));
	    			$this->display('index');  
	    		}
    		}
    	}else{
    		$this->error($login->errorIfo(1));
    		$this->display('index');
    	}
    	}else{
    		$this->error($login->errorIfo(0));
    		$this->display('index');
    	}
    	
    }

    public function changePd(){
    	// 实例化PdMaintainModel
    	$change = D('PdMaintain');
    	// 实例化UserInfoModel
    	$userifo = D('UserInfo');
    	// 获取forgetpd的表单参数
    	$id = I('post.id','0');
    	$name = I('post.name','1');
    	$idnum = I('post.idnum','2');
    	// 错误验证
    	if($id != 0 && $name != 1 && $idnum != 2){
    		if(strlen($name)<=50 && strlen($id)==10 && is_numeric($id) && strlen($idnum)==6){
    			// 数据库验证，用数据库中think_pd_maintain和think_user_info的3项数据进行对比验证
    			$content1 = $change->query("select idnum from think_pd_maintain where id = '{$id}' ");
    			$content2 = $userifo->query("select name from think_user_info where id = '{$id}' ");
    			if($content1[0][idnum]==$idnum && $content2[0][name]==$name){
					// 若验证通过的话，就去更新think_login表
					$login = D('Login');
					$return = $login->execute("update think_login set pd = '{$idnum}' where id = '{$id}' ");
					if($return == 0){
						$this->error('密码仍为初始密码！') ;
						$this->display('forgetpd');
					}else if($return == 1){
						$this->display('changesuc');
					}else{
						$this->error('密码重置失败！') ;
						$this->display('forgetpd');
					}
    			}else{
    				$this->error("数据验证失败！") ;
    				$this->display('forgetpd');
    			}
    			
    		}else{
    			$this->error("数据类型或长度错误！") ;
    			$this->display('forgetpd');
    		}
    	}else{
    		$this->error("工号、姓名或身份证后六位为空！") ;
    		$this->display('forgetpd');
    	}

    }

    // 退出登录
    public function quit(){
        /*删除cookie*/
       cookie(null,"login_");
       /*重定向到登录界面*/
    }


  
}
?>