<?php
class Brandyn_NuclearOption_ProductsController extends Mage_Core_Controller_Front_Action {

	public function indexAction()
	{
	    $this->loadLayout();
	    $this->renderLayout();
        if ($this->getRequest()->isPost()){
		    $this->disableAllProducts();
		}
	}

    public function preDispatch()
    {
        parent::preDispatch();
        $action = $this->getRequest()->getActionName();
        $loginUrl = Mage::helper('customer')->getLoginUrl();
 
        if (!Mage::getSingleton('customer/session')->authenticate($this, $loginUrl)) {
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }    

	public function disableAllProducts()
	{
	    $products = Mage::getModel('catalog/product')->getCollection();
	    foreach ($products as $product) {
			$storeId = Mage::app()->getStore()->getStoreId();
		    $productId = $product->getId();
			Mage::getModel('catalog/product_status')->updateProductStatus($productId, $storeId, Mage_Catalog_Model_Product_Status::STATUS_DISABLED);
		}
	}

}