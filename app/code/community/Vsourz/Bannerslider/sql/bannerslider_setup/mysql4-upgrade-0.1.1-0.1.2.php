<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addColumn($installer->getTable('bannerdetail'),
        'slide_position',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_INTEGER,
            'nullable' => false,
            'default' => '0',
            'comment' => 'Slide Position'
        )
    );
$installer->endSetup();