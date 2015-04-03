<?php

class Training_Animal_Adminhtml_AnimalController
    extends Mage_Adminhtml_Controller_Action
{
    /* TODO ESTO NO FUNCIONA PORQUE FALTAN ARCHIVOS Y CODIGO */

    public function indexAction()
    {
        //Redirect user via 302 http redirect (the browser url changes)
        $this->_redirect('*/*/list');

        //To redirect o another URL without module/controller/action:
        //$this->_redirectUrl('http://google.com/');
    }

    //Display grid
    public function listAction()
    {
        //Housekeeping
        $this->_getSession()->setFormData(array());

        $this->_title($this->__('Catalog'))
             ->_title($this->__('Animals'));

        $this->loadLayout();

        $this->_setActiveMenu('catalog/training');
        $this->_addBreadcrumb($this->__('Catalog'), $this->__('Catalog'));
        $this->_addBreadcrumb($this->__('Animals'), $this->__('Animals'));

        $this->renderLayout();
    }

    //Check ACL permissions
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')
                        ->isAllowed('catalog/training');
    }

    //Grid Action for AJAX requests
    public function gridAction()
    {
        $this->loadLayout()->renderLayout();
    }

    public function newAction()
    {
        //Redirect the user internally
        $this->_forward('edit');
    }

    //Create or edit
    public function editAction()
    {
        $model = Mage::getModel('training/animal');
        Mage::register('current_animal', $model);
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (! $model->load($id)->getId()) {
                    Mage::throwException($this->__('No record with ID "%s" found.', $id));
                }
            }

            if ($model->getId()) {
                $pageTitle = $this->__('Edit %s (%s)', $model->getName(), $model->getType());
            } else {
                $pageTitle = $this->__('New Animal');
            }
            $this->_title($this->__('Catalog'))
                 ->_title($this->__('Animals'))
                 ->_title($pageTitle);

            $this->loadLayout();

            $this->_setActiveMenu('catalog/training');
            $this->_addBreadcrumb($this->__('Catalog'), $this->__('Catalog'));
            $this->_addBreadcrumb($this->__('Animals'), $this->__('Animals'));
            $this->_addBreadcrumb($pageTitle, $pageTitle);

            $this->renderLayout();
        }
        catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*/list');
        }
    }

    //Process form post
    public function saveAction()
    {
        if ($data = $this->getRequest()->getPost()) {
            $this->_getSession()->setFormData($data);
            $model = Mage::getModel('training/animal');
            $id = $this->getRequest()->getParam('id');

            try {
                if ($id) {
                    $model->load($id);
                }
                $model->addData($data);
                $model->save();

                $this->_getSession()->addSuccess(
                    $this->__('Animal was successfully saved')
                );
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $params = array('id' => $model->getId());
                    $this->_redirect('*/*/edit', $params);
                } else {
                    $this->_redirect('*/*/list');
                }
            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                if ($model && $model->getid()) {
                    $this->_redirect('*/*/edit', array(
                        'id' => $model->getId()
                    ));
                } else {
                    $this->_redirect('*/*/new');
                }
            }

            return;
        }

        $this->_getSession()->addError($this->__('No data found to save'));
        $this->_redirect('*/*');
    }

    //Delete animal
    public function deleteAction()
    {
        $model = Mage::getModel('training/animal');
        $id = $this->getRequest()->getParam('id');

        try {
            if ($id) {
                if (! $model->load($id)->getId()) {
                    Mage::throwException(
                        $this->__('No record with ID "%s" found.', $id)
                    );
                }
                $name = $model->getName();
                $model->delete();
                $this->_getSession()->addSuccess(
                    $this->__('"%s" (ID %d) was successfully consumed', $name, $id)
                );

                $this->_redirect('*/*');
            }
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_getSession()->addError($e->getMessage());
            $this->_redirect('*/*');
        }
    }

}