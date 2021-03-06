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


    public function deleteData($value)
    {


        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Magento\Framework\App\ResourceConnection');
        $connection= $this->_resources->getConnection();

        $themeTable = $this->_resources->getTableName('tbb_crud');
        $sql = "DELETE FROM $themeTable WHERE id=$value";
        // exit;
        $connection->query($sql);


    }
    public function insertData($number)
    {

        if (is_numeric($number)) {
            $item = $this->_objectManager->create("Tbb\Crud\Model\Post");
            $item->setName($number);
            $item->save();
            $msg = $number . ' Has been successfully insert to database';


        }else{
            $msg = 'You didn\'t enter a number!';
        }
        return $msg;

    }



    /**
     * The controller action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $number = $this->getRequest()->getParam('number');
        $value = $this->getRequest()->getParam('id');

        $resultPage = $this->resultPageFactory->create();

        /** @var Messages $messageBlock */
        $messageBlock = $resultPage->getLayout()->createBlock(
            'Magento\Framework\View\Element\Messages',
            'answer'
        );
        if($value) {
            $this->deleteData($value);
            $messageBlock->addSuccess('deleted');

        }else {
            $this->insertData($number);
            $messageBlock->addSuccess( 'inserted');
            //$messageBlock->addError( $this->insertData($number));
        }

        $resultPage->getLayout()->setChild(
            'content',
            $messageBlock->getNameInLayout(),
            'answer_alias'
        );


        return $resultPage;
    }
}
