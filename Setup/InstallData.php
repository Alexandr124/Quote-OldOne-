<?php

namespace Vaimo\Test_attribute\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{


    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
//        $setup->startSetup();
//
//        $table = $setup->getConnection()->newTable(
//            $setup->getTable('vaimo_testattribute')
//        )->addColumn(
//            'id',
//            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
//            null,
//            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
//            'Id'
//        )->addColumn(
//            'Material',
//            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
//            255,
//            [],
//            'Material'
//        )->setComment(
//            'Table'
//        );
//        $setup->getConnection()->createTable($table);
//
//        $setup->endSetup();
    }
}