<?php

namespace Admin\Common;
use Think\Controller;

//继承父类控制器
class AdminController extends Controller{


	function __construct(){

		parent:: __construct();
		
		//运行用户越权访问控制
		//思路：用户访问的‘控制器-操作方法’字符串去与用户角色拥有的权限‘控制器-操作方法’做对比

		$id = session('id');
		$name = session('username');


		$nowAC = CONTROLLER_NAME .'-'. ACTION_NAME;

		if(!empty($name)){

		$roleinfo = D('user')
		-> alias('u')
		->join('__USER_ROLE__ as ur on u.u_id = ur.u_id')
		-> join('__ROLE__ as r on ur.r_id = r.r_id')
		-> join('__ROLE_AUTH__ as ra on r.r_id = ra.r_id')
		-> join('__AUTH__ as a on ra.a_id = a.a_id')
		-> field('a.a_ca')
		->where(array('u.u_id'=>$id))
		->find();
// dump($roleinfo);
		$have_auth = $roleinfo['a_ca'];

		//系统里默认允许的访问权限
		$allow_auth = "User-login,User-logout,User-verifyImg,Index-index,Category-showlist,Order-add,Index-right,Index-left,Index-top";


		if(
			strpos($have_auth,$nowAC)===false && 
			strpos($allow_auth,$nowAC)===false && 
			$name !== "admin"
			){

			exit('You have no auth to visit');
		}


		}else{

			//未登陆状态
			$allow_ac = "User-login,User-logout,User-verifyImg";
			//$this->redirect("User/login");

			if (strpos($allow_ac,$nowAC)===false) {
				
				//$this->redirect('User/login');

				$js = <<<eof
				<script type="text/javascript">
				window.top.location.href="/ManagerSystem/index.php/Admin/User/login"
				</script>
eof;

				echo $js; 
			}

		
		}

	}
}