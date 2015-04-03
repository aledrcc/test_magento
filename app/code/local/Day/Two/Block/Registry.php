<?php

class Day_Two_Block_Registry extends Mage_Core_Block_Template
{
    public function getThatRegistryValue()
    {
        $var = Mage::registry('some_var');

        return ($var) ? $var : 'You did not set the var!';
    }
}