<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;

class Product extends ResourceController
{
    use ResponseTrait;

    protected $product;

    public function __construct()
    {
        $this->product = new ProductModel();
    }

    public function index()
    {
        $data = $this->product->findAll();
        return $this->respond($data);
    }

    public function show($id = null)
    {
        $data = $this->product->getWhere(['product_id' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data found with id' . $id);
        }
    }

    public function create()
    {
        $data = [
            'product_name' => $this->request->getVar('product_name'),
            'product_price' => $this->request->getVar('product_price')
        ];
        die();
        $this->product->insert($data);
        $response = [
            'status' => 201,
            'error' => false,
            'message' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        $input = $this->request->getRawInput();
        $data = [
            'product_name' => $input['product_name'],
            'proudct_price' => $input['product_price']
        ];
        $this->product->update($id, $data);
        $response = [
            'status' => 200,
            'error' => false,
            'message' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id = null)
    {
        $data = $this->product->find($id);
        if ($data) {
            $this->product->delete($id);
            $response = [
                'status' => 200,
                'error' => false,
                'message' => [
                    'success' => 'Data Deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id' . $id);
        }
    }
}
