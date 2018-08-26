<?php
namespace Magenest\PartTimePlus2\Setup;

use Magento\Catalog\Model\Product;
use Magento\Customer\Model\Customer;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Eav\Model\Entity\Attribute\Set;

class UpgradeData implements UpgradeDataInterface{


    protected $_eavSetupFactory;

    protected $customerSetupFactory;

    protected $attributeSet;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory,
        \Magento\Eav\Model\Entity\Attribute\SetFactory $attributeSet
    ) {
        $this->_eavSetupFactory = $eavSetupFactory;
        $this->customerSetupFactory = $customerSetupFactory;
        $this->attributeSet = $attributeSet;
    }

    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);
//        $eavSetup->removeAttribute(
//            \Magento\Catalog\Model\Product::ENTITY,
//            'roomtype');
        if($context->getVersion() && version_compare($context->getVersion(), '1.0.2')< 0) {
            $eavSetup->addAttribute(Product::ENTITY
                , 'question',
                [
                    'type'                    => 'text',
                    'backend'                 => '',
                    'frontend'                => '',
                    'group'                   => '',
                    'label'                   => 'Question',
                    'input'                   => 'text',
                    'class'                   => '',
                    'source'                  => '',
                    'global'                  => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible'                 => true,
                    'required'                => false,
                    'user_defined'            => false,
                    'system'                  => true,
                    'default'                 => '',
                    'searchable'              => false,
                    'filterable'              => true,
                    'comparable'              => false,
                    'visible_on_front'        => false,
                    'used_in_product_listing' => true,
                    'unique'                  => false,
//                    'apply_to'                => ''
                ]
            );
        }

//        if($context->getVersion() && version_compare($context->getVersion(), '1.0.1')< 0) {
//            $customerSetup = $this->customerSetupFactory->create(['setup'=>$setup]);
//            $customerSetup->addAttribute(Customer::ENTITY,
//                "is_manager",
//                [
//                    'type' => 'int',
//                    'label' => 'is manage',
//                    'input' => 'select',
//                    'backend' => '',
//                    'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
//                    'required' => true,
//                    'default' => '0',
//                    'visible' => true,
//                    'user_defined' => true,
//                    'sort_order' => 100,
//                    'position' => 100,
//                    'system' => 0,
//                    'is_used_in_grid' => true,
//                    'is_visible_in_grid' => true,
//                    'is_html_allowed_on_front' => true,
//                    'visible_on_front' => true
//                ]
//            );
//            $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
//            $attributeSetId = $customerEntity->getDefaultAttributeSetId();
//
//            /** @var $attributeSet AttributeSet */
//            $attributeSet = $this->attributeSet->create();
//            $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);
//            $attribute = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'is_manager')
//                ->addData([
//                    'attribute_set_id' => $attributeSetId,
//                    'attribute_group_id' => $attributeGroupId,
//                    'used_in_forms' => ['adminhtml_customer', 'customer_account_edit'],
//                ]);
//
//            $attribute->save();
//        }
    }
}