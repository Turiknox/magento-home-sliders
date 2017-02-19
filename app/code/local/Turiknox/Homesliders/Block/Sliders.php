<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Sliders extends Mage_Core_Block_Template
{
    /**
     * Slider model
     *
     * @var null|Turiknox_Homesliders_Model_Sliders
     */
    protected $_sliderModel;

    /**
     * Check the module is enabled in the admin
     *
     * @return bool
     */
    public function isEnabled()
    {
        return Mage::getStoreConfigFlag('homesliders/general/enable');
    }

    /**
     * Check if the sliders should be automated
     *
     * @return bool
     */
    public function getSlideshow()
    {
        return Mage::getStoreConfigFlag('homesliders/slider/animate');
    }

    /**
     * Get the slideshow speed
     *
     * @return mixed
     */
    public function getSlideshowSpeed()
    {
        return Mage::getStoreConfig('homesliders/slider/speed');
    }

    /**
     * Check if the directional navigation should be shown
     *
     * @return bool
     */
    public function getDirectionNav()
    {
        return Mage::getStoreConfigFlag('homesliders/slider/direction');
    }

    /**
     * Check if the control navigation should be shown
     *
     * @return bool
     */
    public function getControlNav()
    {
        return Mage::getStoreConfigFlag('homesliders/slider/paging');
    }

    /**
     * Check if the slideshow should be paused on hover
     *
     * @return bool
     */
    public function getPauseOnHover()
    {
        return Mage::getStoreConfigFlag('homesliders/slider/pause');
    }

    /**
     * @return bool
     */
    public function getLinkTarget()
    {
        return Mage::getStoreConfigFlag('homesliders/slider/link');
    }

    /**
     * Retrieve the sliders model
     *
     * @return false|Mage_Core_Model_Abstract|Turiknox_Homesliders_Model_Sliders
     */
    public function getSliderModel()
    {
        if (is_null($this->_sliderModel)) {
            $this->_sliderModel = Mage::getModel('turiknox_homesliders/sliders');
        }
        return $this->_sliderModel;
    }

    /**
     * Retrieve the sliders collection
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    public function getSlidersCollection()
    {
        return $this->getSliderModel()->getSlidersCollection();
    }
}