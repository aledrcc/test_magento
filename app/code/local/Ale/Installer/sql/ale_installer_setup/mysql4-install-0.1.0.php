<?php

//app/code/local/Ale/Installer/sql/ale_installer_setup/mysql4-install-0.1.0.php

//addAtribute uses _prepareValues()
//'backend_model'   => $this->_getValue($attr, 'backend'),
//'backend_type'    => $this->_getValue($attr, 'type', 'varchar'),
//'backend_table'   => $this->_getValue($attr, 'table'),
//'frontend_model'  => $this->_getValue($attr, 'frontend'),
//'frontend_input'  => $this->_getValue($attr, 'input', 'text'),
//'frontend_label'  => $this->_getValue($attr, 'label'),
//'frontend_class'  => $this->_getValue($attr, 'frontend_class'),
//'source_model'    => $this->_getValue($attr, 'source'),
//'is_required'     => $this->_getValue($attr, 'required', 1),
//'is_user_defined' => $this->_getValue($attr, 'user_defined', 0),
//'default_value'   => $this->_getValue($attr, 'default'),
//'is_unique'       => $this->_getValue($attr, 'unique', 0),
//'note'            => $this->_getValue($attr, 'note'),
//'is_global'       => $this->_getValue($attr, 'global', 1),

//$installer = Mage::getResourceModel('catalog/setup','default_setup'); //Necesario si la class es Mage_Core_Model_Resource_Setup
$installer = $this; //Para funcionar asi necesita q la class sea Mage_Catalog_Model_Resource_Setup
/* @var $installer Mage_Catalog_Model_Resource_Setup */

/* @ v a r  $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

/**/
$installer->startSetup();
$installer->removeAttribute('catalog_product', 'probando_text');
$installer->removeAttribute('catalog_product', 'probando_textarea');
$installer->removeAttribute('catalog_product', 'probando_select');
$installer->removeAttribute('catalog_product', 'probando_yesnoselect');
$installer->removeAttribute('catalog_product', 'probando_multiselect');
$installer->endSetup();
/**/

$installer->startSetup();

//TEXT
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY,
    'probando_text', array(
        'type'              => 'varchar', //'backend_type'
        'input'             => 'text', //'frontend_input'
        'label'             => 'Probando un atributo Text', //'frontend_label'
        'group'             => 'General',
        'required'          => 0, //'is_required', defaults to 1
        'visible_on_front'  => 1
    )
);

//TEXTAREA
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY,
    'probando_textarea', array(
        'type'              => 'text', //'backend_type'
        'input'             => 'textarea', //'frontend_input'
        'label'             => 'Probando un atributo Text Area', //'frontend_label'
        'group'             => 'General',
        'required'          => 0, //'is_required', defaults to 1
        'visible_on_front'  => 1
    )
);

//SELECT
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY,
    'probando_select', array(
        'type'              => 'int', //'backend_type'
        'input'             => 'select', //'frontend_input'
        'label'             => 'Probando un atributo Select', //'frontend_label'
        'source'            => 'ale_installer/entity_attribute_source_select', //'source_model'
        'group'             => 'General',
        'required'          => 0, //'is_required', defaults to 1
        'visible_on_front'  => 1
    )
);

//YES/NO SELECT
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY,
    'probando_yesnoselect', array(
        'type'              => 'int', //'backend_type'
        'input'             => 'select', //'frontend_input'
        'label'             => 'Probando un atributo Yes/No Select', //'frontend_label'
        'source'            => 'eav/entity_attribute_source_boolean',
        'group'             => 'General',
        'required'          => 0, //'is_required', defaults to 1
        'visible_on_front'  => 1
    )
);

//MULTISELECT
$installer->addAttribute(Mage_Catalog_Model_Category::ENTITY,
    'probando_multiselect', array(
        'type'              => 'varchar', //'backend_type'
        'input'             => 'multiselect', //'frontend_input'
        'label'             => 'Probando un atributo Multiselect', //'frontend_label'
        'backend'           => 'eav/entity_attribute_backend_array',
        'source'            => 'ale_installer/entity_attribute_source_multiselect',
        'group'             => 'General',
        'required'          => 0, //'is_required', defaults to 1
        'visible_on_front'  => 1
    )
);

$installer->endSetup();