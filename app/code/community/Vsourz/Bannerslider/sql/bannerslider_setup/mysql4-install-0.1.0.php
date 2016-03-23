<?php
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('bannerdetail'))
    ->addColumn('bannerdetail_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Banner ID')
    ->addColumn('slide_title', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array(
		'nullable'  => false,
        ), 'Slide Title')
	->addColumn('slide_img', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array(
		'nullable'  => false,
        ), 'Slide Image')
	->addColumn('slide_description', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array(
		), 'Slide Description')	
	->addColumn('slider_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,        
        ), 'Slider Id')
	->addColumn('text_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Text Color')
	->addColumn('text_align', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Text Align')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Is Enabled');
		
$installer->getConnection()->createTable($table);

$table = $installer->getConnection()
    ->newTable($installer->getTable('bannercategory'))
    ->addColumn('slider_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Slide ID')
    ->addColumn('slider_title', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array(
		'nullable'  => false,
        ), 'Slider Title')
	->addColumn('status', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Status')
	->addColumn('display_all_slide_title', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Display All Slide Title')
	->addColumn('display_all_slide_description', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Display All Slide Description')
	->addColumn('animation_in', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Animation In')
	->addColumn('animation_out', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Animation Out')
	->addColumn('navigation', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Navigation')
	->addColumn('navigation_bg_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Navigation Bg Color')
	->addColumn('navigation_bg_hover_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Navigation Bg Hover Color')
	->addColumn('navigation_arrow_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Navigation Arrow  Color')
	->addColumn('navigation_arrow_hover_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Navigation Arrow Hover Color')
	->addColumn('pagination', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => false,
        'default'   => '0',
        ), 'Pagination')	
	->addColumn('pagination_bg_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Pagination Bg Color')
	->addColumn('pagination_bg_hover_color', Varien_Db_Ddl_Table::TYPE_TEXT, 256, null, array(
        'nullable'  => false,
        ), 'Pagination Bg Hover Color')
	->addColumn('auto_play', Varien_Db_Ddl_Table::TYPE_BIGINT, null, array(
        'nullable'  => false,
        ), 'Auto Play');
		
$installer->getConnection()->createTable($table);

$installer->endSetup();