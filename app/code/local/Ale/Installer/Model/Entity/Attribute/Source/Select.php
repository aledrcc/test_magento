<?php

//app/code/local/Ale/Installer/Model/Entity/Attribute/Source/Select.php

class Ale_Installer_Model_Entity_Attribute_Source_Select
    extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
    public function getAllOptions()
    {
        return array(
            array('value' => '0', 'label' => ''),
            array('value' => '1', 'label' => 'Mi texto 1'),
            array('value' => '2', 'label' => 'Mi texto 2'),
            array('value' => '3', 'label' => 'Mi texto 3'),
        );
    }
}