<?php
class Vsourz_Bannerslider_Block_Adminhtml_Category_Grid extends Mage_Adminhtml_Block_Widget_Grid{
	public function __construct(){
		parent::__construct();
		$this->setDefaultFilter(array('chooser_is_active' => '1'));
		$this->setId('category_grid');
		$this->setDefaultSort('slider_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection(){
		$collection = Mage::getModel('bannerslider/imagecategory')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns(){
		$this->addColumn('slider_id', array(
			'header' => Mage::helper('bannerslider')->__('ID'),
			'align' => 'left',
			'width' => '1px',
			'index' => 'slider_id',
		));
		$this->addColumn('slider_title', array(
			'header' => Mage::helper('bannerslider')->__('Slider Title'),
			'align' => 'left',
			'index' => 'slider_title',
		));			
		$this->addColumn('status', array(
			'header' => Mage::helper('bannerslider')->__('Status'),
			'align' => 'left',
			'width' => '1px',
			'index' => 'status',
			'renderer' => 'bannerslider/adminhtml_bannerslider_renderer_status',			
		));			
	return parent::_prepareColumns();
	}
	protected function _prepareMassaction(){
		$this->setMassactionIdField('slider_id');
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