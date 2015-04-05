<?php

//app/code/local/Ale/Layout/controllers/IndexController.php

class Ale_Layout_IndexController extends Mage_Core_Controller_Front_Action
{
    public function layout6Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $update_manager = $layout->getUpdate();
        $update_manager->addUpdate('
            <block type="ale_layout/sample6"
                name="root"
                output="toHtml"
            />
        ');

        $layout->generateXml();
        $layout->generateBlocks();
        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function layout5Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $path = Mage::getModuleDir('','Ale_Layout') . DS . 'page-layouts' . DS . 'complex5.xml';

        $xml = simplexml_load_file($path,
            Mage::getConfig()->getModelClassName('core/layout_element')); //Generico para Mage_Core_Model_Layout_Element (por si cambia en el futuro)

        $layout->setXml($xml);

        $text = $layout->createBlock('core/text', 'foxxy')
            ->setText("The quick brown asdadasdasdasdasdasdasd wwww eee rr...");

        $layout->generateBlocks();
        $layout->getBlock('content')->insert($text);


        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function layout4Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $path = Mage::getModuleDir('','Ale_Layout') . DS . 'page-layouts' . DS . 'complex3.xml';

        $xml = simplexml_load_file($path,
            Mage::getConfig()->getModelClassName('core/layout_element')); //Generico para Mage_Core_Model_Layout_Element (por si cambia en el futuro)

        $layout->setXml($xml);

        $text = $layout->createBlock('core/text', 'foxxy')
                       ->setText("The quick brown asdadasdasdasdasdasdasd wwww eee rr...");

        $layout->generateBlocks();
        $layout->getBlock('content')->insert($text);


        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function layout3Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $path = Mage::getModuleDir('','Ale_Layout') . DS . 'page-layouts' . DS . 'complex3.xml';

        $xml = simplexml_load_file($path,
            Mage::getConfig()->getModelClassName('core/layout_element')); //Generico para Mage_Core_Model_Layout_Element (por si cambia en el futuro)

        $layout->setXml($xml);
        $layout->generateBlocks();
        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function layout2Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $path = Mage::getModuleDir('','Ale_Layout') . DS . 'page-layouts' . DS . 'samplelayout2.xml';

        $xml = simplexml_load_file($path,
            Mage::getConfig()->getModelClassName('core/layout_element')); //Generico para Mage_Core_Model_Layout_Element (por si cambia en el futuro)

        $layout->setXml($xml);
        $layout->generateBlocks();
        echo $layout->setDirectOutput(true)->getOutput();
    }

    public function layout1Action()
    {
        $layout = Mage::getSingleton('core/layout');
        $xml = simplexml_load_string('
            <layout>
                <block type="ale_layout/sample1" name="root" output="toHtml" />
            </layout>
        ', 'Mage_Core_Model_Layout_Element');

        $layout->setXml($xml);
        $layout->generateBlocks();
        echo $layout->setDirectOutput(true)->getOutput();
    }
}