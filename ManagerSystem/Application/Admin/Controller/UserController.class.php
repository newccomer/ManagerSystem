<?php
namespace Admin\Controller;
use Admin\Common\AdminController;
use Tnink\Verify;


class UserController extends AdminController {

//用户登录
	function login(){

		if(IS_POST){

			$code = I('post.verify');
			 $vry = new \Think\Verify();//验证码校检

			if($vry->check($code)){

				//获取用户名与密码
				$user_name = I('post.username');
				      $pwd = I('post.password');

				//查询数据库是否存在此用户
				     $info = D('user')
				           ->where(array('u_name'=>$user_name,'u_password'=>$pwd))
				           ->find();


				if($info){

					session('id',$info['u_id']);
					session('username',$info['u_name']);

					$this->redirect('Index/index');//进入首页

				}

				$this->assign('errorlogin','用户名与密码验证失败');

			}else{

				$this->assign('errorlogin','验证码验证失败');

			}
			

		}


		$this->display();

	}


   function verifyImg(){

		$config = array(

	    'imageH'    =>  50,               // 验证码图片高度
	    'imageW'    =>  130,               // 验证码图片宽度
	    'length'    =>  4,               // 验证码位数
	    'fontttf'   =>  '',              // 验证码字体，不设置随机获取
	    'useZh'     =>  false,           // 使用中文验证码 
	    'bg'        =>  array(243, 251, 254),  // 背景颜色
	    'fontSize'  =>  18,              // 验证码字体大小(px)
	);

	  	   $vry = new \Think\Verify($config);//命名空间完全限定名称方式实例化
	
		   $vry -> entry();

	}


	function logout(){

		//清除session信息
		session();

		//跳转到登录页
		redirect('login');
	}


	function showlist(){

		$model = M();

		  $sql = "select u.u_id,u_name,u_password,group_concat(r_name) as rname,group_concat(ur.r_id) as rid
			  	  from nc_user as u 
				  left join nc_user_role as ur on u.u_id = ur.u_id
				  left join nc_role as r on r.r_id = ur.r_id 
				  group by u.u_id";

		$userinfo =$model ->query($sql);

		$this->assign('userinfo',$userinfo);

		$this->display();

	}


	function add(){

		$user = D('user');


		if(IS_POST){

			$data = I('post.');


			if($user->add($data)){

				$this->success('添加成功',U('showlist'));

			}else{

				$this->error('添加失败',U('add'),1);
			}


		}else{

			$this->display();

		}


	}


	function update(){

 		$user = D('user');

 		  $id = I('get.u_id');


		if(IS_POST){

			$data = I('post.');

			 $num = $user
				  ->where(array('u_id'=>$id))
				  ->save($data);


				 if($num){

				 	$this->success('修改成功',U('showlist'),1);

				 }else{

				 	$this->error('修改失败',U('update'),array('u_id'=>$id),1);

				 }


		}else{

		$user_id = I('get.u_id');

    	   $info = $user -> find($id);

     	    $this-> assign('info',$info);

    	    $this->display();

		}


	}


	function delete(){

		$user = D('user');
		  $id = I('get.u_id');

		 $delete = $user
			  ->where(array('u_id'=>$id))
			  ->delete();


		if($delete){

				 	$this->success('删除成功',U('showlist'),0);

				 }else{

				 	$this->error('删除失败',U('showlist'),array('u_id'=>$id),1);

				 }


		}


		function change(){


			$id = I('get.u_id');

			if(IS_POST){

			$data = I('post.');
			$r_id = $data['r_id'][0];


			$model = M();
			$sql = "select group_concat(u_id) as uids from nc_user_role group by u_id";
			$result = $model->query($sql);


			$userids = array();
			foreach ($result as $v) {

				array_push($userids,$v['uids']);

			}


			if(in_array($id,$userids)){

				$sql = "update nc_user_role set r_id = $r_id where id = $id";
				$result = $model->execute($sql);

			}else{

				$sql = "insert into nc_user_role(u_id,r_id) values ($id,$r_id)";
				$result = $model->execute($sql);
			}


			if($result){

				 	$this->success('更改成功',U('showlist'),0);

				 }else{

				 	$this->error('更改失败',U('showlist'),array('u_id'=>$id),1);

				 }


		 }else{

		$userinfo = D('user')->find($id);
	   	$this->assign('userinfo',$userinfo);

	    //获得可以分配的角色信息
	    $roleinfo = D('role')->select();
	    $this->assign('roleinfo',$roleinfo);

	    $this->display();

		 }


		}
		
	
}