<?php

class Ale_Packagelayout_PackageController extends Mage_Core_Controller_Front_Action
{
    public function bothAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    //Aca veo que el Full Action Name Handle ale_packagelayout_package_index solo funciona para index (como era esperado)
    public function secondAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    //Esto es para ver los handlers
    public function loadLayout($handles=null, $generateBlocks=true, $generateXml=true)
    {
        $original_results = parent::loadLayout($handles, $generateBlocks, $generateXml);

        $handles = Mage::getSingleton('core/layout')->getUpdate()->getHandles();
        echo '<strong>Handles Generated For This Request: ' . implode(",", $handles) . '</strong>';

        return $original_results;
    }
}