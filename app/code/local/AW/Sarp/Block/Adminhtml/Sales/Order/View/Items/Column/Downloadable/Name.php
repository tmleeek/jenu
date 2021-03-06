<?php
/**
* aheadWorks Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://ecommerce.aheadworks.com/AW-LICENSE-ENTERPRISE.txt
 *
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento ENTERPRISE edition
 * aheadWorks does not guarantee correct work of this extension
 * on any other Magento edition except Magento ENTERPRISE edition.
 * aheadWorks does not provide extension support in case of
 * incorrect edition usage.
 * =================================================================
 *
 * @category   AW
 * @package    AW_Sarp
 * @version    1.7.0
 * @copyright  Copyright (c) 2010-2012 aheadWorks Co. (http://www.aheadworks.com)
 * @license    http://ecommerce.aheadworks.com/AW-LICENSE-ENTERPRISE.txt
 */

class AW_Sarp_Block_Adminhtml_Sales_Order_View_Items_Column_Downloadable_Name extends Mage_Downloadable_Block_Adminhtml_Sales_Items_Column_Downloadable_Name
{
    public function getOrderOptions()
    {
        $result = array();
        if ($options = $this->getItem()->getProductOptions()) {
            $startDateLabel = $this->getItem()->getIsVirtual() ? $this->__("Subscription start:")
                    : $this->__("First delivery:");
            if (isset($options['info_buyRequest'])) {
                $periodTypeId = @$options['info_buyRequest']['aw_sarp_subscription_type'];
                $periodStartDate = @$options['info_buyRequest']['aw_sarp_subscription_start'];
                if ($periodTypeId && $periodStartDate) {
                    $result[] = array(
                        'label' => $this->__('Subscription type:'),
                        'value' => Mage::getModel('sarp/period')->load($periodTypeId)->getName()
                    );

                    $result[] = array(
                        'label' => $startDateLabel,
                        'value' => $periodStartDate
                    );
                }
            }
            $result = array_merge($result, parent::getOrderOptions());
        }
        return $result;
    }
}
