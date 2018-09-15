<?php
namespace Tbb\Crud\Hmu;


use Magento\Framework\App\Bootstrap;

class InsertProduct
{
    public function __construct()
    {

        include('app/bootstrap.php');
        $bootstraps = Bootstrap::create(BP, $_SERVER);

        // add bootstrap
        $object_Manager = $bootstraps->getObjectManager();

        $app_state = $object_Manager->get('\Magento\Framework\App\State');
        $app_state->setAreaCode('frontend');

// get date
        $today_date = date("m/d/Y");
        $added_date = date('m/d/Y',strtotime("+17 day"));

        $set_product = $object_Manager->create('\Magento\Catalog\Model\Product');

        try{
            $set_product->setWebsiteIds(array(1));
            $set_product->setAttributeSetId(4);
            $set_product->setTypeId('simple');
            $set_product->setCreatedAt(strtotime('now'));
            // time of product creation
            $set_product->setName('Test nour 2 Sample Products');
            // add Name of Product
            $set_product->setSku('add-sku-4');
            // add sku hear
            $set_product->setWeight(1.0000);
            // add weight of product
            $set_product->setStatus(1);
            $category_id= array(4,5);
            // add your catagory id
            $set_product->setCategoryIds($category_id);
            // Product Category
            $set_product->setTaxClassId(0);
            // type of tax class
            // (0 - none, 1 - default, 2 - taxable, 4 - shipping)
            $set_product->setVisibility(4);
            // catalog and search visibility
            $set_product->setManufacturer(28);
            // manufacturer id
            $set_product->setColor(24);
            //print_r($_product);die;
            $set_product->setNewsFromDate($today_date);
            // product set as new from
            $set_product->setNewsToDate($added_date);
            // add image path hear
            $set_product->setImage('/testimg/test.jpg');
            // add small image path hear
            $set_product->setSmallImage('/testimg/test.jpg');
            // add Thumbnail image path hear
            $set_product->setThumbnail('/testimg/test.jpg');
            // product set as new to
            $set_product->setCountryOfManufacture('AF');
            // country of manufacture (2-letter country code)
            $set_product->setPrice(100.99) ;
            // price in form 100.99
            $set_product->setCost(88.33);
            // price in form 88.33
            $set_product->setSpecialPrice(99.85);
            // special price in form 99.85
            $set_product->setSpecialFromDate('06/1/2016');
            // special price from (MM-DD-YYYY)
            $set_product->setSpecialToDate('06/30/2018');
            // special price to (MM-DD-YYYY)
            $set_product->setMsrpEnabled(1);
            // enable MAP
            $set_product->setMsrpDisplayActualPriceType(1);
            // display actual price
            // (1 - on gesture, 2 - in cart, 3 - before order confirmation, 4 - use config)
            $set_product->setMsrp(99.99);
            // Manufacturer's Suggested Retail Price
            $set_product->setMetaTitle('test meta title 2');
            $set_product->setMetaKeyword('test meta keyword 2');
            $set_product->setMetaDescription('test meta description 2');
            $set_product->setDescription('This is a long description');
            $set_product->setShortDescription('This is a short description');
            $set_product->setStockData(
                array(
                    'use_config_manage_stock' => 0,
                    // checkbox for 'Use config settings'
                    'manage_stock' => 1, // manage stock
                    'min_sale_qty' => 1, // Shopping Cart Minimum Qty Allowed
                    'max_sale_qty' => 2, // Shopping Cart Maximum Qty Allowed
                    'is_in_stock' => 1, // Stock Availability of product
                    'qty' => 100 // qty of product
                )
            );

            $set_product->save();
            // get id of product
            $get_product_id = $set_product->getId();
            echo "Upload simple product id :: ".$get_product_id."\n";
        }
        catch(Exception $exception)
        {
            // errro in exception/code
            Mage::log($exception->getMessage());
            echo 'exception';
        }
    }
}