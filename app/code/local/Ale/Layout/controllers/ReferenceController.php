<?php

class Ale_Layout_ReferenceController extends Mage_Core_Controller_Front_Action
{
    public function layout11Action()
    {
        $this->_initLayout();
        $this->_loadUpdateFileFromRequest();
        $this->_sendOutput();
    }

    public function layout10Action()
    {
        $this->_initLayout();
        $this->_loadUpdateFileFromRequest();
        $this->_sendOutput();
    }

    public function layout9Action()
    {
        $this->_initLayout();
        $this->_loadUpdateFile('fox9.xml');
        $this->_sendOutput();
    }

    public function layout8Action()
    {
        $this->_initLayout();

        Mage::getSingleton('core/layout')
            ->getUpdate()
            ->addUpdate('
                <reference name="content">
                    <block type="core/text" name="our_message">
                        <action method="setText"><text>Here we go!</text></action>
                    </block>
                </reference>
            ');

        $this->_sendOutput();
    }

    public function layout7Action()
    {
        $this->_initLayout();
        $this->_sendOutput();
    }

    protected function _initLayout()
    {
        $path_page = Mage::getModuleDir('','Ale_Layout') . DS . 'page-layouts' . DS . 'page7.xml';
        $xml = file_get_contents($path_page);

        $layout = Mage::getSingleton('core/layout')
            ->getUpdate()
            ->addUpdate($xml);
    }

    protected function _loadUpdateFile($file)
    {
        $path_update = Mage::getModuleDir('','Ale_Layout') . DS . 'content-updates' . DS . $file;

        $layout = Mage::getSingleton('core/layout')
            ->getUpdate()
            ->addUpdate(file_get_contents($path_update));
    }

    protected function _loadUpdateFileFromRequest()
    {
        $path_update = Mage::getModuleDir('','Ale_Layout') . DS . 'content-updates' . DS . $this->getFullActionName() . '.xml';

        $layout = Mage::getSingleton('core/layout')
            ->getUpdate()
            ->addUpdate(file_get_contents($path_update));
    }

    protected function _sendOutput()
    {
        $layout = Mage::getSingleton('core/layout');

        $layout->generateXml()->generateBlocks();

        echo $layout->setDirectOutput(false)->getOutput();
    }
}