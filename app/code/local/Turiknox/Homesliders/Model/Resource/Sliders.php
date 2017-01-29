<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Model_Resource_Sliders extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('turiknox_homesliders/sliders', 'slider_id');
    }
}