<?php 

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Exception;

class ProductService
{

    /**
     *  
     * @var productRepository
     */  
    protected $productRepository;

    /**  
     * ProductService constructor.
     *  
     * @param ProductRepository $productRepository 
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Get orderable products
     *
     * @author chapter247
     * 
     * @return array
     */
    public function index()
    {
        return $this->productRepository->all();
    }

    /**
     * Create a product
     *
     * @param int $request Reuqest
     * 
     * @author chapter247
     * 
     * @return array
     */    
    public function create(Request $request)
    {
        $data = $request->all();         
        return $this->productRepository->create($data);
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
    public function read($id)
    {
        return $this->productRepository->find($id);
    }

    /**
     * Updates product data.
     *
     * @param Product $request , $id
     *
     * @author chapter247
     * 
     * @return array
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->productRepository->update($id, $data);
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
        return $this->productRepository->delete($id);
    }

}