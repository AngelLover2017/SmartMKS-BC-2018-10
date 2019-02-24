<?php
namespace Home\Model;
use Think\Model;
class LoginModel extends Model{
    protected $fields = array('id','pd','auth',
        '_type'=>array('id'=>'char(10)','pd'=>'char(6)','auth'=>'varchar(9)'));
    protected $pk = 'id';

// 验证登录错误提示
    public function errorIfo($i){
        $error = '';
        switch ($i) {
            case '0':
                $error = "账号或者密码为空！";
                break;
            case '1':
                $error = "账号或密码数据类型错误！";
                break;
            case '2':
                $error = "账号或密码错误！";
                break;
            case '3':
                $error = "权限解析错误";
            default:
                $error = "未知错误！";
                break;
        }
        return $error;
    }

// 权限解析
    public function authResolve($auth){
       $page = '';
       switch ($auth) {
           case 'B1_A':
                $page = 'generalTeacher';
               break;
            case 'B2_A':
                $page = 'generalTeacher';
               break;
            case 'B3_A':
                $page = 'generalTeacher';
               break;
            case 'B4_A':
                $page = 'generalTeacher';
               break;
            case 'B5_A':
                $page = 'generalTeacher';
               break;
            case 'C1_B5':
                $page = 'superAdmin';
               break;
            case 'C2_B5':
                $page = 'superAdmin';
               break;
            case 'D_C3_B5':
                $page = 'superAdmin';
               break;
           default:
                $page ='';
               break;
       }
       return $page;
    }
}