<?php

//app/code/local/Ale/Layout/Block/Sample6.php

class Ale_Layout_Block_Sample6 extends Mage_Core_Block_Template
{
    public function _construct()
    {
        $this->setTemplate('ale_layout/sampletemplate6.phtml');
        return parent::_construct();
    }

    public function _beforeToHtml()
    {
        $childBlock1 = new Mage_Core_Block_Text();
        $childBlock1->setText('One paragraph to rule them all.');
        $this->setChild('the_first', $childBlock1);

        $childBlock2 = new Mage_Core_Block_Text();
        $childBlock2->setText('One paragraph to find them.');
        $this->setChild('the_second', $childBlock2);
    }

    public function fetchTitle()
    {
        return 'Hello Fancy World!';
    }
}