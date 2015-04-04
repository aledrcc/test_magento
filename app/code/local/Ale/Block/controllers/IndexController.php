<?php

//app/code/local/Ale/Block/controllers/IndexController.php

class Ale_Block_IndexController extends Mage_Core_Controller_Front_Action
{
    public function template8Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $xml = simplexml_load_string('
            <layout>
                <block type="ale_block/sample8" name="root" output="toHtml" />
            </layout>
        ', 'Mage_Core_Model_Layout_Element');

        $layout->setXml($xml);
        $layout->generateBlocks();
        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function template7Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $block = $layout->createBlock('ale_block/sample7','root');

        //echo $block->toHtml();
        $layout->addOutputBlock('root'); //Que bloque empieza el rendering
        $layout->setDirectOutput(true); //Hace echo automaticamente de lo rendereado (si es false devuelve string y hay que hacer echo a mano)
        $layout->getOutput(); //Render
    }

    public function template6Action()
    {
        $mainBlock = new Ale_Block_Block_Sample6();

        echo $mainBlock->toHtml();
    }

    public function template5Action()
    {
        //$childBlock1 = new Mage_Core_Block_Text();
        //$childBlock1->setText('One paragraph to rule them all.');

        //$childBlock2 = new Mage_Core_Block_Text();
        //$childBlock2->setText('One paragraph to find them.');

        $mainBlock = new Ale_Block_Block_Sample5();
        //$mainBlock->setTemplate('ale_block/sampletemplate5.phtml'); //setTemplate('path/relative/to/template/*.php')

        //$mainBlock->setChild('the_first', $childBlock1);
        //$mainBlock->setChild('the_second', $childBlock2);

        echo $mainBlock->toHtml();
    }

    public function template4Action()
    {
        $childBlock1 = new Mage_Core_Block_Text();
        $childBlock1->setText('TEXTO A CAMBIAR !!!');

        $childBlock2 = new Mage_Core_Block_Text();
        $childBlock2->setText('One paragraph to find them.');

        $mainBlock = new Mage_Core_Block_Template();
        $mainBlock->setTemplate('ale_block/sampletemplate4.phtml'); //setTemplate('path/relative/to/template/*.php')

        $mainBlock->setChild('the_first', $childBlock1);
        $mainBlock->setChild('the_second', $childBlock2);

        //Lo cambio despues de asignar
        $childBlock1->setText('One paragraph to rule them all.');

        echo $mainBlock->toHtml();
    }

    public function template3Action()
    {
        $childBlock = new Mage_Core_Block_Text();
        $childBlock->setText('One paragraph to rule them all');

        $mainBlock = new Mage_Core_Block_Template();
        $mainBlock->setTemplate('ale_block/sampletemplate3.phtml'); //setTemplate('path/relative/to/template/*.php')

        $mainBlock->setChild('the_first', $childBlock);

        echo $mainBlock->toHtml();
    }

    public function template2Action()
    {
        $block = new Mage_Core_Block_Template();
        $block->setTemplate('ale_block/sampletemplate2.phtml'); //setTemplate('path/relative/to/template/*.php')

        echo $block->toHtml();
    }

    public function template1Action()
    {
        $block = new Mage_Core_Block_Text();
        $block->setText('Hello World!');

        echo $block->toHtml();
    }
}