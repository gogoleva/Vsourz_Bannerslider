<?php
class Vsourz_Bannerslider_Block_Adminhtml_Image_Grid extends Mage_Adminhtml_Block_Widget_Grid{
	public function __construct(){
		parent::__construct();
		$this->setId('image_grid');
		$this->setDefaultSort('bannerdetail_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection(){
		$collection = Mage::getModel('bannerslider/imagedetail')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns(){
		 $this->addColumn('bannerdetail_id', array(
			'header' => Mage::helper('bannerslider')->__('ID'),
			'align' => 'left',
			'width' => '10px',
			'index' => 'bannerdetail_id',
		));
		$this->addColumn('slide_title', array(
			'header' => Mage::helper('bannerslider')->__('Slide Title'),
			'align' => 'left',
			'width' => '100px',
			'index' => 'slide_title',
		));
		$this->addColumn('slide_img', array(
			'header' => Mage::helper('bannerslider')->__('Image'),
			'align' => 'left',
			'width' => '200px',
			'index' => 'slide_img',
			'renderer' => 'bannerslider/adminhtml_bannerslider_renderer_image',
		));
		$this->addColumn('slide_description', array(
			'header' => Mage::helper('bannerslider')->__('Slide Description'),
			'align' => 'left',
			'width' => '200px',
			'index' => 'slide_description',
		));
		$this->addColumn('slider_id', array(
			'header' => Mage::helper('bannerslider')->__('Slider Category'),
			'align' => 'left',
			'width' => '50px',
			'index' => 'slider_id',
			'renderer' => 'bannerslider/adminhtml_bannerslider_renderer_category'
		));
		$this->addColumn('status', array(
			'header' => Mage::helper('bannerslider')->__('Status'),
			'align' => 'left',
			'width' => '50px',
			'index' => 'status',
			'renderer' => 'bannerslider/adminhtml_bannerslider_renderer_status',			
		));
		
	return parent::_prepareColumns();
	}
	protected function _prepareMassaction(){
		$this->setMassactionIdField('bannerdetail_id');
		$this->getMassactionBlock()->setFormFieldName('id');
		$this->getMassactionBlock()->addItem('delete', array(
			'label'=> Mage::helper('bannerslider')->__('Delete'),
			'url'  => $this->getUrl('*/*/massDelete', array('' => '')),
			'confirm' => Mage::helper('bannerslider')->__('Are you sure?')
		));
		return $this;
	}
	public function getRowUrl($row) {
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
	
}