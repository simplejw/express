<?php
class ManageController extends Controller
{
	protected function beforeAction($action)
	{
		if (!isset(Yii::app()->session['id']))
		{
			$this->redirect('/manage/login');
			return false;
		}

		return parent::beforeAction($action);
	}
	
	
	/*
	 * 后台下单
	 */
	public function actionIndex()
	{
		$toWhere = '/manage/index/';
		$msg = '';
		$status = 'error';
		
		if(Yii::app()->request->getIsPostRequest())
		{
			$data = array(
				'order_sn' => trim(Yii::app()->request->getPost('order_sn', '')),
				'sender_realname' => trim(Yii::app()->request->getPost('sender_realname', '')),
				'sender_mobile' => trim(Yii::app()->request->getPost('sender_mobile', '')),
				'sender_postcode' => trim(Yii::app()->request->getPost('sender_postcode', '')),
				'sender_address' => trim(Yii::app()->request->getPost('sender_address', '')),
				'consignee_realname' => trim(Yii::app()->request->getPost('consignee_realname', '')),
				'consignee_mobile' => trim(Yii::app()->request->getPost('consignee_mobile', '')),
				'consignee_postcode' => trim(Yii::app()->request->getPost('consignee_postcode', '')),
				'consignee_address' => trim(Yii::app()->request->getPost('consignee_address', '')),
				'user_weight' => floatval(Yii::app()->request->getPost('user_weight', 0.0)),
				'shipping_weight' => floatval(Yii::app()->request->getPost('shipping_weight', 0.0)),
				'amount' => floatval(Yii::app()->request->getPost('amount', 0.0)),
				'note' => trim(Yii::app()->request->getPost('note', '')),
			);
			$model=new Orders;
			$model->attributes = $data;
			$model->order_status = 1;
			$model->shipping_status = 0;
			$model->add_time = strtotime("now");
			if($model->save())
			{
				$msg = '新增订单成功';
				$status = 'success';
			}
			else
			{
				$msg = '新增订单失败';
			}
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect($toWhere, true);
			//print_r($_POST);exit;
		}
		$this->render('index');
	}
	
	/*
	 * 后台订单管理
	 */
	public function actionOrders()
	{
		$condition = '';
		$params = array();
		//$condition = "order_status = :order_status";
		//$params = array(':order_status' => 1 );
		$total = Orders::model()->count($condition, $params);
		$pages = new CPagination($total);
		$pages->pageSize = PAGESIZE;

		$orders = Orders::model()->findAll(array(
			'order' => 'order_id desc',
	 		'offset' => $pages->currentPage * $pages->pageSize,
			'limit' => $pages->pageSize,
	 	));	
	 	
		$this->render('orders', array(
		'pages' => $pages,
		'orders' => $orders
		));
		
	}
	
	/*
	 * 寄件人管理
	 */
	public function actionSender($sender_id)
	{
		//print_r($sender_id);exit;
		$Sender=Sender::model()->findAll('sender_id=:sender_id', array(':sender_id'=>$sender_id));
		//print_r($Sender);exit;	

		$this->render('sender', array(
		'sender' => $Sender
		
		));
	}
	
	/*
	 * 收件人管理
	 */
	public function actionConsignee($consignee_id)
	{
		//print_r($consignee_id);exit;
		$Consignee=Consignee::model()->findAll('consignee_id=:consignee_id', array(':consignee_id'=>$consignee_id));
		//print_r($Consignee);exit;
		$this->render('consignee', array(
		'Consignee' => $Consignee
		
		));
	}
	
