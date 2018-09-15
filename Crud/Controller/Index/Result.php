<?php

namespace Tbb\Crud\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;
use Tbb\Crud\Hmu\InsertProduct;

class Result extends Action
{
    /** @var PageFactory $resultPageFactory */
    protected $resultPageFactory;

    /**
     * Result constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * The controller action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $number = $this->getRequest()->getParam('number');

        $resultPage = $this->resultPageFactory->create();

        /** @var Messages $messageBlock */
        $messageBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Messages',
            'answer'
        );
        if (is_numeric($number)) {
            $item = $this->_objectManager->create("Tbb\Crud\Model\Post");
            $item->setName($number);
            $item->save();
            $messageBlock->addSuccess($number . ' Has been successfully insert to database');
            $insertProduct = new InsertProduct();

        }else{
            $messageBlock->addError('You didn\'t enter a number!');
        }

        $resultPage->getLayout()->setChild(
            'content',
            $messageBlock->getNameInLayout(),
            'answer_alias'
        );


        return $resultPage;
    }
}