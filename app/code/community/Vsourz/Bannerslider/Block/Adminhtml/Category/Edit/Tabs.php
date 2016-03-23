<?php
class Vsourz_Bannerslider_Block_Adminhtml_Category_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
	public function __construct() {
		parent::__construct();
		$this->setId('category_tabs');
		$this->setDestElementId('edit_form'); // this should be same as the form id in Form.php
		$this->setTitle(Mage::helper('bannerslider')->__('Category Slider'));
	}
	protected function _beforeToHtml() {
		$this->addTab('form_section', array(
			'label' => Mage::helper('bannerslider')->__('Category Slider Detail'),
			'title' => Mage::helper('bannerslider')->__('Category Slider Detail'),
			'content' => $this->getLayout()->createBlock('bannerslider/adminhtml_category_edit_tabs_form')->toHtml(),
		));
		return parent::_beforeToHtml();
	} 
}