<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders_Grid_Renderer_Image extends
    Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * Show slider image on the grid
     *
     * @param Varien_Object $row
     * @return string
     */
    public function render(Varien_Object $row)
    {
        if ($row->getImage()) {
            $value = $row->getData($this->getColumn()->getIndex());
            return sprintf('<img src="%s" height="75" />', $this->helper('turiknox_homesliders')->getHomeSlidersUrl() . $value);
        }
    }
}