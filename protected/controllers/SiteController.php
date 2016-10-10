<?php
class SiteController extends Controller
{
	/**
	 * 首页
	 */
	public function actionIndex()
	{
		$data = News::model()->findAll(array(
			'order' => 'news_id desc'
		));
		//print_r($data);
		$this->render('index', array(
		'data' => $data,
		));
	}
	

	/**
	 * 跟踪订单
	 */
	public function actionTrack()
	{
		$result = array();
		$date = array();
		
		if (Yii::app()->request->isPostRequest)
		{
			$date = Yii::app()->request->getPost('date',array());
			
			if(!empty($date['captcha'])&&!empty($date['track'])&&$date['captcha']==Yii::app()->session['captcha'])
			{
				$tracks = explode(',',$date['track'],10);
				
				foreach ($tracks as $k => $v)
				{	
					$result[$k]=array();
					foreach(Orders::model()->findAll('order_sn=:order_sn',array(':order_sn'=>$v)) as $track)
					{
						$result[$k]=$track;
					}
				}	
			}
		}
		
		$this->render('track', array(
			'date' => $date,
			'result'=>$result,
		));
	}
	/*
	 * 判断证件照是否存在接口
	 */
	public function actionAjaxup()
	{
		$result['status'] = true;	
		
		if (Yii::app()->request->isPostRequest)
		{
			$realname = trim(Yii::app()->request->getPost('realname', 'ww'));
			$mobile = trim(Yii::app()->request->getPost('mobile','2233'));
			$idcard = trim(Yii::app()->request->getPost('idcard','iioo'));
			//print_r($realname);exit;
			$ex_idcard = Consignee::model()->find('idcard=:idcard', array(':idcard'=>$idcard));
			$ex_realmo = Consignee::model()->find('mobile = :mobile and realname = :realname', array(':mobile'=>$mobile, ':realname'=>$realname));
			
			if($ex_idcard !== null)
			{
				$result['bg_img'] = $ex_idcard->id_bg;
				$result['fg_img'] = $ex_idcard->id_fg;
				echo CJSON::encode($result);
			}
			
			if($ex_realmo !== null)
			{
				$result['bg_img'] = $ex_realmo->id_bg;
				$result['fg_img'] = $ex_realmo->id_fg;
				echo CJSON::encode($result);
			}

		}
	
	}
	
