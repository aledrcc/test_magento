<?php

class Day_Two_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo 'We\'re cool now!';
    }

    public function modelAction()
    {
        echo get_class( Mage::getmodel('day_two/whatever') );
    }

    public function layoutAction()
    {
        //Me permite ver como se mergean los layouts
        //Al no aclarar nada en getLayout me devuelve el nodo default
        $xml = $this->loadLayout()->getLayout()->getUpdate()->asString();

        $this->getResponse()->setHeader('Content-Type', 'text/plain')->setBody($xml);

        //Esto me permite sacar info a un file
        Mage::log($xml,Zend_Log::INFO,'layout.log',true);

        //Otra forma de usar el Mage Log. El $model->debug me da un resumen de lo importante.pp
        $model = Mage::getModel('day_two/whatever');
        Mage::log($model->debug(),Zend_Log::INFO,'model.log',true);
    }

    public function defaultAction()
    {
        //Me permite ver el layout especificado en default
        $this->loadLayout()->renderLayout();
    }
}