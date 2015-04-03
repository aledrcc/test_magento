<?php

$installer = Mage::getResourceModel('catalog/setup','default_setup');
/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer->startSetup();

//Actualiza la vista en frontend
//Es un modelo
$installer->updateAttribute(
                            'catalog_product',
                            'attribute_installed',
                            'frontend_model',
                            'training/entity_attribute_frontend_list'
                            );

//Porque queremos hacer una lista y necesita html
$installer->updateAttribute(
                            'catalog_product',
                            'attribute_installed',
                            'is_html_allowed_on_front',
                            1
                            );

$installer->endSetup();