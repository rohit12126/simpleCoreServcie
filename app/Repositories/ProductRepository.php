<?php 

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    /**
     *  
     * @var Product  
     */  
    protected $product;

    /**  
     * ProductRepository  constructor
     *  
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Create a product
     *
     * @author chapter247
     * 
     * @return array
     */
    public function create($data)
    {
        return $this->product->create($data);
    }

    /**
     * Get orderable products
     *
     * @author chapter247 
     * 
     * @return array
     */
    public function all() 
    {
        return $this->product->all();
    }
  
    /**
     * Fetch the data form product table
     *
     * @param int $id product id
     * 
     * @author chapter247
     * 
     * @return array
     */
    public function find($id)
    {
        return $this->product->find($id);
    }
    
    /**
     * Updates product data.
     *
     * @param Product $id , $data  
     *
     * @author chapter247
     * 
     * @return array
     */
    public function update($id, array $data)
    {
        return $this->product->find($id)->update($data);
    }
   
    /**
     * Uploads a design file.
     *
     * @param Product $id 
     * 
     * @author chapter247
     *
     * @return array
     */
    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}