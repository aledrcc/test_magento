<?php

class Training_Animal_Block_Adminhtml_Animal_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    //Initialize grid settings
    protected function _construct()
    {
        parent::_construct();

        $this->setId('training_animal_list');
        $this->setDefaultSort('id');

        /*
         * Override method getGridUrl() in this
         * class to provide URL for ajax requests
         */
        $this->setUseAjax(true);
    }

    /*
     * Prepare animal collection
     *
     * @return Training_Animal_Block_Adminhtml_Animal_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('training/animal_collection');
        $this->setCollection($collection);

        //INCOMPLETO
    }
}