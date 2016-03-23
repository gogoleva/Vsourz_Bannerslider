<?php
class Vsourz_Bannerslider_Model_Categoryval extends Mage_Core_Model_Abstract{
	public function getCategoryVal(){
		$catVal = Mage::getModel('bannerslider/imagecategory')->getCollection();
		$data = $catVal->getData();
		$dropVal = array();
			$dropVal[''] = "Please Select";
		foreach($data as $value){
			$dropVal[$value['slider_id']] = $value['slider_title'];
		};
		return $dropVal;
	}
}