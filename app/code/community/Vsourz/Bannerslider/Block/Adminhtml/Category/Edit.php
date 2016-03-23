<?php
class Vsourz_Bannerslider_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
	public function __construct(){
		parent::__construct();
		$this->_objectId = 'catid';
		$this->_blockGroup = 'bannerslider';
		$this->_controller = 'adminhtml_category';
		$this->_mode = 'edit';
		$this->_updateButton('save', 'label', Mage::helper('bannerslider')->__('Save Category Slider'));
		$this->_updateButton('delete', 'label', Mage::helper('bannerslider')->__('Delete'));
		$this->_addButton('saveandcontinue', array(
			'label' => Mage::helper('bannerslider')->__('Save And Continue Edit'),
			'onclick' => 'saveAndContinueEdit()',
			'class' => 'save',
		), -100); 
		
		$this->_formScripts[] ="
			function toggleEditor(){
				if (tinyMCE.getInstanceById('form_content') == null) {
					tinyMCE.execCommand('mceAddControl', false, 'edit_form');
				} else {
					tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
				}
			}
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}"; 
	}
	protected function _prepareLayout(){
		parent::_prepareLayout();
		if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
			$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		}		
	}
	public function getHeaderText() {
		if (Mage::registry('category_data') && Mage::registry('category_data')->getId()) {
			return Mage::helper('bannerslider')->__('Edit Category Slider "%s"', $this->htmlEscape(Mage::registry('category_data')->getSliderTitle()));
		} else {
			return Mage::helper('bannerslider')->__('New Slider');
		}
	}
	
}