	/*
	 * 用户管理
	 */
	public function actionAccount()
	{
		$condition = '';
	 	$account_id = '';
	 	$params = array();
	 	
	 	if(Yii::app()->request->isPostRequest)
	 	{
	 		$account_id = intval(Yii::app()->request->getPost('id', 0));
	 		
	 		if(!empty($account_id))
	 		{
	 			$condition = 'account_id=:account_id';
	 			$params = array(':account_id'=>$account_id);
	 		}	
	 	}
	 	
	 	$total = Account::model()->count($condition, $params);
		$pages = new CPagination($total);
		$pages->pageSize = PAGESIZE; 
		
	 	$account = Account::model()->findAll(array(
	 		'order' => 'account_id desc',
	 		'condition' => $condition, 
	 		'params' => $params,
	 		'offset' => $pages->currentPage * $pages->pageSize,
			'limit' => $pages->pageSize,
	 	));
	 	
	 	$this->render('account', array(
		 	'pages' => $pages,
			'account' => $account,
			'account_id' => $account_id
			));
	}
	 
	/*
	* 订单物品信息
	*/
	public function actionOrderGoods($order_sn)
	{
		//print_r($order_sn);exit;
	  	$OrderGoods=OrderGoods::model()->findAll('order_sn=:order_sn', array(':order_sn'=>$order_sn));
	  	//print_r($OrderGoods);exit;
	  	$this->render('orderGoods', array(
		'ordergoods' => $OrderGoods
		
		));
	}
	  
	/*
	 * 订单操作日志
	*/
	public function actionOrderLog($order_id)
	{
		$condition = 'order_id=:order_id';
	 	$params = array(':order_id'=>$order_id);
	 	$total = OrderLog::model()->count($condition, $params);
		$pages = new CPagination($total);
		$pages->pageSize = PAGESIZE; 
	 	
	   	$OrderLog=OrderLog::model()->findAll(array(
			'condition' => $condition, 
	 		'params' => $params,
			'offset' => $pages->currentPage * $pages->pageSize,
			'limit' => $pages->pageSize
			));
	   	
	   	$this->render('orderLog', array(
		'OrderLog' => $OrderLog,
		'pages' => $pages,
		
		));
	}
	   
	/*
	 * 编辑用户信息
	 */
	public function actionEdit($account_id)
	{
		$toWhere = '/manage/edit/' . $account_id;
		$msg = '';
		$status = 'error';
			
		$Account = Account::model()->findByPk($account_id);
	    	
	    if(empty($Account))
		{
			Yii::app()->end();
		}
    	    //print_r($Account);exit;
    	    if(Yii::app()->request->getIsPostRequest())
    	    {
    		$data = array(
				'email' => trim(Yii::app()->request->getPost('email', '')),
				'mobile' => trim(Yii::app()->request->getPost('mobile', '')),
				'status' => intval(Yii::app()->request->getPost('status', '')),
			);
			
			$Account->attributes = $data;
			
			if($Account->save())
			{
				$toWhere = '/manage/account';
				$msg = '编辑成功';
				$status = 'success';
				
			}
			else
			{
				$msg = '编辑失败';
			}
			
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect($toWhere, true);
			
    	    }
    	
    	    $this->render('edit', array(
			'Account' => $Account,
		));
	}
	    
	/*
	 * 修改密码
	 */
	public function actionPwd()
	{
		$toWhere = '/manage/pwd';
		$msg = '';
		$status = 'error';
			
		$condition = 'username=:username';
 		$params = array(':username'=>trim(Yii::app()->session['name']));
			
    	        $Admin = Admin::model()->find(array(
			'condition' => $condition, 
			'params' => $params,
		));
	    	
	        if(empty($Admin))
		{
			Yii::app()->end();
		}
	    	
    	        if(Yii::app()->request->getIsPostRequest())
    	        {
    		        $data = array(
				'username' => trim(Yii::app()->request->getPost('username', '')),
				'oldpassword' => trim(Yii::app()->request->getPost('oldpassword', '')),
				'password' => md5(trim(Yii::app()->request->getPost('password', ''))),
				'repassword' => md5(trim(Yii::app()->request->getPost('repassword', ''))),
			);
			//print_r($data);exit;
			if(!empty($data) && md5($data['oldpassword']) == $Admin['password'] && $data['username']==$Admin['username'])
			{
				if($data['password'] == $data['repassword'])
				{
					$Admin->attributes = $data;
					$Admin->save();
					$toWhere = '/manage/login';
					$msg = '修改成功';
					$status = 'success';
				}
				else
				{
					$msg = '确认密码不一致';
				}
			
			}
			else
			{
				$msg = '旧密码或用户名错误';
			}
		
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect($toWhere, true);
			
    	        }
    	
    	        $this->render('pwd', array(
			'Admin' => $Admin,
		));
	}
	     
