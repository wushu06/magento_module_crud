<?php
namespace Tbb\Crud\Hmu;

class GetProduct extends \Magento\Framework\View\Element\Template
{

    protected $_productloader;


    public function __construct(
        \Magento\Catalog\Model\ProductFactory $_productloader

    ) {

        $this->_productloader = $_productloader;
    }
    public function getLoadProduct($id)
    {
        $product = $this->_productloader->create()->load($id);
        return $product->getName();

    }


}