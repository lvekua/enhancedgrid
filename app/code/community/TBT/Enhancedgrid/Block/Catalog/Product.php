<?php
/**
 * Sweet Tooth.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Sweet Tooth
 *
 * @copyright  Copyright (c) 2008-2011 Sweet Tooth (http://www.sweettoothrewards.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Catalog manage products block.
 *
 * @category   Sweet Tooth
 * @author      Jay El-Kaake <jay@sweettoothhq.com>
 */
class TBT_Enhancedgrid_Block_Catalog_Product extends Mage_Adminhtml_Block_Catalog_Product
{
    public function __construct()
    {
        parent::__construct();
        $this->_headerText = Mage::helper('enhancedgrid')->__('Manage Products (Enhanced)');
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->setTemplate('tbt'.DS.'enhancedgrid'.DS.'catalog'.DS.'product.phtml');
        $this->setChild('grid', $this->getLayout()->createBlock('enhancedgrid/catalog_product_grid', 'product.enhancedgrid'));

        //@nelkaake -a 16/11/10:
        $store_switcher =  $this->getLayout()->createBlock('adminhtml/store_switcher', 'store_switcher');
        $store_switcher->setUseConfirm(false);
        $this->setChild('store_switcher', $store_switcher);

        $this->setChild('add_new_button',
        $this->getLayout()->createBlock('adminhtml/widget_button')
            ->setData(array(
                'label'     => Mage::helper('catalog')->__('Add Product'),
                'onclick'   => "setLocation('".$this->getUrl('adminhtml/*/new')."')",
                'class'   => 'add',
                ))
        );
    }
}