	/*
	 * 收件人信息列表
	 */
	      
	public function actionConsigneeID()
	{
		$criteria = new CDbCriteria; 
				
  		$realname = trim(Yii::app()->request->getQuery('realname', ''));
		$mobile = trim(Yii::app()->request->getQuery('mobile', ''));
		$idcard = trim(Yii::app()->request->getQuery('idcard', ''));
	        //print_r($idcard);exit;  		
		if (!empty($realname))
		{
			$criteria->addSearchCondition('realname', $realname);
		}
		if (!empty($mobile))
		{
			$criteria->addCondition("mobile = :mobile"); 
			$criteria->params[':mobile'] = $mobile;
		}
		if (!empty($idcard))
		{
			$criteria->addCondition("idcard = :idcard"); 
			$criteria->params[':idcard'] = $idcard;
		}
			
			$total = Consignee::model()->count($criteria);  
			$pages = new CPagination($total);
			$pages->pageSize = PAGESIZE;
			$pages->applyLimit($criteria);
			
			$criteria->order = 'consignee_id desc';
			$Consignee = Consignee::model()->findAll($criteria);	
				
			$this->render('consigneeID', array(
				'realname' => $realname,
				'mobile' => $mobile,
				'idcard' => $idcard,
				'pages' => $pages,
				'Consignee' => $Consignee 
			));
	      	
	}
	
	/*
	 * 删除收件人信息
	 */
	public function actionDelinfo($order_id)
	{
		$msg = '';
		$status = 'error';
		
		$consignee=Consignee::model()->findByPk($order_id);
		
		if(!empty($consignee))
		{
			if($consignee->delete())
			{
				if(!empty($consignee->id_fg))
				{
					$pic_fg = Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $consignee->id_fg  ;
					unlink($pic_fg);
				}elseif(!empty($consignee->id_bg))
				{
					$pic_bg = Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $consignee->id_bg  ;
					unlink($pic_bg);
				}
				
				$msg = '删除成功';
				$status = 'success';
			}
			else
			{
				$msg = '删除失败';
				$status = 'error';
			}
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect('/manage/consigneeID', true);

		}
		
	}
	      
	/*
	 * 处理物流
	 */
	 public function actionProcess($order_id)
	 {
	 	$orders = Orders::model()->find('order_id = :order_id', array(':order_id' => $order_id));
		
		if(empty($orders))
		{
			$this->redirect('/manage/orders');
		}	
		
		if(Yii::app()->request->getIsPostRequest())
		{
			if($orders->shipping_status == 0)
		 	{
				$orders->shipping_status = 1;
				$orders->save();
				$this->orderLog($order_id, 1);
		 	}elseif ($orders->shipping_status == 1)
		 	{
		 		$orders->shipping_status = 2;
		 		$orders->save();
		 		$this->orderLog($order_id, 2);
		 	}elseif($orders->shipping_status == 2)
		 	{
		 		$orders->shipping_status = 3;
		 		$orders->save();
		 		$this->orderLog($order_id, 3);
		 	}elseif($orders->shipping_status == 3)
		 	{
		 		$orders->shipping_status = 4;
		 		$orders->save();
		 		$this->orderLog($order_id, 4);
		 	}elseif($orders->shipping_status == 4 || $orders->shipping_status == 5)
		 	{
		 		$ems_sn = trim(Yii::app()->request->getPost('ems_sn', ''));
		 		$orders->ems_sn = $ems_sn;
		 		$orders->shipping_status = 6;
		 		$orders->save();
		 		$this->orderLog($order_id, 6);
		 	}elseif($orders->shipping_status == 6 || $orders->shipping_status == 7)
		 	{
		 		$orders->shipping_status = 8;
		 		$orders->save();
		 		$this->orderLog($order_id, 8);
		 	}
		}
	 	
	 	$this->render('process', array(
	 	'Orders' => $orders
	 	));
	 }
	 
	
	/*
	 * 新闻列表
	 */
	public function actionNews()
	{
		$News = News::model()->findAll(array(
			'order' => 'news_id desc',
		));
		
		$pages = new CPagination($News);
		$pages->pageSize = PAGESIZE;
		
		$this->render('news', array(
			'News' => $News,
			'offset' => $pages->currentPage * $pages->pageSize,
			'limit' => $pages->pageSize,
		));
	}
	
