<?php
class Vsourz_Bannerslider_Block_Adminhtml_Bannerslider_Renderer_Category extends
Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
	public function render(Varien_Object $row)
	{
		$value = $row->getData($this->getColumn()->getIndex());
		$model = Mage::getModel('bannerslider/imagecategory');
		$data = $model->load($value)->getData();
		if(!$data)
		{
			return "Undefined";
		}else
		{
			return $data['slider_title'];
		}
	}
}