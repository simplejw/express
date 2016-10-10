<?php

 
 class WebBehavior extends CBehavior
 {
 	public function events()
 	{
 		return array(
					'onBeginRequest' => 'beginRequest', 
					'onEndRequest'=>'endRequest'
					);
 	}
 	
 	public function beginRequest()
 	{
 		ob_start("ob_gzhandler");
 	}
 	
 	public function endRequest()
 	{
 		if(ob_get_level()) ob_end_flush();
 	}
 }