	/*
	 * 新闻增加
	 */
	public function actionAddNews()
	{
		$msg = '';
		$status = 'error';
		
		if(Yii::app()->request->getIsPostRequest())
		{
			$data = array(
				'title' => trim(Yii::app()->request->getPost('title', '')),
				'content' => trim(Yii::app()->request->getPost('content', '')),
			);
			//print_r($data);exit;
			$model = new News;
			$model->attributes = $data;
			if($model->save())
			{
				$msg = '新增成功';
				$status = 'success';
			}
			else
			{
				$msg = '新增失败';
			}
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect('/manage/news', true);
		}
		$this->render('addnews');
	}
	
	/*
	 * 新闻修改
	 */
	public function actionEditNews($news_id)
	{
		$msg = '';
		$status = 'error';
		
		$News = News::model()->findByPk($news_id);
		//print_r($News);exit;
		if(Yii::app()->request->getIsPostRequest())
		{
			$data = array(
				'title' => trim(Yii::app()->request->getPost('title', '')),
				'content' => trim(Yii::app()->request->getPost('content', '')),
			);
			
			$News->attributes = $data;
			if($News->save())
			{
				$msg = '新增成功';
				$status = 'success';
			}
			else
			{
				$msg = '新增失败';
			}
			Yii::app()->user->setFlash($status, $msg);
			$this->redirect('/manage/news', true);
		}
		
		$this->render('addnews', array(
			'News' => $News
		));
	}
	
	/*
	 * 新闻删除
	 */
	public function actionDelNews($news_id)
	{
		$msg = '';
		$status = 'error';
		
		$News = News::model()->findByPk($news_id);
		if($News->delete())
		{
			$msg = '删除成功';
			$status = 'success';
		}
		else
		{
			$msg = '删除失败';
		}
		Yii::app()->user->setFlash($status, $msg);
		$this->redirect('/manage/news', true);
	}
	      
      /*
       * 导出证件正面
       */
       /*public function actionDownload($consignee_id)
		{	
			$Consignee = Consignee::model()->findByPk($consignee_id);
			$file = $Consignee['id_fg'];
			$new_name = $Consignee['realname'];
			if (!empty($file))
			{	
				$file_url = Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $file;
				$fileinfo = pathinfo($file_url);
				$file_name=basename($file_url);
			    $file_type=explode('.',$file_url);
			    $file_type=$file_type[count($file_type)-1];
			    $file_name = $new_name.'-1.'.$file_type;
			    //print_r($file_name);exit;
			    $file_type=fopen($file_url,'r'); //打开文件
			    //输入文件标签
			    header("Content-type: application/octet-stream");
			    header("Accept-Ranges: bytes");
			    header("Accept-Length: ".filesize($file_url));
			    header("Content-Disposition: attachment; filename=".$file_name);
			    //输出文件内容
			    echo fread($file_type,filesize($file_url));
			    fclose($file_type);
			}
		}*/
			
			
	/*
	 * 导出证件反面
	 */
	/*public function actionDownloadBG($consignee_id)
	{	
		$Consignee = Consignee::model()->findByPk($consignee_id);
		$file = $Consignee['id_bg'];
		$new_name = $Consignee['realname'];
		if (!empty($file))
		{	
			$file_url = Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $file;
			$fileinfo = pathinfo($file_url);
			$file_name=basename($file_url);
		    $file_type=explode('.',$file_url);
		    $file_type=$file_type[count($file_type)-1];
		    $file_name = $new_name.'-2.'.$file_type;
		    //print_r($file_name);exit;
		    $file_type=fopen($file_url,'r'); //打开文件
		    //输入文件标签
		    header("Content-type: application/octet-stream");
		    header("Accept-Ranges: bytes");
		    header("Accept-Length: ".filesize($file_url));
		    header("Content-Disposition: attachment; filename=".$file_name);
		    //输出文件内容
		    echo fread($file_type,filesize($file_url));
		    fclose($file_type);
		}
	}*/

