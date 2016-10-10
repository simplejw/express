<?php
class Controller extends CController
{	
		/**
	 * 记录订单操作状态
	 * 
	 * @access protected
	 * @param  string $order_sn
	 * @param  integer $status
	 * @return void;
	 */
	protected function orderLog($order_id, $action)
	{
		$sql = "replace into order_log (order_id, action, add_time) values (:order_id, :action, :add_time)";
		Yii::app()->db->createCommand($sql)->bindValue(":order_id", $order_id)->bindValue(":action", $action)->bindValue(":add_time", time())->execute();
	}
	
	public function init()
	{

	}
	
	public function render($view, $data = null, $return = false, $options = null)
	{
		$output = parent::renderPartial($view, $data, true);		
		if ($return) return $output;
		else echo $output;
	}
	
	private function domain()
	{
		$hostinfo = parse_url(Yii::app()->request->getHostInfo());
		$host = $hostinfo['host'];
		
		$_fdot = strpos($host, '.');
		if ($_fdot)
		{
			$host = substr($host, $_fdot + 1);
		}
		
		return $host;
	}
	
	/** 写cookie
	 * @access public
	 * @param  string $key
	 * @param  string $value
	 * @param  bool  $encode
	 * @param  bool  $httpOnly
	 * @param  integer $expire
	 * @return void
	 */
	public function writeCookie($key, $value, $encode = false, $httpOnly = true, $expire = 0)
	{
		if ($encode)
		{
			$value = Auth::authcode($value, Yii::app()->params['hashkey']);
		}		
		
		$cookie = new CHttpCookie($key, $value);
		$cookie->httpOnly = $httpOnly;
		$cookie->domain = $this->domain();
		
		if ($expire > 0) $cookie->expire = Helper::gmtime() + $expire;
		
		Yii::app()->request->cookies[$key] =  $cookie;
	}
	
	/**
	 * 读cookie
	 * @access public
	 * @param  string $key
	 * @param  bool  $encode
	 * @return void
	 */
	public function readCookie($key, $encode = false)
	{
		$value = '';
		
		if (Yii::app()->request->cookies->contains($key))
		{
			$value = Yii::app()->request->cookies[$key]->value;
			if ($encode)
			{
				$value = Auth::authcode($value, Yii::app()->params['hashkey'], false);
			}
		}
		
		return $value;
	}
	
	/**
	 * 删除cookie
	 * @access public
	 * @param  string $key
	 * @return void
	 */
	public function dropCookie($key)
	{
		Yii::app()->request->cookies->remove($key, array('domain' => $this->domain()));
	}
	
	/**
	 * 删除所有cookie
	 * @access public
	 * @return void
	 */
	public function dropAllCookie()
	{
		$lang = Yii::app()->language;
		
		foreach (Yii::app()->request->cookies as $cookie)
		{
			$this->dropCookie($cookie->name);
		}
	}
	
	
}