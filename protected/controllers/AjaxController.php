<?php
class AjaxController extends Controller
{
	/** 
	 * 上传图片
	 */
	public function actionUpload()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$file = CUploadedFile::getInstanceByName('file');
 			$ext = strtolower($file->getExtensionName());
 			
 			if (in_array($ext, Yii::app()->params['upload']['allow']))
 			{ 				
 				$filename = time();
				$filedir = $filename % 10;
				$uploaddir = Yii::getPathOfAlias('webroot.upload.' . $filedir) . DIRECTORY_SEPARATOR;
				$filename = md5($file->getName()) . '_' . $filename;
 				
 				if ($file->saveAs($uploaddir . $filename . '.' . $ext))
 				{
 					$cfilename = $uploaddir . $filename . '.' . $ext;
 					$filename = $filedir . '/'. $filename . '.' . $ext;
 					@system('gm convert -strip -quality 80 ' . $cfilename . ' '. $cfilename);
 					
 					echo $filename;
 				}
 			}
		}
	}
}