<?php

$installer = Mage::getResourceModel('catalog/setup','default_setup');
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

// addAtribute uses _prepareValues()
$data = array(
            'label'     => 'Script Generated MS Option',
            'type'      => 'varchar', //multiselect uses comma separated storage
            'input'     => 'multiselect',
            'required'  => 0,
            'user_defined' => 1, //defaults to false; if true, define a group
            'group'     => 'Prices',
            'option'    => array(
                                'order' => array('one' => 1, 'two' => 2, 'three' => 5),
                                'value' => array(
                                    'one' => array(0 => 'Some Label One', 2 => 'Alt One'),
                                    'two' => array(0 => 'Some Label Two', 2 => 'Alt Two'),
                                    'three' => array(0 => 'Some Label Three', 2 => 'Alt Three'),
                                ),
                            )
        );

$installer->addAttribute('catalog_product', 'attribute_installed', $data);

$installer->endSetup();

/* UPDATE =>

$installer = Mage::getResourceModel('catalog/setup','default_setup');
// @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup

$installer->startSetup();

// updateAttribute DOES NOT USE _prepareValues()
$installer->updateAttribute('catalog_product', 'attribute_installed', 'group', 'Prices');

$installer->endSetup();
*/