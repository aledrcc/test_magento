<?php

//app/code/local/Training/Animal/Model/Mysql4/Animal.php

class Training_Animal_Model_Mysql4_Animal extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        //esto busca en entites en el resourceModel en el config.xml
        $this->_init('training/animal', 'entity_id');
    }
}
