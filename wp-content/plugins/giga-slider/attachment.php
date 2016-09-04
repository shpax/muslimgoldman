<?php

class RC_Attachment{
	
	var $attachmentId;
	var $watermarkImageId;
	var $watermarkAlignment;
	var $requiredHeight;
	var $url;
	
	/**
	 * Class constructor
	 *
	 * @uses get_attached_file()
	 * @uses wp_get_image_editor()
	 * @uses WP_Image_Editor::get_error_message()
	 * @uses WP_Image_Editor::get_error_code()
	 * @uses wp_get_attachment_url()
	 *
	 * @return void
	 */
	function RC_Attachment($imgId, $height, $watermarkImgId = NULL, $watermarkAlignment = NULL){
		$this->attachmentId = $imgId;
		$this->watermarkImageId = $watermarkImgId;
		$this->watermarkAlignment = $watermarkAlignment;
		$this->requiredHeight = $height;
		
		$this->url = dirname(wp_get_attachment_url($this->attachmentId));
	}
	
	/**
	 * Generates other needed size for the attachment
	 *
	 * @uses imageEditor::save()
	 * @uses imageEditor::generate_filename()
	 * @uses imageEditor::get_size()
	 * @uses get_attached_file()
	 * @uses wp_get_image_editor()
	 * @uses WP_Image_Editor::get_error_message()
	 * @uses WP_Image_Editor::get_error_code()
	 *
	 * @return array
	 */
	function generateOtherSizes(){
		$image_info = array();
		
		$large = $this->_generateLargeImage();
		$image_info['large_image'] = $this->url.'/'.$large['file'];
		
		$thumb = $this->_generateThumbnail();
		$image_info['thumbnail'] =  $this->url.'/'.$thumb['file'];
		
		if(!empty($this->watermarkImageId)){
			set_time_limit(120);
			$this->_addWatermark(dirname(get_attached_file($this->attachmentId)).DIRECTORY_SEPARATOR.$large['file'],
									get_attached_file($this->watermarkImageId));
		}
		
		return $image_info;
	}
	
	/**
	 * Generates large image
	 *
	 * @uses wp_get_image_editor()
	 * @uses get_attached_file()
	 * @uses WP_Image_Editor()
	 * @uses WP_Image_Editor::get_error_message()
	 * @uses WP_Image_Editor::get_error_code()
	 * @uses WP_Image_Editor::resize()
	 * @uses WP_Image_Editor::set_quality()
	 * @uses WP_Image_Editor::save()
	 * @uses WP_Image_Editor::generate_filename()
	 *
	 * @return array
	 */
	function _generateLargeImage(){
		$editor = wp_get_image_editor(get_attached_file($this->attachmentId));
		if(!($editor instanceof WP_Image_Editor)){
			throw new Exception($editor->get_error_message($editor->get_error_code()));
		}
		
		$editor->resize(NULL, $this->requiredHeight, true);
		$editor->set_quality(100);
		$result = $editor->save($editor->generate_filename());
		return array('file' => $result['file'], 'widht' => $result['width'], 'height' => $result['height']);
	}
	
	/**
	 * Generates thumbnail for the attachment
	 *
	 * @uses wp_get_image_editor()
	 * @uses get_attached_file()
	 * @uses WP_Image_Editor()
	 * @uses WP_Image_Editor::get_error_message()
	 * @uses WP_Image_Editor::get_error_code()
	 * @uses WP_Image_Editor::resize()
	 * @uses WP_Image_Editor::set_quality()
	 * @uses WP_Image_Editor::save()
	 * @uses WP_Image_Editor::generate_filename()
	 *
	 * @return array
	 */
	function _generateThumbnail(){
		$editor = wp_get_image_editor(get_attached_file($this->attachmentId));
		if(!($editor instanceof WP_Image_Editor)){
			throw new Exception($editor->get_error_message($editor->get_error_code()));
		}
		
		$editor->resize(125, 90, true);
		$editor->set_quality(100);
		$result = $editor->save($editor->generate_filename());
		return array('file' => $result['file'], 'widht' => $result['width'], 'height' => $result['height']);
	}
	
	/**
	 * add watermark to the large image
	 *
	 * @return void
	 */
	function _addWatermark($imgPath, $wmarkPath){
		$img = $wmark = NULL;
		$imgExt = strtolower($this->_getFileExtenstion($imgPath));
		$wmarkExt = strtolower($this->_getFileExtenstion($wmarkPath));
		if($imgExt == 'png'){
			$img = imagecreatefrompng($imgPath);
		}
		else if($imgExt == 'jpeg' || $imgExt == 'jpg'){
			$img = imagecreatefromjpeg($imgPath);
		}
		else if($imgExt == 'gif'){
			$img = imagecreatefromgif($imgPath);
		}
		
		if($wmarkExt == 'png'){
			$wmark = imagecreatefrompng($wmarkPath);
		}
		else if($wmarkExt == 'jpeg' || $wmarkExt == 'jpg'){
			$wmark = imagecreatefromjpeg($wmarkPath);
		}
		else if($wmarkExt == 'gif'){
			$wmark = imagecreatefromgif($wmarkPath);
		}
		
		$wmarkWidth = imagesx($wmark);
		$wmarkHeight = imagesy($wmark);
		
		$imgWidth = imagesx($img);
		$imgHeight = imagesy($img);
		
		$paddingSpace = 50;
		
		$xAlignment = NULL;
		$yAlignment = NULL;
		
		switch($this->watermarkAlignment){
			case 'topRight':
			$xAlignment = $imgWidth - $wmarkWidth - $paddingSpace;
			$yAlignment = $paddingSpace;
			break;
			
			case 'bottomRight':
			$xAlignment = $imgWidth - $wmarkWidth - $paddingSpace;
			$yAlignment = $imgHeight - $wmarkHeight - $paddingSpace;
			break;
			
			case 'center':
			$xAlignment = ($imgWidth / 2) - ($wmarkWidth / 2);
			$yAlignment = ($imgHeight / 2) - ($wmarkHeight / 2);
			break;
			
			case 'bottomLeft':
			$xAlignment = $paddingSpace;
			$yAlignment = $imgHeight - $wmarkHeight - $paddingSpace;
			break;
			
			case 'topLeft':
			$xAlignment = $paddingSpace;
			$yAlignment = $paddingSpace;
			break;
			
			default:
			$xAlignment = $imgWidth - $wmarkWidth - $paddingSpace;
			$yAlignment = $paddingSpace;
		}
		
		imagecopy($img, $wmark, $xAlignment, $yAlignment, 0, 0, $wmarkWidth, $wmarkHeight);
		
		if($imgExt == 'png'){
			imagepng($img, $imgPath, 100);
		}
		else if($imgExt == 'jpeg' || $imgExt == 'jpg'){
			imagejpeg($img, $imgPath, 100);
		}
		else if($imgExt == 'gif'){
			imagegif($img, $imgPath, 100);
		}
	}
	
	/**
	 * returns file extension
	 *
	 * @return string
	 */
	function _getFileExtenstion($fileName){
		return substr(strrchr($fileName, '.'), 1);
	}
}