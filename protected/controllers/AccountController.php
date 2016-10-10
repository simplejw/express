<?php
class AccountController extends Controller
{
	protected function beforeAction($action)
	{
		if (!isset(Yii::app()->session['uid']))
		{
			$this->redirect('/login?next=' . Yii::app()->request->getUrl());
			return false;
		}

		return parent::beforeAction($action);
	}
	
	/**
	 * 我的账户
	 */
	public function actionIndex()
	{
		$this->render('index');
	}
	
	/**
	 * 修改密码
	 */
	public function actionPwd()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$opassword = Yii::app()->request->getPost('opassword', '');
			$password = Yii::app()->request->getPost('password', '');
			
			$account = Account::model()->findByPk(Yii::app()->session['uid']);
			
			if (!empty($account))
			{
				if ($account->password == md5($opassword))
				{
					$account->password = md5($password);
					
					if ($account->save())
					{
						$this->redirect('/logout');
					}
					else
					{
						Yii::app()->user->setFlash('error', '系统出错，请稍后再试。');
					}
				}
				else
				{
					Yii::app()->user->setFlash('error', '原密码不正确。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '此账户不存在。');
			}
		}
		
		$this->render('pwd');
	}
	
	/**
	 * 寄件人
	 */
	public function actionSender()
	{
		$sender_id = intval(Yii::app()->request->getQuery('sender_id', 0));
		$sender = Sender::model()->find('sender_id = :sender_id and account_id = :account_id', array(':sender_id' => $sender_id, ':account_id' => Yii::app()->session['uid']));
		
		$this->render('sender', array(
			'sender' => $sender,
			'senders' => Sender::model()->findAll('account_id = :account_id', array(':account_id' => Yii::app()->session['uid'])),
		));
	}
	
