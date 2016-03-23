<?php
class Vsourz_Bannerslider_Model_Resource_Imagedetail extends Mage_Core_Model_Mysql4_Abstract{
    public function _construct(){
        $this->_init('bannerslider/imagedetail','bannerdetail_id');
    }
}