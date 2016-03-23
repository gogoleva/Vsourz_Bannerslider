<?php
class Vsourz_Bannerslider_Block_Adminhtml_Image_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
	public function __construct(){
		parent::__construct();
		$this->setId('image_tabs');
		$this->setDestElementId('edit_form'); // this should be same as the form id in Form.php
		$this->setTitle(Mage::helper('bannerslider')->__('Slide Detail'));
	}
	protected function _beforeToHtml(){
		$this->addTab('form_section', array(
			'label' => Mage::helper('bannerslider')->__('Slide Detail'),
			'title' => Mage::helper('bannerslider')->__('Slide Detail'),
			'content' => $this->getLayout()->createBlock('bannerslider/adminhtml_image_edit_tabs_form')->toHtml(),
		));
		return parent::_beforeToHtml();
	}
}