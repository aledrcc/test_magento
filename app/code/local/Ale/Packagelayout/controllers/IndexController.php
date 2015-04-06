<?php

class Ale_Packagelayout_IndexController extends Mage_Core_Controller_Front_Action
{
    //Muestra los handles de este controller
    public function handleAction()
    {
        $this->loadLayout();
        $handles = Mage::getSingleton('core/layout')->getUpdate()->getHandles();
        var_dump($handles);
        exit;
    }

    public function layoutfilesAction()
    {
        $updatesRoot = Mage::app()->getConfig()->getNode('frontend/layout/updates');
        $updateFiles = array();

        foreach ($updatesRoot->children() as $updateNode) {
            if ($updateNode->file) {
                $module = $updateNode->getAttribute('module');
                if ($module &&  Mage::getStoreConfigFlag('advanced/modules_disable_output/' . $module)) {
                    continue;
                }
                $updateFiles[] = (string)$updateNode->file;
            }
        }
        $updateFiles[] = 'local.xml';
        var_dump($updateFiles);
    }
}