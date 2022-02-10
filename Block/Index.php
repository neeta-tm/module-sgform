<?php
namespace Syncitgroup\Sgform\Block;
use Magento\Framework\View\Element\Template;

class Index extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
    protected function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Syncit Group Custom Form'));
        return parent::_prepareLayout();
    }
}
