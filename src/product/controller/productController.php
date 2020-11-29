<?php

namespace Product;

use Engine\Controller;

/**
 * Default's controller, this shows the demo pages when you run for first time
 * this project
 */
class productController extends Controller
{

    /**
     * Product sample page
     *
     * @return void
     */
    public function samplePage()
    {
        // $product_model = new productModel();
        // $product_data = $product_model->getAllProducts();
        $product_data = ["product_name" => "test product", "product_price" => "9000€", "product_description" => "this is a test product"];

        $this->output->load("product/productDescription", $product_data);
    }
}
