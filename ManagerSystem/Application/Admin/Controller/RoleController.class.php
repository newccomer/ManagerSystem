<?PHP

namespace Admin\Controller;
use Admin\Common\AdminController;


class RoleController extends AdminController{


	function showlist(){


			$model = M();

			  $sql = "select r.r_id,r.r_name,group_concat(a_name) as aname,group_concat(a_ca) as ca
			  	  from nc_role as r 
				  left join nc_role_auth as ra on r.r_id = ra.r_id
				  left join nc_auth as a on a.a_id = ra.a_id 
				  group by r.r_id";

			$roleinfo =$model ->query($sql);

			$this->assign('roleinfo',$roleinfo);

			$this->display();

	}


	function distribute(){
	
		$id = I('get.r_id');

		if(IS_POST){

			$data = I('post.');

			$model = M();
			$sql = "select group_concat(a_id) as a_ids from nc_role_auth where r_id = $id";
			$result = $model->query($sql);

			$authids = explode(",",$result[0]['a_ids']);


			foreach ($data['a_id'] as $v) {

				if(in_array($v,$authids) === false){

					$sqlAdd = "insert into nc_role_auth(r_id,a_id) values (".$id.",".$v.")";

					  $info = $model->execute($sqlAdd);

					}


				}


			if($result){

				 	$this->success('分配成功',U('showlist'),0);

				}else{

				 	$this->error('分配失败',U('showlist'),array('u_id'=>$id),1);

				}


		 }else{

	   	$roleinfo = D('role')->find($id);
	   	$this->assign('roleinfo',$roleinfo);

	    //获得可以分配的权限信息
	    $authinfoA = D('auth')->where(array('a_pid'=>0))->select();
	    $authinfoB = D('auth')->where(array('a_pid'=>array('neq',0)))->select();

	    $this->assign('authinfoA',$authinfoA);
	    $this->assign('authinfoB',$authinfoB);

	    $this->display();

	    }


	}


	function add(){

		$role = D('role');


		if(IS_POST){

			$data = I('post.');


			if($role->add($data)){

				$this->success('添加成功',U('showlist'));

			}else{

				$this->error('添加失败',U('add'),1);
			}


		}else{

			$this->display();

		}


	}


	function delete(){

		$role = D('role');
		  $id = I('get.r_id');

		 $delete = $role
			  ->where(array('r_id'=>$id))
			  ->delete();


		if($delete){

				 	$this->success('删除成功',U('showlist'),0);

				 }else{

				 	$this->error('删除失败',U('showlist'),array('r_id'=>$id),1);

				 }

				 
	}


}