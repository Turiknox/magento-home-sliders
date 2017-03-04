<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Homesliders directory
     */
    const HOMESLIDERS_DIR = 'homesliders';

    /**
     * Get home sliders URL
     *
     * @return string
     */
    public function getHomeSlidersUrl()
    {
        return Mage::getBaseUrl('media') . self::HOMESLIDERS_DIR . DS;
    }

    /**
     * Get home sliders directory
     *
     * @return string
     */
    public function getHomeSlidersDir()
    {
        return Mage::getBaseDir('media') . DS . self::HOMESLIDERS_DIR . DS;
    }

    /**
     * Get the slider image URL
     *
     * @param $image
     * @return bool|string
     */
    public function getImageUrl($image)
    {
        $imageLoc = $this->getHomeSlidersDir() . $image;
        if (is_file($imageLoc)) {
            return $this->getHomeSlidersUrl() . $image;
        }
        return false;
    }
}