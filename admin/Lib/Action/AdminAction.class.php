<?php

/**
 * 后台管理
 */

class AdminAction extends Action{
	
	// 所有方法调用之前，先执行
	public function _initialize(){
		if(!$_SESSION['name']){
			$this->success("还没有登录",__APP__."/login/login");
		}
		$this->assign('name',$_SESSION['name']);
	}
	
	// 后台主页(默认，显示管理员列表)
	public function main(){
		$admin  =M('admin');
		$re = $admin->select();
		
		// 性别转换
		foreach ($re as $k=>$v){
			if($re[$k]['sex'] == 1){
				$re[$k]['sex'] = '男';
			}else if($re[$k]['sex'] == 2){
				$re[$k]['sex'] = '女';
			}else{
				$re[$k]['sex'] = '保密';
			}
		}
		//var_dump($re);die();
		$this->assign("re",$re);
		$this->assign('name',$_SESSION['name']);
		
		$this->display();
	}
	
	
	// 添加图书
	public function addBooks(){
		$type = M('type');
		$re1 = $type->where(array('fid'=>0))->select();
		$re2 = $type->where(array('fid'=>9))->select();
		$this->assign("re1",$re1);
		$this->assign("re2",$re2);
		$this->display();
	}
	
	// 处理添加图书
	public function addBooksDo(){
		$data['Ladmin'] = $_POST['Ladmin'];
		$data['Lname'] = $_POST['Lname'];
		$data['Lnum'] = $_POST['Lnum'];
		$data['Ladmin'] = $_POST['Ladmin'];
		$data['Lplace'] = $_POST['Lplace'];
		$data['Ltype'] = $_POST['Ltype'];
		$data['Ltime'] = $_POST['Ltime'];
		$data['Ldis'] = $_POST['Ldis'];
		$data['Ldi'] = $_POST['Ldi'];
		
		/* var_dump($_POST);
		echo "<hr>";
		var_dump($data);die(); */
		
		
		import('ORG.Net.UploadFile');// 加载文件上传类
		import('ORG.Util.Image');
		
		$upload = new UploadFile();
		
		// 图片上传
		$upload->maxSize  = 3145728 ;
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
		$upload->savePath =  './Public/Uploads/';
		
		
		// 缩略图
		$upload->thumb=true;
		$upload->thumbMaxWidth="50,500";
		$upload->thumbMaxHeight="50,500";
		$upload->thumbPrefix="s1_,s2_";
		$upload->thumbPath="./Public/Uploads/s/";
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{
			$info =  $upload->getUploadFileInfo();
			$big_img = $info[0]['savepath'].$info[0]['savename'];			
			$data['Lbig_img'] = $big_img;
			$data['Lsmall_img'] = $info[0]['savepath']."s/s1_".$info[0]['savename'];
		
			// 图片加水印
			$Image = new Image();
			$small_img2 = $info[0]['savepath']."s/s2_".$info[0]['savename'];
			$Image->water($small_img2,'./Public/logo.png');//缩略图2
			$Image->water($big_img,'./Public/logo.png');//原图
		
		}
		
		$product = M("list");
		
		$re = $product->add($data);
		if($re){
			echo 123;
		}else{
			echo $product->getLastSql();die();
		}		
		
	}
	
	// 展览列表
	public function booksList(){
		$product = M("list");
		$re = $product->select();			
		$this->assign("re",$re);
		$this->display();
	}
	
	
	//修改展览品数据提交
	public function EditList(){
		$Lid	= $_GET['Lid'];
		$product = M("list");
		$result = $product->where(array("Lid"=>$Lid))->select();
		$re		=$result[0];
		$this->assign("re",$re);
		$this->display();
	}
	
	//修改展览品数据
	public function EditListDo(){
		
		$Lid		  =$_POST['Lid'];
		$data['Lname']=$_POST['Lname'];
		$data['Lnum'] =$_POST['Lnum'];
		$data['Ladmin']=$_POST['Ladmin'];
		$data['Lplace']=$_POST['Lplace'];
		$data['Ltime']=$_POST['Ltime'];
		$data['Ltype']=$_POST['Ltype'];
		$data['Ldi']  =$_POST['Ldi'];
		$data['Ldis']=$_POST['Ldis'];
		
		import('ORG.Net.UploadFile');// 加载文件上传类
		import('ORG.Util.Image');// 图片操作类
		
		$upload = new UploadFile();// 实例化上传类
		
		// 图片上传
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		
		
		// 缩略图
		$upload->thumb=true;//缩略图开启
		$upload->thumbMaxWidth="50,500";//设置缩略图的宽度，多个用逗号分隔（两张缩略图）
		$upload->thumbMaxHeight="50,500";
		$upload->thumbPrefix="s1_,s2_";//设置名称前缀,默认是thumb_
		$upload->thumbPath="./Public/Uploads/s/";//指定缩略图存放目录
		
		if(!$upload->upload()) {// 上传错误提示错误信息
			
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			$big_img = $info[0]['savepath'].$info[0]['savename'];
			
			$data['Lbig_img'] = $big_img;
			$data['Lsmall_img'] = $info[0]['savepath']."s/s1_".$info[0]['savename'];
		
			// 图片加水印
			$Image = new Image();
			// 给图片添加logo水印
			$small_img2 = $info[0]['savepath']."s/s2_".$info[0]['savename'];
			$Image->water($small_img2,'./Public/logo.png');//缩略图2
			$Image->water($big_img,'./Public/logo.png');//原图
		
		}
		
		
			$product = M("list");
			
			$result= $product->where(array('Lid'=>$Lid))->save($data);
			
			if($result){				
				$this->success('修改成功','booksList');
			}else{
				echo $product->getLastSql();die();
			}
	}
	
	
	// 删除列表里的展览物品
	public function productDelete(){
		$Lid  = $_GET['Lid'];
		$productObj =M('List');
		$result 	=$productObj->where(array('Lid'=>$Lid))->delete();
		if($result){
			echo "<script type='text/javascript'>alert('删除成功');
			location.href='".__ROOT__."/admin.php/admin/booksList';</script>";
		}else{
			echo "<script type='text/javascript'>alert('删除成功');
			location.href='".__ROOT__."/admin.php/admin/booksList';</script>";	
			//echo $product->getLastSql();die();  //带参数时跳转的URL有问题
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
}