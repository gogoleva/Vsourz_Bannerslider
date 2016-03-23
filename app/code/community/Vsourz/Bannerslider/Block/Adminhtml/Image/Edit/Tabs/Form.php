<?php
class Vsourz_Bannerslider_Block_Adminhtml_Image_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{
	 protected function _prepareForm() {
		if (Mage::registry('image_data')) {
			$data = Mage::registry('image_data')->getData();
		} else {
			$data = array();
		}
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('bannerslider_image', array('legend' => Mage::helper('bannerslider')->__('Caption Information')));
		
		$wysiwygConfig = Mage::getSingleton('cms/wysiwyg_config')->getConfig();
		$wysiwygConfig->addData(array('add_variables' => false,
			'add_widgets' => false,
			'add_images' => false,
			'directives_url' => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive'),
			'directives_url_quoted' => preg_quote(Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg/directive')),
			'widget_window_url' => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/widget/index'),
			'files_browser_window_url' => Mage::getSingleton('adminhtml/url')->getUrl('adminhtml/cms_wysiwyg_images/index'),
			'files_browser_window_width' => (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_width'),
			'files_browser_window_height' => (int) Mage::getConfig()->getNode('adminhtml/cms/browser/window_height')
		));
		
		$fieldset->addField('slide_title', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Slide Title'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'slide_title',
		));
		
		$fieldset->addField('slide_img', 'image', array(
          'label' => Mage::helper('bannerslider')->__('Slide Image'),
		  'class' => 'required-entry required-file',
		  'required' => true,
		  'name' => 'slide_img',
		  'note' => '(*.jpg, *.jpeg, *.png, *.gif)',
        ));
		
		$fieldset->addField('slider_id', 'select', array(
          'label' => Mage::helper('bannerslider')->__('Slider Category'),
		  'class' => 'required-entry',
		  'required' => true,
		  'name' => 'slider_id',
		  'disabled' => false,
          'readonly' => false,
		  'values' => Mage::getModel('bannerslider/categoryval')->getCategoryVal(),
        ));
		
		$fieldset->addField('slide_description', 'editor', array(
			'name' => 'slide_description',
			'label' => Mage::helper('bannerslider')->__('Slide Description'),
			'title' => Mage::helper('bannerslider')->__('Slide Description'),
			'style' => 'width:400px; height:250px;',
			'config' => $wysiwygConfig,
			'required' => false,
			'wysiwyg' => true
		));
		
		$fieldset->addField('slide_url', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Slide Url'),		
			'name' => 'slide_url',
			'note' => 'Enter URL like, http://www.domainname.com <p style="color:#f00;">If you are provide above URL then do not insert any URL in Slide Description.</p>',
		));
		
		$fieldset->addField('text_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Text Color'),
			'class' => 'color',			
			'name' => 'text_color',
			'note' => 'Select Color',
		));
		
		$fieldset->addField('text_align', 'select', array(
          'label' => Mage::helper('bannerslider')->__('Text Align'),		  		  
		  'name' => 'text_align',
          'values' => Mage::getModel('bannerslider/align')->getAlignVal(),
		  'disabled' => false,
          'readonly' => false,		  
        ));
		
		$fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('bannerslider')->__('Status'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'status',
          'value'  => '0',
          'values' => array('0' => 'Disable','1' => 'Enable'),
          'disabled' => false,
          'readonly' => false,          		  
        ));
		
		$form->setValues($data);
		return parent::_prepareForm();
	}
}