<?php

/**
 * Product:       Xtento_OrderExport (1.8.2)
 * ID:            /rRDmPy6ZEZj9ocZGuuFjhblVHpQKfaGmtArmCqlOFM=
 * Packaged:      2015-06-18T20:45:41+00:00
 * Last Modified: 2013-03-07T13:12:11+01:00
 * File:          app/code/local/Xtento/OrderExport/Block/Adminhtml/Log/Grid/Renderer/Type.php
 * Copyright:     Copyright (c) 2015 XTENTO GmbH & Co. KG <info@xtento.com> / All rights reserved.
 */

class Xtento_OrderExport_Block_Adminhtml_Log_Grid_Renderer_Type extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Options
{
    public function render(Varien_Object $row)
    {
        if ($row->getExportType() != Xtento_OrderExport_Model_Export::EXPORT_TYPE_EVENT) {
            return parent::render($row);
        } else {
            return parent::render($row)." (".Mage::helper('xtento_orderexport')->__('Event').": ".$row->getExportEvent().")";
        }
    }
}