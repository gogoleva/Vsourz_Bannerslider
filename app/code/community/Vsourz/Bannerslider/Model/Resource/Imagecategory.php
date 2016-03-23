<?php
class Vsourz_Bannerslider_Model_Resource_Imagecategory extends Mage_Core_Model_Mysql4_Abstract{
    public function _construct(){
        $this->_init('bannerslider/imagecategory','slider_id');
    }
}