<?php
namespace Tbb\Crud\Block;
use Tbb\Crud\Hmu\GetProduct;

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
    public function getFormAction()
    {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder

        return '/Tbb_Crud/Adminhtml/CrudCreate/Result';
        // here controller_name is index, action is booking
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        return $post->getCollection();
    }


}