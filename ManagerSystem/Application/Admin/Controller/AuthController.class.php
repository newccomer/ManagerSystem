<?PHP

namespace Admin\Controller;
use Admin\Common\AdminController;


class AuthController extends AdminController{


	function showlist(){

		$info = D('auth')->select();
		$info = generateTree($info);

		$this-> assign('info',$info);

  		$this->display();

	}


	function add(){

		$auth = D('auth');


		if(IS_POST){

			$data = I('post.');


			if($auth->add($data)){

				$this->success('添加成功',U('showlist'),1);

			}else{

				$this->error('添加失败',U('add'),1);
			}


		}else{

			$authinfoA = $auth
					  ->where(array('auth_pid'=>0))
					  ->select();

			$this->assign('authinfoA',$authinfoA);

		 	$this->display();

		 }


	}


	function update(){

		$auth = D('auth');
 		  $id = I('get.a_id');


		if(IS_POST){

			$data = I('post.');

			 $num = $auth
				  ->where(array('a_id'=>$id))
				  ->save($data);


				if($num){

				 	$this->success('修改成功',U('showlist'),1);

				}else{

				 	$this->error('修改失败',U('update'),array('u_id'=>$id),1);

				}


		}else{

    	    $info = $auth -> find($id);

     	    $this-> assign('info',$info);

    	    $this->display();

		}


    }


	function delete(){

		$auth = D('auth');
		  $id = I('get.a_id');

		 $delete = $auth
			  ->where(array('a_id'=>$id))
			  ->delete();


		if($delete){

				 	$this->success('删除成功',U('showlist'),0);

				 }else{

				 	$this->error('删除失败',U('showlist'),array('u_id'=>$id),1);

				 }

	}


}