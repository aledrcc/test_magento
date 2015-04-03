<?php

class First_Module_Model_Product extends Mage_Catalog_Model_Product
{
    //Esto transforma los nombres a uppercase
    public function getName(){
        $name = parent::getName();
        return strtoupper($name);
    }
}