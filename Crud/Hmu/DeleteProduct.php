<?php
namespace Tbb\Crud\Hmu;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Result\PageFactory;

use Tbb\Crud\Model\Post;

class DeleteProduct  extends Action {

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->resultPageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute() {


            $value = $this->getRequest()->getParam('id');
            $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()
                ->get('Magento\Framework\App\ResourceConnection');
            $connection= $this->_resources->getConnection();

            $themeTable = $this->_resources->getTableName('tbb_crud');
            $sql = "DELETE FROM $themeTable WHERE id=10";
            // exit;
            $connection->query($sql);
            echo 'deleted';



    }


}