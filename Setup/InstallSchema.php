<?php

namespace Vaimo\Quote\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{


    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('vaimo_quote')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Id'
        )->addColumn(
            'CustomerFirstName',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'First Name'
        )->addColumn(
            'CustomerLastName',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Last Name'
        )->addColumn(
            'CustomerPhoneNumber',
            \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
            255,
            [],
            'Phone Number'
        )->addColumn(
            'Date',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            255,
            [],
            'Date of receiving a quote'
        )->addColumn(
            'Status',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Quote Status'
        )->setComment(
            'Table'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}