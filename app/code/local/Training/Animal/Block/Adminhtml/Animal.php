<?php

class Training_Animal_Block_Adminhtml_Animal
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /*
     * Initialize grid container settings
     * The child grid block class will be:
     *
     * $this->_blockGroup . '/' . $this->_controller . '_grid'
     * i.e. training/adminhtml_animal_grid
     */

    protected function _construct()
    {
        $this->_blockGroup = 'training';
        $this->_controller = 'adminhtml_animal';
        $this->_headerText = $this->__('List Animals');

        parent::_construct();
    }
}