<?php

namespace Tbb\Crud\Controller\Adminhtml\CrudCreate;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface; // Needed to retrieve config values


use Magento\Framework\Controller\ResultFactory;

class Result extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var scopeConfig
     * Needed to retrieve config values
     */
    protected $scopeConfig;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function deleteData($value)
    {


        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
            ->get('Magento\Framework\App\ResourceConnection');
        $connection = $this->_resources->getConnection();

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


        } else {
            $msg = 'You didn\'t enter a number!';
        }
        return $msg;

    }

    /**
     * Index Action*
     * @return void
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
