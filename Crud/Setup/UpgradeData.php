<?php

namespace Tbb\Crud\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{


	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		if (version_compare($context->getVersion(), '2.1.1', '<')) {
            $data = [
                ['name' => 'Happy eid2']

            ];
            foreach ($data as $bind) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('tbb_crud'), $bind);
            }
		}
	}
}
