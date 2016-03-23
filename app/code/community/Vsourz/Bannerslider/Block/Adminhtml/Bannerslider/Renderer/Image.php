<?php
class Vsourz_Bannerslider_Block_Adminhtml_Bannerslider_Renderer_Image extends
Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {
	public function render(Varien_Object $row){
		$value = $row->getData($this->getColumn()->getIndex());
		if($value == NULL){
			return "Image not inserted";
		}else{
			return '<img width="200" height="100" src="'.Mage::getBaseUrl('media').$value.'" />';
		}
	}
}