<?php
class Vsourz_Bannerslider_Block_Adminhtml_Category_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form{
	

	 protected function _prepareForm() {	 
		if (Mage::registry('category_data')) {
			$data = Mage::registry('category_data')->getData();
		} else {
			$data = array();
		}
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('bannerslider_category', array('legend' => Mage::helper('bannerslider')->__('Caption Information')));
		
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
		
		$fieldset->addField('slider_title', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Slider Title'),
			'class' => 'required-entry',
			'required' => true,
			'name' => 'slider_title',
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
		
		$fieldset->addField('display_all_slide_title', 'select', array(
          'label'     => Mage::helper('bannerslider')->__('Display All Slide Title'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'display_all_slide_title',
          'value'  => '0',
          'values' => array('0' => 'Yes','1' => 'No'),		  
          'disabled' => false,
          'readonly' => false,
          'note' => 'Select yes/no to display slide title in particular slider',
        ));
		
		$fieldset->addField('display_all_slide_description', 'select', array(
          'label'     => Mage::helper('bannerslider')->__('Display All Slide Description'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'display_all_slide_description',
          'value'  => '0',
          'values' => array('0' => 'Yes','1' => 'No'),		  
          'disabled' => false,
          'readonly' => false,
          'note' => 'Select yes/no to display slide description in particular slider',
        ));
		
		$fieldset->addField('animation_in', 'select', array(
          'label' => Mage::helper('bannerslider')->__('Animation In'),
		  'class' => 'required-entry',
		  'required' => true,
		  'name' => 'animation_in',
          'values' => Mage::getModel('bannerslider/animationin')->getAnimationInVal(),
		  'disabled' => false,
          'readonly' => false,		  
        ));
		
		$fieldset->addField('animation_out', 'select', array(
          'label' => Mage::helper('bannerslider')->__('Animation Out'),
		  'class' => 'required-entry',
		  'required' => true,
		  'name' => 'animation_out',			  
          'values' => Mage::getModel('bannerslider/animationout')->getAnimationOutVal(),
		  'disabled' => false,
          'readonly' => false,		  
        ));
		
		$fieldset->addField('navigation', 'select', array(
          'label'     => Mage::helper('bannerslider')->__('Navigation'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'navigation',
          'value'  => '0',
          'values' => array('0' => 'Yes','1' => 'No'),		  
          'disabled' => false,
          'readonly' => false,
          'note' => 'Enable slide navigation',
        ));		
		
		$fieldset->addField('navigation_bg_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Navigation Bg Color'),
			'class' => 'color',			
			'name' => 'navigation_bg_color',
			'note' => 'Select Color',
		));
		
		$fieldset->addField('navigation_bg_hover_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Navigation Bg Hover Color'),
			'class' => 'color',			
			'name' => 'navigation_bg_hover_color',
			'note' => 'Select Color',
		));	
		$fieldset->addField('navigation_arrow_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Navigation Arrow Color'),
			'class' => 'color',			
			'name' => 'navigation_arrow_color',
			'note' => 'Select Color',
		));
		$fieldset->addField('navigation_arrow_hover_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Navigation Arrow Hover Color'),
			'class' => 'color',			
			'name' => 'navigation_arrow_hover_color',
			'note' => 'Select Color',
		));	
		$fieldset->addField('pagination', 'select', array(
          'label'     => Mage::helper('bannerslider')->__('Pagination'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'pagination',
          'value'  => '0',
          'values' => array('0' => 'Yes','1' => 'No'),
          'disabled' => false,
          'readonly' => false,
          'note' => 'Enable slide pagination',
        ));
		
		$fieldset->addField('pagination_bg_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Pagination Bg Color'),
			'class' => 'color',			
			'name' => 'pagination_bg_color',
			'note' => 'Select Color',
		));
				
		$fieldset->addField('pagination_bg_hover_color', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Pagination Bg Hover Color'),
			'class' => 'color',			
			'name' => 'pagination_bg_hover_color',
			'note' => 'Select Color',
		));		
		
		$fieldset->addField('auto_play', 'text', array(
			'label' => Mage::helper('bannerslider')->__('Auto Play'),				
			'name' => 'auto_play',
			'note' => 'Enter time in milliseconds, Enter 0 for false',
		));	
		
		$this->setChild('form_after', $this->getLayout()
			->createBlock('adminhtml/widget_form_element_dependence')
			->addFieldMap('navigation', 'navigation')			
			->addFieldMap('pagination', 'pagination')
			->addFieldMap('navigation_bg_color', 'navigation_bg_color')
			->addFieldMap('navigation_bg_hover_color', 'navigation_bg_hover_color')						
			->addFieldDependence('navigation_bg_color', 'navigation', 0)
			->addFieldDependence('navigation_bg_hover_color', 'navigation', 0)
			->addFieldMap('navigation_arrow_color', 'navigation_arrow_color')
			->addFieldMap('navigation_arrow_hover_color', 'navigation_arrow_hover_color')
			->addFieldDependence('navigation_arrow_color', 'navigation', 0)
			->addFieldDependence('navigation_arrow_hover_color', 'navigation', 0)
			->addFieldMap('pagination_bg_color', 'pagination_bg_color')
			->addFieldMap('pagination_bg_hover_color', 'pagination_bg_hover_color')
			->addFieldDependence('pagination_bg_color', 'pagination', 0)
			->addFieldDependence('pagination_bg_hover_color', 'pagination', 0)
		);
		
		$form->setValues($data);
		return parent::_prepareForm();
	}
}