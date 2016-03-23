<?php
class Vsourz_Bannerslider_Model_Imagecategory extends Mage_Core_Model_Abstract{
	public function _construct(){
		parent::_construct();
		$this->_init('bannerslider/imagecategory');
	}
}