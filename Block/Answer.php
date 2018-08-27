<?php

namespace Magenest\PartTimePlus2\Block;

use Magento\Framework\View\Element\Template;

class Answer extends \Magento\Framework\View\Element\Template
{
    protected $orderObject;

    public function __construct(
        Template\Context $context,
        \Magento\Sales\Model\OrderFactory $orderObject,
        array $data = [])
    {
        $this->orderObject = $orderObject;
        parent::__construct($context, $data);
    }

    public function getOrderCollection()
    {
        $object = $this->orderObject->create();
        $orderCollection = $object->getCollection();
        return $orderCollection;
    }

    public function getQuestions()
    {
        $orderCollection = $this->getOrderCollection();
        $questions = [];
        foreach ($orderCollection as $order) {
            $orderId = $order->getEntityId();

            $items = $order->getAllVisibleItems();
            $k = 0;


            foreach ($items as $item) {
                  $questions[$orderId][$k++] = $item->getProduct()->getData('question');
            }
        }

        return $questions;
    }
}