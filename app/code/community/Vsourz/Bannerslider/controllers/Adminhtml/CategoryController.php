<?php 
class Vsourz_Bannerslider_Adminhtml_CategoryController extends Mage_Adminhtml_Controller_action {
	protected function _initAction(){
		$this->loadLayout()->_setActiveMenu('bannerslider/imagecategory')->_addBreadcrumb(
			Mage::helper('adminhtml')->__('Manage Category Slider'),
			Mage::helper('adminhtml')->__('Category Slider Manager')
		);
		return $this;
	}
	public function indexAction(){
		$this->_initAction()->renderLayout();
	}
	public function newAction(){
		$this->loadLayout();
		$this->_addContent($this->getLayout()->createBlock('bannerslider/adminhtml_category_edit'))->_addLeft($this->getLayout()->createBlock('bannerslider/adminhtml_category_edit_tabs'));
		$this->renderLayout(); 
	}
	public function saveAction(){
		 if ($data = $this->getRequest()->getPost()){
			$model = Mage::getModel('bannerslider/imagecategory');
			$id = $this->getRequest()->getParam('id'); //Id is the value of the field which is to be saved after editing
			foreach ($data as $key => $value){
				if (is_array($value)){
					$data[$key] = implode(',',$this->getRequest()->getParam($key));
				}
			}
			if($id){
				$model->load($id);
			}
						//Code to Save Gallery Image
			/*
			if(isset($_FILES['category_img']['name']) and (file_exists($_FILES['category_img']['tmp_name']))){
				try{
					$uploader = new Varien_File_Uploader('category_img');
					$uploader->setAllowedExtensions(array('jpg','jpeg','gif','png')); // or pdf or anything
					$uploader->setAllowRenameFiles(false);
					// setAllowRenameFiles(true) -> move your file in a folder the magento way
					$uploader->setFilesDispersion(false);
					$path = Mage::getBaseDir('media') . DS .'bannerslider';
					$imgName = explode('.',$_FILES['category_img']['name']);
					$imgName[0] = $imgName[0].'-'.'category_img'.'-'.date('Y-m-d H-i-s');
					$imgName = implode('.',$imgName);
					$imgName = preg_replace('/\s+/', '-', $imgName);
					$uploader->save($path, $imgName);
					$data['category_img'] = 'bannerslider'.DS.$imgName;
				}catch(Exception $e){
					
				}
			}
			else{       
				if(isset($data['category_img']['delete']) && $data['category_img']['delete'] == 1){
					// delete image file
					$image = explode(',',$data['category_img']);
					unlink(Mage::getBaseDir('media').DS.$image[1]);
					// set db blank entry
					$data['category_img'] = ''; 
				}else{
					unset($data['category_img']);
				}
			}*/
			$model->setData($data);
			
			Mage::getSingleton('adminhtml/session')->setFormData($data);
			try{
				if ($id){
					$model->setId($id);
				}

				$model->save();
				if (!$model->getId()){
					Mage::throwException(Mage::helper('bannerslider')->__('Error saving slide details'));
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bannerslider')->__('Details was successfully saved.'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);

                // The following line decides if it is a "save" or "save and continue"
				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
				}else{
					$this->_redirect('*/*/');
				}
			}catch(Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				if ($model && $model->getId()){
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
				}else {
					$this->_redirect('*/*/');
				} 
			}
			return;
		 }
		 Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerslider')->__('No data found to save'));
		 $this->_redirect('*/*/'); 
	}
	public function editAction(){
		$id = $this->getRequest()->getParam('id', null);
		$model = Mage::getModel('bannerslider/imagecategory');
		if($id){
			$model->load((int)$id);
			if($model->getId()){
				$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if($data){
				$model->setData($data)->setId($id);
			}
			}else{
				Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerslider')->__('Category does not exist'));
				$this->_redirect('*/*/');
			}
		}
		Mage::register('category_data', $model);
		$this->_title($this->__('bannerslider'))->_title($this->__('Edit Category'));
		$this->loadLayout();
		$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
		$this->_addContent($this->getLayout()->createBlock('bannerslider/adminhtml_category_edit'))
		->_addLeft($this->getLayout()->createBlock('bannerslider/adminhtml_category_edit_tabs'));
		$this->renderLayout();
	}
	public function deleteAction(){
		if($this->getRequest()->getParam('id') > 0){
			try{
				$model = Mage::getModel('bannerslider/imagecategory');
				$id = $this->getRequest()->getParam('id');
				$objModel = $model->load($id);
				$path = Mage::getBaseDir('media');
				unlink($path.'/'.$objModel->categoryImg);
				$objModel->setId($id)->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
				$this->_redirect('*/*/');
			}catch(exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/'); 
	}
		
	public function massDeleteAction(){
		// Here the id is got from the function _prepareMassAction in Grid.php. ($this->getMassactionBlock()->setFormFieldName('id');)
		$ids = $this->getRequest()->getParam('id');
		if(!is_array($ids)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bannerslider')->__('Please select slide(s).'));
		}else{
			try{
				$imageModel = Mage::getModel('bannerslider/imagecategory');
				foreach($ids as $id){
					$objModel = $imageModel->load($id);
					$path = Mage::getBaseDir('media');
					unlink($path.'/'.$objModel->categoryImg);
					$objModel->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bannerslider')->__('Total of %d record(s) were deleted.', count($ids)));
			}catch(Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
}

?>