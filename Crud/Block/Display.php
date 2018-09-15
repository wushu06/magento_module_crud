<?php
namespace Tbb\Crud\Block;
class Display extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
      //  \Mageplaza\HelloWorld\Model\PostFactory $customFactory,
        \Tbb\Crud\Model\PostFactory $customFactory
    )
    {
        $this->_postFactory = $customFactory;
       // $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }

}