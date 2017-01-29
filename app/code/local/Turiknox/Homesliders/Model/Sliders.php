<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/LICENSE.md
 * @version    1.0.0
 */
class Turiknox_Homesliders_Model_Sliders extends Mage_Core_Model_Abstract
{
    /**
     * Allowed file extensions
     *
     * @var array
     */
    protected $_allowedExtensions = array(
        'jpg',
        'jpeg',
        'gif',
        'png'
    );


    public function _construct()
    {
        $this->_init('turiknox_homesliders/sliders');
    }

    /**
     * Get the sliders collection
     *
     * @return Turiknox_Homesliders_Model_Resource_Sliders_Collection
     */
    public function getSlidersCollection()
    {
        return $this->getCollection()
            ->addFieldToFilter('is_enabled', 1)
            ->setOrder('sort_order', 'ASC');
    }

    /**
     * Upload slider image
     *
     * @param $fileId
     * @return mixed
     * @throws Exception
     */
    public function uploadImage($fileId)
    {
        try {
            $uploader = new Varien_File_Uploader($fileId);
            $uploader->setAllowedExtensions($this->_allowedExtensions);
            $uploader->setAllowRenameFiles(true);

            $result = $uploader->save(Mage::helper('turiknox_homesliders')->getHomeSlidersDir());
            return $result['file'];
        } catch (Exception $e) {
            if ($e->getCode() != Varien_File_Uploader::TMP_NAME_EMPTY) {
                throw $e;
            }
        }
    }
}