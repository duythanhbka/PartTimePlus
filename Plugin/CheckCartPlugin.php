<?php
/**
 * Created by PhpStorm.
 * User: ndt
 * Date: 26/08/2018
 * Time: 13:49
 */
namespace Magenest\PartTimePlus2\Plugin;

class CheckCartPlugin
{
    public function afterHasItems($subject, $result)
    {
        $items = $subject->getData('items');
        foreach ($items as $item) {
            $quantity = $item->getData('qty');
            if ($quantity > 1) {
                return false;
            }
        }
        return $result;
    }
}