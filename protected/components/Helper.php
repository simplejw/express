<?php
class Helper
{
	/**
	 * 对订单按照金额排序
	 * 
	 * @access public
	 * @param  array $po
	 * @param  array $no
	 * 
	 * @return integer
	 */
	public static function sortOrder($po, $no)
	{
		if ($po['order_amount'] == $no['order_amount']) return 0;
		
		return ($po['order_amount'] < $no['order_amount']) ? 1 : -1;
	}
	
	/**
	 * 标签排序
	 * 
	 * @access public
	 * 
	 * @param array $pt
	 * @param array $nt
	 * 
	 * @return integer
	 */
	public static function sortTag($pt, $nt)
	{
		if ($pt['sort_order'] == $nt['sort_order']) return 0;
		
		return ($pt['sort_order'] < $nt['sort_order']) ? -1 : 1;
	}
	
	/**
	 * 生成随机码
	 * 
	 * @access public
	 * @param  integer $length
	 * @return string
	 */
	public static function generateVerifyCode($number = false, $length = 5)
	{
		$letters = 'bcdfghjklmnpqrstvwxyz123456789';
		$vowels = 'aeiou';
		$code = '';
			
		if ($number)
		{
			for($i = 0; $i < $length; $i++) {
				$code .= mt_rand(0, 9);
			}
		}
		else
		{
			for($i = 0; $i < $length; ++$i)
			{
				if($i % 2 && mt_rand(0,10) > 2 || !($i % 2) && mt_rand(0,10) > 9)
					$code.=$vowels[mt_rand(0,4)];
				else
					$code.=$letters[mt_rand(0,29)];
			}
		}
		
		return $code;
	}
	
	/**
	 * 模糊字符串
	 * @access public
	 * @param string $string
	 * @return string
	 */
	public static function breviary($string)
	{
		$_str = '';
		$pos = 6;
		$_suf = '';
		
		if ($pos === false) $_str = $string;
		else
		{
			$_str = substr($string, 0, $pos);
			$_suf = substr($string, $pos);
		}
		
		$avg = round(strlen($_str) / 3);
		return substr($_str, 0, $avg) . str_repeat('*', $avg) . substr($_str, $avg * 2) . $_suf;
	}
	
	/**
	 * 获取缩略图
	 * @access public
	 * @param string $string
	 * @param type string
	 * return string
	 */
	public static function thumb($string, $type = 't')
	{
		$to = '';
		switch ($type)
		{
			case 's':
			$to = 's';
			break;
			case 'm':
			$to = 'm';
			break;
			case 't':
			$to = 't';
			break;
		}
		
	    return $string . '!' . $to;
	}
	
	/**
	 * 获取文章头图
	 * @access public
	 * @param  string $content
	 * @return string
	 */
	public static function articleThumb($content)
	{
		$thumb = '';
		preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content, $matches);
		if (!empty($matches))
		{
			$thumb = $matches[1];
		}
		
