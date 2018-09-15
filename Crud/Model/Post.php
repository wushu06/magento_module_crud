<?php
namespace Tbb\Crud\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'tbb_crud';

    protected $_cacheTag = 'tbb_crud';

    protected $_eventPrefix = 'tbb_crud';

    protected function _construct()
    {
        $this->_init('Tbb\Crud\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}