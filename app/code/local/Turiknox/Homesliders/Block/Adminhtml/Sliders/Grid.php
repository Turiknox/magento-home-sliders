<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Turiknox_Homesliders_Block_Adminhtml_Sliders_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('slider_id');
        $this->setId('homesliders_grid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Prepare sliders collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('turiknox_homesliders/sliders')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare grid columns
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header'=> $this->__('Slider ID'),
                'align' =>'right',
                'width' => '50px',
                'index' => 'slider_id'
            )
        );

        $this->addColumn('title',
            array(
                'header'=> $this->__('Title'),
                'index' => 'title'
            )
        );

        $this->addColumn('image',
            array(
                'header'=> $this->__('Image'),
                'index' => 'image',
                'renderer' => 'Turiknox_Homesliders_Block_Adminhtml_Sliders_Grid_Renderer_Image'
            )
        );

        $this->addColumn('is_enabled',
            array(
                'header'=> $this->__('Status'),
                'index' => 'is_enabled',
                'type'		=> 'options',
                'options'	=> array(
                    1 => $this->__('Enabled'),
                    0 => $this->__('Disabled'),
                ),
                'width' => '100px'
            )
        );

        $this->addColumn('sort_order',
            array(
                'header'=> $this->__('Sort Order'),
                'index' => 'sort_order',
                'width' => '50px'
            )
        );

        return parent::_prepareColumns();
    }

    /**
     * Get the row edit URL
     *
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}