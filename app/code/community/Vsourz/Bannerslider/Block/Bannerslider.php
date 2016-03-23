<?php 
class Vsourz_Bannerslider_Block_Bannerslider extends Mage_Catalog_Block_Product_Abstract{
	public function getImages()
	{
		$catId = $this->getCategoryId();
		return $imageCollection = Mage::getModel('bannerslider/bannerslider')->getImageCollection($catId);
	}
	public function getCategoryData()
	{
		$catId = $this->getCategoryId();
		return $catCollection = Mage::getModel('bannerslider/bannerslider')->getCategoryCollection($catId);
	}
}