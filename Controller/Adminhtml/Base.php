<?php

namespace Vaimo\Quote\Controller\Adminhtml;

use Magento\Framework\Controller\Result\JsonFactory;
use Psr\Log\LoggerInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Session\SessionManagerInterface;

use Vaimo\Quote\Api\Data\QuoteInterface;
use Vaimo\Quote\Model\QuoteFactory;
use Vaimo\Quote\Api\QuoteRepositoryInterface as Repository;

abstract class Base extends Action
{
    const ACL_RESOURCE          = 'Vaimo_Quote::all';
    const MENU_ITEM             = 'Vaimo_Quote::all';
    const PAGE_TITLE            = 'Quote module';
    const BREADCRUMB_TITLE      = 'Quote';
    const QUERY_PARAM_ID        = 'id';
    protected $_resource;
    /** @var Registry  */
    protected $registry;
    /** @var PageFactory  */
    protected $pageFactory;
    protected $modelFactory;
    protected $model;
    /** @var Page */
    protected $resultPage;
    protected $sessionManager;
    protected $repository;
    private $jsonFactory;
    /** @var Logger */
    protected $logger;


    public function __construct(
        ResourceConnection $resource,
        Context $context,
        Registry $registry,
        PageFactory $pageFactory,
        SessionManagerInterface $sessionManager,
        Repository $repository,
        QuoteFactory $factory,
        LoggerInterface $logger

    ){
        $this->_resource      = $resource;
        $this->registry       = $registry;
        $this->pageFactory    = $pageFactory;
        $this->sessionManager  = $sessionManager;
        $this->repository     = $repository;
        $this->modelFactory   = $factory;
        $this->logger         = $logger;
        parent::__construct($context);
    }
    /** {@inheritdoc} */
    public function execute()
    {
        $this->_setPageData();
        return $this->resultPage;
    }
    /** {@inheritdoc} */
    protected function _isAllowed()
    {
        $result = parent::_isAllowed();
        $result = $result && $this->_authorization->isAllowed(static::ACL_RESOURCE);
        return $result;
    }
    /**
     * @return Page
     */
    protected function _getResultPage()
    {
        if (null === $this->resultPage) {
            $this->resultPage = $this->pageFactory->create();
        }
        return $this->resultPage;
    }

    protected function _setPageData()
    {
        $resultPage = $this->_getResultPage();
//        $resultPage->setActiveMenu(static::MENU_ITEM);
        $resultPage->getConfig()->getTitle()->prepend((__(static::PAGE_TITLE)));
//        $resultPage->addBreadcrumb(__(static::BREADCRUMB_TITLE), __(static::BREADCRUMB_TITLE));
//        $resultPage->addBreadcrumb(__(static::BREADCRUMB_TITLE), __(static::BREADCRUMB_TITLE));
        return $this;
    }

    /** @return \Vaimo\Quote\Model\Quote */
    protected function getModel()
    {
        if (null === $this->model) {
            $this->model = $this->modelFactory->create();
        }
        return $this->model;
    }
    /**
     * @return ResultInterface
     */
    protected function doRefererRedirect()
    {
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $redirect->setUrl($this->_redirect->getRefererUrl());
        return $redirect;
    }
    /**
     * @return ResponseInterface
     * Returning us to the main Grid(Index Controller)
     */
    protected function redirectToGrid()
    {
        return $this->_redirect('*/*/index');
    }
}