	/*
	 * 合并图片并下载
	 */
	 public function actionMergerImg($consignee_id)
	 {	
		$Consignee = Consignee::model()->findByPk($consignee_id);
		$allowtype = array('jpg', 'jpeg', 'png', 'gif');
		if(!empty($Consignee->id_fg) && !empty($Consignee->id_bg))
		{
			$type_fg=explode('.',$Consignee['id_fg']);
			$type_bg=explode('.',$Consignee['id_bg']);
		}
		else
		{
			Yii::app()->user->setFlash('error', '图片不存在，请上传。');
			$this->redirect('/manage/consigneeID', true);
		}

		//print_r($type_fg[1]);exit;
		if(in_array($type_fg[1], $allowtype) && in_array($type_bg[1], $allowtype))
		{
			$imgs = array(
				'dst' => Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $Consignee['id_fg'],
				'src' => Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . $Consignee['id_bg']
			);
			list($dst_width, $dst_height) = getimagesize($imgs['dst']);
			list($src_width, $src_height) = getimagesize($imgs['src']);
			if($dst_width>=$src_width)
			{
				$max_width = $dst_width;
			}
			else
			{
				$max_width = $src_width;
			}
			if($dst_height>=$src_height)
			{
				$max_height = $dst_height;
			}
			else
			{
				$max_height = $src_height;
			}
			//list($max_width, $max_height) = getimagesize($imgs['dst']);
			$dests = imagecreatetruecolor($max_width, 2*$max_height);
			if($type_fg[1] == 'png')
			{
				$dst_im = imagecreatefrompng($imgs['dst']);
			}
			elseif($type_fg[1] == 'gif')
			{
				$dst_im = imagecreatefromgif($imgs['dst']);
			}
			else
			{
				$dst_im = imagecreatefromjpeg($imgs['dst']);
			}

			imagecopy($dests,$dst_im,0,0,0,0,$max_width,$max_height);
			imagedestroy($dst_im);

			if($type_bg[1] == 'png')
			{
				$src_im = imagecreatefrompng($imgs['src']);
			}
			elseif($type_bg[1] == 'gif')
			{
				$src_im = imagecreatefromgif($imgs['src']);
			}
			else
			{
				$src_im = imagecreatefromjpeg($imgs['src']);
			}

			$src_info = getimagesize($imgs['src']);
			imagecopy($dests,$src_im,0,$max_height,0,0,$src_info[0],$src_info[1]);
			imagedestroy($src_im);

			$file_path = Yii::getPathOfAlias('webroot.upload') . DIRECTORY_SEPARATOR . '/0/' . $Consignee['realname'] .'.' . $type_fg[1];
			imagejpeg($dests,$file_path);
			//print_r($file_path);exit;
			$fileinfo = pathinfo($file_path);
			$file_name=basename($file_path);
		        $file_type=explode('.',$file_path);
		        $file_type=$file_type[count($file_type)-1];
		        $file_name = $Consignee['realname'] . '.' . $file_type;

			$file_type=fopen($file_path,'r'); //打开文件
			//输入文件标签
		        header("Content-type: application/octet-stream");
		        header("Accept-Ranges: bytes");
		        header("Accept-Length: ".filesize($file_path));
		        header("Content-Disposition: attachment; filename=".$file_name);
		        //输出文件内容
		        echo fread($file_type,filesize($file_path));
		        fclose($file_type);

		        //header("Content-type: image/jpeg");
			//imagejpeg($dests);
		}
		else
		{
			Yii::app()->user->setFlash('error', '图片格式不正确，无法导出，重新上传正确格式照片。');
			$this->redirect('/manage/consigneeID', true);
		}
	 }
	
	
}