		return $thumb;
	}
		
	/**
	 * 创建订单号
	 * 
	 * @access public
	 * @return string
	 */
	public static function CreateSn()
	{
		mt_srand((double) microtime() * 1000000);
		return intval(date('ymd')) * 2 . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
	}
	
	/**
	 * 检查商品的库存、可购买数、现在的价格
	 * 
	 * @access public
	 * @param  array   $product
	 * @return array   $product
	 */
	public static function stock($product)
	{
		$product = Helper::promote($product);
		
		/* 正常商品可购买数 */
		$cn_limit = $product['goods_perlimit'] > 0 ? min($product['goods_perlimit'], $product['cn_goods_number']) : $product['cn_goods_number'];
		$au_limit = $product['goods_perlimit'] > 0 ? min($product['goods_perlimit'], $product['au_goods_number']) : $product['au_goods_number'];
		
		/* 正常商品库存 */
		$cn_stock = $product['cn_goods_number'];
		$au_stock = $product['au_goods_number'];
		
		$product['vip_price'] = ($product['vip_price'] > 0 ? $product['vip_price'] : 0);
		
		if ($product['is_promote'] > 0)
		{
			/* 商品价格 */
			$product['shop_price'] = $product['promote_price'];
			$product['vip_price'] = 0;
			
			/* 促销商品可购买数 */
			$cn_limit = $product['promote_perlimit'] > 0 ? min($product['promote_perlimit'], $product['cn_promote_maxlimit']) : $product['cn_promote_maxlimit'];
			$au_limit = $product['promote_perlimit'] > 0 ? min($product['promote_perlimit'], $product['au_promote_maxlimit']) : $product['au_promote_maxlimit'];
			
			/* 促销商品库存 */
			$cn_stock = $product['cn_promote_maxlimit'];
			$au_stock = $product['au_promote_maxlimit'];
		}
		
		$product['cn_limit'] = $cn_limit;
		$product['au_limit'] = $au_limit;
		
		$product['cn_stock'] = $cn_stock;
		$product['au_stock'] = $au_stock;
		
		/* 默认配送方式销售价 */
		$product['cn_shipping_price'] = $product['cn_shipping_price'] + $product['au_shipping_price'];
		
		$shipping_price = $product['cn_shipping_price'];
		
		$product['goods_number'] = $product['cn_goods_number'] + $product['au_goods_number'];
		
		if ($product['shipping_way'] == SHIPPING_AU)
		{
			$shipping_price = $product['au_shipping_price'];
		}
		
		$product['show_price'] = $shipping_price + $product['shop_price'];
		$product['show_price'] = number_format($product['show_price'], 2, '.', '');
		
		$product['show_vip_price'] = 0.0;
		if ($product['vip_price'] > 0)
		{
			$product['show_vip_price'] = $shipping_price + $product['vip_price'];
		}
		$product['show_vip_price'] = number_format($product['show_vip_price'], 2, '.', '');
		
		$product['show_market_price'] = $shipping_price + $product['market_price'];
		$product['show_market_price'] = number_format($product['show_market_price'], 2, '.', '');
		
		return $product;
	}
	
	/**
	 * 判断某个商品是否正在特价促销期
	 *
	 * @access  public
	 * @param   array   $product      商品
	 * @return  array   处理过的商品
	 */
	public static function promote($product)
	{
		$now = time();
		if ($product['is_promote'] > 0 && $now >= $product['promote_start'] && $now <= $product['promote_end'])
		{
			if ($product['promote_price'] == 0)
			{
				$product['is_promote'] = CART_GENERAL_GOODS;
				$product['promote_price'] = 0;
				$product['promote_start'] = 0;
				$product['promote_end'] = 0;
				$product['promote_perlimit'] = 0;
				$product['promote_maxlimit'] = 0;
	    	}
		}
		else
		{
			$product['is_promote'] = CART_GENERAL_GOODS;
			$product['promote_price'] = 0;
			$product['promote_start'] = 0;
			$product['promote_end'] = 0;
			$product['promote_perlimit'] = 0;
			$product['promote_maxlimit'] = 0;
		}
		
		return $product;
	}
	
	/**
	 * 通过http请求数据
	 * @access public
	 * @param  string $url 网址
	 * @param  string $method 请求方式 默认GET
	 * @param  array  $args 请求参数
	 * @param  array  $header 头部
	 * @param  integer $timeout 超时时间 默认30秒
	 * @return string
	 */
	public static function curlContents($url, $method = 'GET', $args = array(), $header = array(), $timeout = 30)
	{
		$response = '';
		
		if (filter_var($url, FILTER_VALIDATE_URL))
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Firstshopping/1.0; +http://www.google.com)');
			
			if ($method == 'POST')
			{
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
			}
			
			$response = curl_exec($ch);
			curl_close($ch);
		}
		
		return $response;
	}
}