	/**
	 * 操作寄件人
	 */
	public function actionDoneSender()
	{
		$sender_id = intval(Yii::app()->request->getQuery('sender_id', 0));
		$sender = Sender::model()->find('sender_id = :sender_id and account_id = :account_id', array(':sender_id' => $sender_id, ':account_id' => Yii::app()->session['uid']));
		
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data', array());

			if (!empty($data) && !empty($data['realname']) && !empty($data['mobile']) && !empty($data['postcode']) && !empty($data['address']))
			{
				if (empty($sender)) $sender = new Sender;
				$sender->attributes = $data;
				$sender->account_id = Yii::app()->session['uid'];
				$sender->is_default = 1;
				
				if ($sender->save())
				{
					Sender::model()->updateAll(array('is_default' => 0), 'sender_id != :sender_id and account_id = :account_id', array(':sender_id' => $sender->sender_id, ':account_id' => Yii::app()->session['uid']));
					Yii::app()->user->setFlash('ok', '操作成功。');
				}
				else
				{
					Yii::app()->user->setFlash('error', '系统出错，请稍后再试。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请输入寄件人的姓名、电话、邮编、地址。');
			}
		}
		else
		{
			if (!empty($sender))
			{
				$sender->is_default = 1;
				if ($sender->save())
				{
					Sender::model()->updateAll(array('is_default' => 0), 'sender_id != :sender_id and account_id = :account_id', array(':sender_id' => $sender->sender_id, ':account_id' => Yii::app()->session['uid']));
					Yii::app()->user->setFlash('ok', '操作成功。');
				}
				else
				{
					Yii::app()->user->setFlash('error', '系统出错，请稍后再试。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请先选择寄件人。');
			}
		}
		
		$this->redirect('/account/sender');
	}
	
	/**
	 *  删除寄件人
	 */
	public function actionDelSender()
	{
		$sender_id = intval(Yii::app()->request->getQuery('sender_id', 0));
		$sender = Sender::model()->find('sender_id = :sender_id and account_id = :account_id', array(':sender_id' => $sender_id, ':account_id' => Yii::app()->session['uid']));
		
		if (!empty($sender))
		{			
			$sender->delete();
			Yii::app()->user->setFlash('ok', '操作成功。');
		}
		else
		{
			Yii::app()->user->setFlash('error', '请先选择寄件人。');
		}
		
		$this->redirect('/account/sender');
	}
	
	/**
	 * 收件人
	 */
	public function actionConsignee()
	{
		$consignee_id = intval(Yii::app()->request->getQuery('consignee_id', 0));
		$consignee = Consignee::model()->find('consignee_id = :consignee_id and account_id = :account_id', array(':consignee_id' => $consignee_id, ':account_id' => Yii::app()->session['uid']));
		
		$this->render('consignee', array(
			'consignee' => $consignee,
			'consignees' => Consignee::model()->findAll('account_id = :account_id', array(':account_id' => Yii::app()->session['uid'])),
		));
	}
	
	/**
	 * 操作收件人
	 */
	public function actionDoneConsignee()
	{
		$consignee_id = intval(Yii::app()->request->getQuery('consignee_id', 0));
		$consignee = Consignee::model()->find('consignee_id = :consignee_id and account_id = :account_id', array(':consignee_id' => $consignee_id, ':account_id' => Yii::app()->session['uid']));
		
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data', array());
			
			if (!empty($data) && !empty($data['realname']) && !empty($data['mobile']) && !empty($data['postcode']) && !empty($data['address']) && !empty($data['idcard']))
			{				
				$id_fg = CUploadedFile::getInstanceByName('id_fg');
				
				if (!empty($id_fg))
				{
					$ext = strtolower($id_fg->getExtensionName());
					
					if (in_array($ext, Yii::app()->params['allowtype']))
					{
						$filename = time();
						$filedir = $filename % 10;
						$uploaddir = Yii::getPathOfAlias('webroot.upload.' . $filedir) . DIRECTORY_SEPARATOR;
						$filename = md5($id_fg->getName()) . '_' . $filename;
						
						$id_fg->saveAs($uploaddir . $filename . '.' . $ext);
						
						$data['id_fg'] = $filedir . '/' . $filename . '.' . $ext;
					}
				}
				
				$id_bg = CUploadedFile::getInstanceByName('id_bg');
				
				if (!empty($id_bg))
				{
					$ext = strtolower($id_bg->getExtensionName());
					
					if (in_array($ext, Yii::app()->params['allowtype']))
					{
						$filename = time();
						$filedir = $filename % 10;
						$uploaddir = Yii::getPathOfAlias('webroot.upload.' . $filedir) . DIRECTORY_SEPARATOR;
						$filename = md5($id_bg->getName()) . '_' . $filename;
						
						$id_bg->saveAs($uploaddir . $filename . '.' . $ext);
						
						$data['id_bg'] = $filedir . '/' . $filename . '.' . $ext;
					}
				}
				
				if (empty($consignee)) $consignee = new Consignee;
				$consignee->attributes = $data;
				$consignee->account_id = Yii::app()->session['uid'];
				$consignee->is_default = 1;
				
				
				if ($consignee->save())
				{
					Consignee::model()->updateAll(array('is_default' => 0), 'consignee_id != :consignee_id and account_id = :account_id', array(':consignee_id' => $consignee->consignee_id, ':account_id' => Yii::app()->session['uid']));
					Yii::app()->user->setFlash('ok', '操作成功。');
				}
				else
				{
					Yii::app()->user->setFlash('error', '系统出错，请稍后再试。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请输入收件人的姓名、电话、邮编、地址、身份证信息。');
			}
		}
		else
		{
			if (!empty($consignee))
			{
				$consignee->is_default = 1;
				if ($consignee->save())
				{
					Consignee::model()->updateAll(array('is_default' => 0), 'consignee_id != :consignee_id and account_id = :account_id', array(':consignee_id' => $consignee->consignee_id, ':account_id' => Yii::app()->session['uid']));
					Yii::app()->user->setFlash('ok', '操作成功。');
				}
				else
				{
					Yii::app()->user->setFlash('error', '系统出错，请稍后再试。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请先选择收件人。');
			}
		}
		
		$this->redirect('/account/consignee');
	}
	
	/**
	 * 删除收件人
	 */
	public function actionDelConsignee()
	{
		$consignee_id = intval(Yii::app()->request->getQuery('consignee_id', 0));
		$consignee = Consignee::model()->find('consignee_id = :consignee_id and account_id = :account_id', array(':consignee_id' => $consignee_id, ':account_id' => Yii::app()->session['uid']));
		
		if (!empty($consignee))
		{			
			$consignee->delete();
			Yii::app()->user->setFlash('ok', '操作成功。');
		}
		else
		{
			Yii::app()->user->setFlash('error', '请先选择收件人。');
		}
		
		$this->redirect('/account/consignee');
	}
	
	/**
	 * 我的包裹
	 */
	public function actionOrder()
	{
		$this->render('order');
	}
	
	/**
	 * 在线下单
	 */
	public function actionAddOrder()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data', array());
			$goods_name = Yii::app()->request->getPost('goods_name', array());
			$amount = Yii::app()->request->getPost('amount', array());
			$goods_number = Yii::app()->request->getPost('goods_number', array());
			
			if (!empty($data) && !empty($goods_name))
			{
				
			}
			
			
		}
	
		$this->render('order_add', array(
			'senders' => Sender::model()->findAll('account_id = :account_id', array(':account_id' => Yii::app()->session['uid'])),
			'consignees' => Consignee::model()->findAll('account_id = :account_id', array(':account_id' => Yii::app()->session['uid'])),
		));
	}
}
?>
