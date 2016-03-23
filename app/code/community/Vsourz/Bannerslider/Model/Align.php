<?php
class Vsourz_Bannerslider_Model_Align extends Mage_Core_Model_Abstract
{
	public function getAlignVal()
	{
		return array(
			array('value' => 'left', 'label' => 'left'),
			array('value' => 'right', 'label' => 'right'),
			array('value' => 'center', 'label' => 'center')
		);
	}
}
?>