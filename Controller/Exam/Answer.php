<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 27/08/2018
 * Time: 09:45
 */
namespace Magenest\PartTimePlus2\Controller\Exam;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Answer extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * Create resultPage
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}
