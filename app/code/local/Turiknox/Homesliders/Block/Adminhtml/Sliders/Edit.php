<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders_Edit  extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Turiknox_Homesliders_Block_Adminhtml_Sliders_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->_controller = 'adminhtml_sliders';
        $this->_blockGroup = 'turiknox_homesliders';

        $this->_removeButton('reset');
        $this->_addButton('save_and_edit_button', array(
            'label'     => $this->__('Save and Continue Edit'),
            'onclick'   => 'editForm.submit(\''.$this->getSaveAndContinueUrl().'\')',
            'class' => 'save'
        ));
    }

    /**
     * Enable the wysiwyg for form
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }

        return $this;
    }

    /**
     * Get header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('homesliders')->getId()) {
            return $this->__('Edit Slider');
        }
        return $this->__('New Slider');
    }

    /**
     * Retrieve the URL used for the save and continue link
     * This is the same URL with the back parameter added
     *
     * @return string
     */
    public function getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', array(
            '_current'   => true,
            'back'       => 'edit',
        ));
    }
}