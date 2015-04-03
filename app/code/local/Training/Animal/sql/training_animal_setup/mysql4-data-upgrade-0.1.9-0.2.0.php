<?php

$installer = Mage::getResourceModel('catalog/setup','default_setup');
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

//Necesario para multiselect en backend
$installer->updateAttribute(
                            'catalog_product',
                            'attribute_installed',
                            'backend_model',
                            'eav/entity_attribute_backend_array'
                            );

$installer->endSetup();