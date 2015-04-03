<?php

class Day_Two_Block_Sample
    extends Mage_Core_Block_Template
{
    protected function _toHtml() {
        return 'Hello Magento from ' . __FILE__; //__FILE__ | __CLASS__ | __METHOD__
    }
}