	/*
	 * 上传证件
	 */
	public function actionUploadID()
	{
			
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data',array());
			//print_r(count($data));exit;
			$exists_realmo = Consignee::model()->exists('mobile = :mobile and realname = :realname', array(':mobile' => $data['mobile'], ':realname'=>$data['realname']));
			$exists_idcard = Consignee::model()->exists('idcard = :idcard', array(':idcard' => $data['idcard']));
			//print_r($exists_realmo);exit;
			if(count($data) == 5)
			{
				if($exists_realmo >=1)
				{
					Consignee::model()->updateAll(array('idcard' => $data['idcard'], 'id_fg' => $data['id_fg'], 'id_bg' => $data['id_bg'], ),
					'mobile = :mobile and realname = :realname', array(':mobile' => $data['mobile'], ':realname' => $data['realname']));
				}
				else
				{
					if($exists_idcard >= 1)
					{
						Consignee::model()->updateAll(array('realname' => $data['realname'],
						'mobile' => $data['mobile'], 'id_fg' => $data['id_fg'], 'id_bg' => $data['id_bg'], ),
						'idcard = :idcard', array(':idcard' => $data['idcard']));
					}
					else
					{
						$arr = array(
						"add_time"=>time(),
						"is_default"=>0,
						"account_id"=>Yii::app()->session['uid'],
						);
						$data = array_merge($data,$arr);
						
						$model= new Consignee();
						$model->attributes = $data;
						$model->save();
					}
	
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '信息不全。');
			}
		
		}
		$this->render('upload');
	}
	
	/**
	 * 邮寄指南
	 */
	public function actionGuide()
	{
		$this->render('guide');
	}
	
	/**
	 * 联系我们
	 */
	public function actionContact()
	{
		$this->render('contact');
	}
	
	/**
	 * 会员注册
	 */
	public function actionRegister()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data', array());
			
			$ev = new CEmailValidator;
			if (!empty($data) && isset($data['email']) && $ev->validateValue($data['email']) && !empty($data['mobile']) && !empty($data['password']))
			{
				
				if (!Account::model()->exists('email = :email', array(':email' => $data['email'])))
				{
					unset($data['apassword']);
					$data['password'] = md5($data['password']);
					$data['status'] = 1;
					$data['add_time'] = time();
					
					$account = new Account;
					$account->attributes = $data;
					
					if ($account->save())
					{
						Yii::app()->session['uid'] = $account->account_id;
						Yii::app()->session['name'] = $data['email'];
						
						$this->redirect('/');
					}
					else
					{
						Yii::app()->user->setFlash('error', '系统错误，请稍后再试。');
					}
				}
				else
				{
					Yii::app()->user->setFlash('error', '此邮箱已注册，请更换邮箱或者登录。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请输入正确的邮箱、手机、密码。');
			}
		}
		
		$this->render('register');
	}
	
	/**
	 * 验证码
	 */
	public function actionCaptcha()
	{
		$width = Yii::app()->params['captcha']['width'];
        $height = Yii::app()->params['captcha']['height'];
        $padding = Yii::app()->params['captcha']['padding'];
        $offset = Yii::app()->params['captcha']['offset'];
        $colors = Yii::app()->params['captcha']['colors'];

        $code = Helper::generateVerifyCode(true,4);
        Yii::app()->session['captcha'] = $code;
        $this->writeCookie('captcha', $code, true);
        $image = imagecreatetruecolor($width, $height);
        $backColor = imagecolorallocate($image, (int) (0xFFFFFF % 0x1000000 / 0x10000), (int) (0xFFFFFF % 0x10000 / 0x100), 0xFFFFFF % 0x100);
        imagefilledrectangle($image, 0, 0, $width, $height, $backColor);
        imagecolordeallocate($image, $backColor);

        $length = strlen($code);

        $fontFile = Yii::getPathOfAlias('system.web.widgets.captcha.') . DIRECTORY_SEPARATOR . 'Koshgarian.ttf';
        $box = imagettfbbox(30, 0, $fontFile, $code);
        $w = $box[4] - $box[0] + $offset * ($length - 1);
        $h = $box[1] - $box[5];

        $scale = min(($width - $padding * 2) / $w, ($height - $padding * 2) / $h);

        $x = 10;
        $y = round($height * 27 / 40);

        for ($i = 0; $i < $length; ++$i) 
        {
            $color = $colors[rand(0, count($colors) - 1)];
            $foreColor = imagecolorallocate($image, (int) ($color % 0x1000000 / 0x10000), (int) ($color % 0x10000 / 0x100), $color % 0x100);

            $fontSize = (int) (rand(24, 30) * $scale * 0.8);
            $angle = rand(-10, 10);
            $letter = $code[$i];
            $box = imagettftext($image, $fontSize, $angle, $x, $y, $foreColor, $fontFile, $letter);
            $x = $box[2] + $offset;
        }

        imagecolordeallocate($image, $foreColor);

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
        header("Content-Type: image/png");
        imagepng($image);
        imagedestroy($image);
	}
	
	/**
	 * 会员登录
	 */
	public function actionLogin()
	{
		if (isset(Yii::app()->session['uid']))
		{
			$this->redirect('/');
		}
		
		$next = Yii::app()->request->getQuery('next', '/');
		
		if (Yii::app()->request->isPostRequest)
		{
			$data = Yii::app()->request->getPost('data', array());
			
			$ev = new CEmailValidator;
			if (!empty($data) && isset($data['email']) && $ev->validateValue($data['email']) && !empty($data['password']))
			{
				$account = Account::model()->find('email = :email', array(':email' => $data['email']));
				
				if (!empty($account))
				{
					if ($account->password == md5($data['password']))
					{
						Yii::app()->session['uid'] = $account->account_id;
						Yii::app()->session['name'] = $data['email'];
						
						$this->redirect($next);
					}
					else
					{
						Yii::app()->user->setFlash('error', '密码不正确。');
					}
				}
				else
				{
					Yii::app()->user->setFlash('error', '此账户不存在。');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', '请输入正确的邮箱、密码。');
			}
		}
		
		$this->render('login', array(
			'next' => $next,
		));
	}
	
	/**
	 * 重设密码
	 */
	public function actionResetPwd()
	{
		
	}
	
	/**
	 * 退出登录
	 */
	public function actionLogout()
	{
		Yii::app()->session->clear();
		$this->redirect('/login');
	}
	
	/**
	 * 错误处理
	 */
	public function actionError()
	{
		
	}
	
	/**
	 * 后台登陆界面
	 */
	public function actionAdminLogin()
	{
		$msg = '';
		$status = 'error';
		$toWhere = '/manage/login';
		
		
		if(Yii::app()->request->getIsPostRequest())
		{
			$username = trim(Yii::app()->request->getPost('username', ''));
			$password = trim(Yii::app()->request->getPost('password', ''));

			if($username && $password)
			{
				$Admin = Admin::model()->find('username = :username', array(':username' => $username));

				if(!empty($Admin))
				{
					if(md5($password) == $Admin->password )
					{
						Yii::app()->session['id'] = $Admin->admin_id;
						Yii::app()->session['name'] = $Admin->username;
						$status = 'success';
						$msg = '登陆成功';
						$toWhere = '/manage';
					}
					else
						$msg = '密码不正确';
				}
				else
					$msg = '用户不存在';
			}
			else
				$msg = '请输入用户名或密码';

			Yii::app()->user->setFlash($status, $msg);
			$this->redirect($toWhere, true);
		}
		
		$this->render('adminlogin');
	}
	

	
}
?>