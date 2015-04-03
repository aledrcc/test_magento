<?php

//app/code/local/Day/Two/controllers/ModelsController.php

class Day_Two_ModelsController extends Mage_Core_Controller_Front_Action
{
    public function storesAction()
    {
        $stores = Mage::getResourceModel('core/store_collection');
        //$stores = Mage::getModel('core/store')->getCollection();

        echo '<h2 style="color:red;">' . get_class($stores) . '</h2>';

        foreach ($stores as $store)
        {
            /*
            echo '<h2 style="color:red;">' . get_class($store) . ' | ' . $store->getRootCategoryId() . '</h2>';
            echo '<h2>' . $store->getName() . ' | ' . $store->getCode() . '</h2>';
            */

            $category = Mage::getModel('catalog/category')->load( $store->getRootCategoryId() );
            echo '<h2>' . $category->getName() . '</h2>';
        }
    }

    public function categoriesAction()
    {
        //El level 1 son las root. Hace falta agregar el name a mano por la organización de las tablas (JOINs por IDs).
        $categories = Mage::getResourceModel('catalog/category_collection')
            ->addFieldToFilter('level', 1)
            ->addAttributeToSelect('name');

        foreach ( $categories as $category )
        {
            echo '<h2>'.$category->getId().'|'.$category->getName().'</h2>';

            $children = $category->getChildren();

            //Esto es por como vienen en getChildren
            $childrenIds = explode(',', $children);

            foreach ($childrenIds as $childId)
            {
                $child = Mage::getModel('catalog/category')->load($childId);
                Zend_Debug::dump($child->debug());
            }
        }
    }
}