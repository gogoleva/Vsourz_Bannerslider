<?php
$categories = array(
	array(
		'slider_title' => 'default',
		'status' => '1'
	),
);
foreach ($categories as $category){
	$model = Mage::getModel('bannerslider/imagecategory')->setData($category)->save();
}
