<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders_Helper_Form_Image extends Varien_Data_Form_Element_Image
{
    /**
     * Show the slider image on the form
     *
     * @return bool|string
     */
    protected function _getUrl()
    {
        $url = false;
        if ($this->getValue() && !is_array($this->getValue())) {
            $url = Mage::helper('turiknox_homesliders')->getHomeSlidersUrl() . $this->getValue();
        }

        return $url;
    }
}