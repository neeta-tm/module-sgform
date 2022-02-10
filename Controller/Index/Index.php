<?php
namespace Syncitgroup\Sgform\Controller\Index;

/* Save Form Data into the database
*/
class Index extends \Magento\Framework\App\Action\Action
{
    /* var \Syncitgroup\Sgform\Helper\Data*/
    protected $helper;

    /*var \Magento\Framework\View\Result\PageFactory*/
    protected $_pageFactory;

    /* var \Magento\Framework\Controller\Result\ForwardFactory*/
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

    /* Save Form Data into the database
    */
    public function execute()
    {
        $isEnable = (int)$this->helper->isEnabled(0);
        if($isEnable) {
            return $this->_pageFactory->create();
        } else {
            $resultForward = $this->_forwardFactory->create();
            $resultForward->setController('index');
            $resultForward->forward('defaultNoRoute');
            return $resultForward;
        }
    }
}
