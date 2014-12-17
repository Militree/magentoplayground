<?php

class Brandyn_EntityCreation_ProductsController extends Mage_Core_Controller_Front_Action {

	public function indexAction() 
	{
	    $this->loadLayout();
	    $this->renderLayout();
        if ($this->getRequest()->isPost()){
        	$args = [];
        	$args = $_POST['product_args'];
        	$this->newProduct($args);

        }

	}

	public function newProduct($args) 
	{
		Mage::app()->setCurrentStore(Mage_Core_Model_App::ADMIN_STORE_ID);

		$product = new Mage_Catalog_Model_Product();
		if(!$product->getIdBySku($args['sku'])) {

				$product
					->setTypeId('simple')
					->setAttributeSetId('')

					->setCreatedAt(strtotime('now'))

					->setSku($args['sku'])
					->setName($args['name'])
					->setShortDescription($args['shortdesc'])
					->setDescription($args['desc'])
					->setTaxClassId($args['taxclass'])
					->setStatus($args['status'])
					->setPrice($args['price'])
					->setCost($args['cost'])
					->setMSRP($args['msrp'])
					->setSku($args['sku'])
					->setSku($args['sku'])
					->setStockData(array( 
					   'is_in_stock' => $args['stock'], 
					   'qty' => $args['qty'],
					   'manage_stock' => 1,
					   'use_config_notify_stock_qty' => 1
					))
				    ->setCategoryIds(array(3, 10)); //assign product to categories; 

				$product->save();

		}


	}

}