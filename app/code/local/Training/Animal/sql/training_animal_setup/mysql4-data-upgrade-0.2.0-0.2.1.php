<?php

$installer = Mage::getResourceModel('catalog/setup','default_setup');
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

//Necesario para que sea visible on frontend (se podria poner de una al craer)
$installer->updateAttribute(
    'catalog_product',
    'attribute_installed',
    'is_visible_on_front',
    1
);

$installer->endSetup();