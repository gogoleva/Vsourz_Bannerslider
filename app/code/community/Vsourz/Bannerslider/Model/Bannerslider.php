<?php
class Vsourz_Bannerslider_Model_Bannerslider extends Mage_Core_Model_Abstract{
	/**
	 * get all images for category id
	 *
	 * @param	int										$catId		category id
	 * @param	string									$order		(optional) order field name
	 * @param	string									$direction	(optional) order direction
	 * 
	 * @return	Vsourz_Bannerslider_Model_Imagedetail[]				images as collection
	 */
	public function getImageCollection($catId, $order = 'bannerdetail_id', $direction = 'ASC'){
		$imageCollection = Mage::getModel('bannerslider/imagedetail')->getCollection()
			->addFieldToFilter('status', '1')
			->addFieldToFilter('slider_id', $catId)
			->setOrder($order, $direction);
		return $imageCollection;
	}

	/**
	 * get category data for category id
	 *
	 * @param	int											$catId	category id
	 * @return	Vsourz_Bannerslider_Model_Imagecategory[]			category data as collection
	 */
	public function getCategoryCollection($catId){
		$categoryCollection = Mage::getModel('bannerslider/imagecategory')->getCollection()		
			->addFieldToFilter('status', '1')
			->addFieldToFilter('slider_id', $catId);
		return $categoryCollection;
	}
}