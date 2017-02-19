<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Turiknox_Homesliders_Block_Adminhtml_Sliders constructor.
     */
    public function __construct()
    {
        $this->_controller = 'adminhtml_sliders';
        $this->_blockGroup = 'turiknox_homesliders';
        $this->_headerText = $this->__('Home Sliders');
        $this->_addButtonLabel = $this->__('Add Slider');

        parent::__construct();
    }
}