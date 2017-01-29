<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Adminhtml_HomeslidersController extends Mage_Adminhtml_Controller_Action
{

    /**
     * Post data
     *
     * @array
     */
    protected $_post = array();

    /**
     * Load Manage Sliders area
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->_title('Home Sliders');
        $this->renderLayout();
    }

    /**
     *  Forward to Edit Action
     */
    public function newAction()
    {
        $this->_forward('edit');
    }

    /**
     * Add or edit sliders
     */
    public function editAction()
    {
        $id  = $this->getRequest()->getParam('id');
        $sliderModel = Mage::getModel('turiknox_homesliders/sliders');

        if ($id) {
            $sliderModel->load($id);
            if (!$sliderModel->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This slider no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        Mage::register('homesliders', $sliderModel);

        $this->loadLayout();
        $this->_title('Home Sliders');
        $this->renderLayout();
    }

    /**
     * Save the slider data
     */
    public function saveAction()
    {
        if ($this->_post = $this->getRequest()->getPost('slider')) {
            $slider = Mage::getModel('turiknox_homesliders/sliders')
                ->setData($this->_post)
                ->setSliderId($this->getRequest()->getParam('id'));

            try {
                $this->_prepareImageUpload($slider);
                $slider->save();
                $this->_getSession()->addSuccess($this->__('Slider was saved'));

            } catch (Exception $e) {
                $this->_getSession()->addError($e->getMessage());
                Mage::logException($e);
            }

            if ($this->getRequest()->getParam('back') && $slider->getId()) {
                $this->_redirect('*/*/edit', array('id' => $slider->getId()));
                return;
            }
        } else {
            $this->_getSession()->addError($this->__('There was no data to save'));
        }

        $this->_redirect('*/homesliders');
    }

    /**
     * Delete the slider data
     */
    public function deleteAction()
    {
        if ($this->getRequest()->getParam('id') > 0 ) {
            try {
                $sliderModel = Mage::getModel('turiknox_homesliders/sliders');
                $sliderModel->setId($this->getRequest()->getParam('id'))
                    ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Slider was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('slider_id')));
            }
        }
        $this->_redirect('*/*/');
    }

    /**
     * Preserve image if not modified
     * Empty image value if delete checkbox checked
     * Upload and save image if image has been uploaded
     *
     * @param $slider
     */
    protected function _prepareImageUpload($slider)
    {

        if (isset($this->_post['image']['value'])) {
            $slider->setImage($this->_post['image']['value']);
        }

        if (isset($this->_post['image']['delete']) && $this->_post['image']['delete'] === '1') {
            $slider->setImage('');
        }

        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] !== '') {
            $file = $_FILES['image'];
            if ($result = Mage::getModel('turiknox_homesliders/sliders')->uploadImage($file)) {
                $slider->setImage($result);
            }
        }
    }

    /**
     * Check if the page should be accessed
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('cms/homesliders');
    }
}