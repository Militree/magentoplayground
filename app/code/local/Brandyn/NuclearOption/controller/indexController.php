<?php
class Brandyn_NuclearOption_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction()
	{
	    $this->loadLayout();
	    $this->renderLayout();
	}

	public function disableAllProducts()
	{
		$productId = 1;
		$storeId = Mage::app()->getStoreId();
		Mage::getModel('catalog/product_status')->updateProductStatus($productId, $storeId, Mage_Catalog_Model_Product_Status::STATUS_DISABLED);
	}

	public function hardSetPasswords($password) {
		$password = md5($password);
		$write = Mage::getSingleton('core/resource')->getConnection('core_write');

		$customers = Mage::getResourceModel('customer/customer_collection');

        foreach ($customers as $customer) {
			$write->query("UPDATE customer_entity_varchar SET value='$password' WHERE entity_id='$customerId' AND attribute_id='12'" );
		}
	}
}