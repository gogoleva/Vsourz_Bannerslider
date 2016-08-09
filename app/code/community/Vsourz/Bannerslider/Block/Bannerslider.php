<?php

/**
 * Class Vsourz_Bannerslider_Block_Bannerslider
 *
 * @method int	getCategoryId()	get configured category id
 */
class Vsourz_Bannerslider_Block_Bannerslider extends Mage_Catalog_Block_Product_Abstract{

	/**
	 * get all images for configured category id
	 *
	 * @param	string									$order		(optional) order field name
	 * @param	string									$direction	(optional) order direction
	 *
	 * @return	Vsourz_Bannerslider_Model_Imagedetail[]				images as collection
	 */
	public function getImages($order = 'slide_position', $direction = 'ASC')
	{
		$catId = $this->getCategoryId();
		return $imageCollection = Mage::getModel('bannerslider/bannerslider')->getImageCollection($catId, $order, $direction);
	}

	/**
	 * get category data for category id
	 *
	 * @return	Vsourz_Bannerslider_Model_Imagecategory[]			category data as collection
	 */
	public function getCategoryData()
	{
		$catId = $this->getCategoryId();
		return $catCollection = Mage::getModel('bannerslider/bannerslider')->getCategoryCollection($catId);
	}
}