<?php

//app/code/local/Ale/Installer/Model/Entity/Attribute/Source/Multiselect.php

class Ale_Installer_Model_Entity_Attribute_Source_Multiselect
    extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
    public function getAllOptions()
    {
        return array(
            array('value' => '1', 'label' => 'Mi mutitexto 1'),
            array('value' => '2', 'label' => 'Mi mutitexto 2'),
            array('value' => '3', 'label' => 'Mi mutitexto 3'),
        );
    }
}