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

class AW_Sarp_Block_Customer_Alert_Notification extends Mage_Core_Block_Template
{

    public function getTemplate()
    {
        switch ($this->getAlert()->getType()) {
            case AW_Sarp_Model_Alert::TYPE_DATE_START:
                return 'aw_sarp/alert/notification/date_start.phtml';
            case AW_Sarp_Model_Alert::TYPE_DATE_EXPIRE:
                return 'aw_sarp/alert/notification/date_expire.phtml';
            case AW_Sarp_Model_Alert::TYPE_NEW_SUBSCRIPTION:
                return 'aw_sarp/alert/notification/new_subscription.phtml';
            case AW_Sarp_Model_Alert::TYPE_CANCEL_SUBSCRIPTION:
                return 'aw_sarp/alert/notification/cancel_subscription.phtml';
        }
    }

    /**
     * Returns customer
     * @return Mage_Customer_Model_Customer
     */
    public function getCustomer()
    {
        return $this->getEvent()->getSubscription()->getCustomer();
    }
}