<?php
 
$installer = $this;
$installer->startSetup();
 
$resource = Mage::getResourceModel('bannerslider/imagedetail_collection');
if(!method_exists($resource, 'getEntity')){
 
    $table = $this->getTable('bannerdetail');
    $query = 'ALTER TABLE `' . $table . '` ADD COLUMN `slide_url` TEXT NOT NULL AFTER `slider_id`';
    $connection = Mage::getSingleton('core/resource')->getConnection('core_write');
    try {
        $connection->query($query);
    } catch (Exception $e) {
 
    }
}
 
$installer->endSetup();
?>