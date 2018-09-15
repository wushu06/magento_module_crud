<?php
namespace Tbb\Crud\Controller\Adminhtml\CrudCreate;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Config\ScopeConfigInterface; // Needed to retrieve config values

class Index extends \Magento\Backend\App\Action
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
        PageFactory $resultPageFactory,
        ScopeConfigInterface $scopeConfig // Needed to retrieve config values
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->scopeConfig = $scopeConfig; // Needed to retrieve config values
    }

    /**
     * Index Action*
     * @return void
     */
    public function execute()
    {
        /** @var \MAgento\Backend\Model\View\Result\Page $resultPage */
      $resultPage = $this->resultPageFactory->create();
       $resultPage->setActiveMenu('Tbb_Crud::crudCreate');
      $resultPage->getConfig()->getTitle()->prepend(__('Crud Create')); // Changing the page title

        return $resultPage;

    }
}
