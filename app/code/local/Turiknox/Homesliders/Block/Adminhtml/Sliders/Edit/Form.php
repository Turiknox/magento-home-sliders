<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Block_Adminhtml_Sliders_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Turiknox_Homesliders_Block_Adminhtml_Sliders_Edit_Form constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('edit_form');
        $this->setTitle($this->__('Slider Information'));
    }

    /**
     * Prepare the slider form
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $sliderModel = Mage::registry('homesliders');
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));
        $form->setFieldNameSuffix('slider');

        $fieldset = $form->addFieldset('slider_general', array(
            'legend'=> $this->__('General Information'),
            'class' => 'fieldset-wide',
        ));

        $this->_addElementTypes($fieldset);

        if ($sliderModel->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('title', 'text', array(
            'name' 		=> 'title',
            'label' 	=> $this->__('Title'),
            'title' 	=> $this->__('Title'),
            'required'	=> true,
            'class'		=> 'required-entry',
        ));

        $fieldset->addField('image', 'image', array(
            'name' 		=> 'image',
            'label' 	=> $this->__('Image'),
            'title' 	=> $this->__('Image'),
            'required'	=> true,
            'class'		=> 'required-entry required-file',
            'after_element_html' => '<br/><small>Allowed File Types: jpg, jpeg, gif, png</small>'
        ));

        $fieldset->addField('is_enabled', 'select', array(
            'name' => 'is_enabled',
            'title' => $this->__('Enabled'),
            'label' => $this->__('Enabled'),
            'required' => true,
            'values' => Mage::getModel('adminhtml/system_config_source_yesno')->toOptionArray(),
        ));

        $fieldset->addField('url', 'text', array(
            'name' 		=> 'url',
            'label' 	=> $this->__('URL'),
            'title' 	=> $this->__('URL')
        ));

        $fieldset->addField('image_label', 'text', array(
            'name' 		=> 'image_label',
            'label' 	=> $this->__('Image Label'),
            'title' 	=> $this->__('Image Label'),
        ));

        $fieldset->addField('html', 'editor', array(
            'name' => 'html',
            'label' => $this->__('HTML'),
            'title' => $this->__('HTML'),
            'style' => 'height: 200px;',
            'wysiwyg' => true,
            'config' =>
                Mage::getSingleton('cms/wysiwyg_config')->getConfig(array(
                    'add_widgets' => true,
                    'add_variables' => true,
                    'add_image' => true,
                    'files_browser_window_url' => $this->getUrl('adminhtml/cms_wysiwyg_images/index'))
                )
        ));

        $fieldset->addField('sort_order', 'text', array(
            'name' 		=> 'sort_order',
            'label' 	=> $this->__('Sort Order'),
            'title' 	=> $this->__('Sort Order'),
            'class'		=> 'validate-digits',
        ));

        if ($homesliders = Mage::registry('homesliders')) {
            $form->setValues($homesliders->getData());
        }

        $form->setValues($sliderModel->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Block class to show slider image on the form
     *
     * @return array
     */
    protected function _getAdditionalElementTypes()
    {
        return array(
            'image' => Mage::getConfig()->getBlockClassName('turiknox_homesliders/adminhtml_sliders_helper_form_image')
        );
    }
}