<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 27/08/2018
 * Time: 09:18
 */
namespace Magenest\PartTimePlus2\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddProductToCartObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $product = $observer->getData('product');
        $question = $product->getData('question');

        $subQuestion = substr ($question , 0 , 5);
        $keyword = strrev($subQuestion);

        $additionalOptions = [];
        $additionalOptions[] = array(
            'label' => 'Question special title',
            'value' => $keyword
        );

        $product->addCustomOption('additional_options', json_encode($additionalOptions));
    }
}