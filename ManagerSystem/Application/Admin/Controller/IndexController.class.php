<?php

namespace Admin\Controller;
use Admin\Common\AdminController;

class IndexController extends AdminController {

    function index(){
        
        $this->display();
}

	function left(){

		$id = session('id');
		$name = session('username');

		if($name === 'admin'){

			$authinfoA = D('auth')
					   ->where(array('a_pid'=>0))
					   ->select();

			$authinfoB = D('auth')
					   ->where(array('a_pid'=>array('neq',0)))
					   ->select();

		}else{

			//联表查询获取角色id
			$roleinfo = D('user')
					  ->alias('u')
					  ->join('__USER_ROLE__ as ur on u.u_id = ur.u_id')
					  ->field('ur.r_id')
					  ->where(array('u.u_id'=>$id))
					  ->find();

			$roleids = $roleinfo['r_id'];


			//列表查询获取权限id
			$authinfo = D('role')
					  ->alias('r')
					  ->join('__ROLE_AUTH__ as ra on r.r_id = ra.r_id')
					  ->field('ra.a_id')
					  ->where(array('r.r_id'=>$roleids))
					  ->select();


			foreach ($authinfo as $v) {

				$authArr[] = $v['a_id'];

			}

						
			$authinfoA = D('auth')
					   ->where(array('a_id'=>array('in',$authArr),'a_pid'=>0))
					   ->select();

			$authinfoB = D('auth')
					   ->where(array('a_id'=>array('in',$authArr),'a_pid'=>array('neq',0)))
					   ->select();

		}


		$this->assign('authinfoA',$authinfoA);
		$this->assign('authinfoB',$authinfoB);

		$this->display();
	}


	function right(){

		C('SHOW_PAGE_TRACE',FALSE);

		$this->display();

	}


	function top(){

	C('SHOW_PAGE_TRACE',FALSE);

	$this->display();
	
	}
}