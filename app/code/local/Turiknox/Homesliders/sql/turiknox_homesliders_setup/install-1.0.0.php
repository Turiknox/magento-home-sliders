<?php
/*
 * Turiknox_Homesliders

 * @category   Turiknox
 * @package    Turiknox_Homesliders
 * @copyright  Copyright (c) 2017 Turiknox
 * @license    https://github.com/turiknox/magento-home-sliders/blob/master/LICENSE.md
 * @version    1.0.0
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('turiknox_homesliders/sliders'))
    ->addColumn(
        'slider_id',
        Varien_Db_Ddl_Table::TYPE_INTEGER,
        null,
        array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ),
        'Slider ID'
    )
    ->addColumn(
        'title',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        ),
        'Title'
    )
    ->addColumn(
        'image',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        ),
        'Image'
    )
    ->addColumn(
        'image_label',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        ),
        'Image Label'
    )
    ->addColumn(
        'url',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        ),
        'URL'
    )
    ->addColumn(
        'html',
        Varien_Db_Ddl_Table::TYPE_TEXT,
        255,
        array(
            'nullable'  => false,
        ),
        'HTML'
    )
    ->addColumn(
        'sort_order',
        Varien_Db_Ddl_Table::TYPE_SMALLINT,
        null,
        array(
            'nullable'  => false,
            'default' => 0
        ),
        'Sort Order'
    )
    ->addColumn(
        'is_enabled',
        Varien_Db_Ddl_Table::TYPE_BOOLEAN,
        null,
        array(
            'nullable'  => false,
        ),
        'Status'
    );

$installer->getConnection()->createTable($table);
$installer->endSetup();
