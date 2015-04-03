<?php

class Training_Animal_Model_Observer
{
    public function controllerActionPredispatch(Varien_Event_Observer $observer)
    {
        $user = Mage::getSingleton('admin/session')->getUser();
        if ($user) {
            $name = $user->getUsername();
        } else {
            $name = '- NOT LOGGED IN -';
        }
        Mage::log(
            $name . ' ' . Mage::app()->getRequest()->getPathInfo(), Zend_Log::INFO, 'admin.log', true
        );
    }
}