<?php
namespace Syncitgroup\Sgform\Controller\Index;
use Magento\Framework\Controller\ResultFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $helper;
    protected $_pageFactory;
    protected $forwardFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Syncitgroup\Sgform\Helper\Data $helper,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory
    ) {
        $this->helper = $helper;
        $this->_pageFactory = $pageFactory;
        $this->_forwardFactory = $forwardFactory;
        return parent::__construct($context);
    }
    public function execute()
    {
        $isEnable = (int)$this->helper->isEnabled(0);
        if($isEnable)
        {
            $this->messageManager->addSuccessMessage(__("Thank you for submitting to Syncit Group custom form!"));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
            
        } else {
            $resultForward = $this->_forwardFactory->create();
            $resultForward->setController('index');
            $resultForward->forward('defaultNoRoute');
            return $resultForward;
        }
    }
}
