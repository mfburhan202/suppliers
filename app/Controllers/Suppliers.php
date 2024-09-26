<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SupplierModel;

class SuppliersController extends ResourceController
{
    protected $modelName = 'App\Models\SupplierModel';
    protected $format    = 'json';

    // Mendapatkan semua data supplier
    public function index()
    {
        log_message('info', 'Method index() di SuppliersController dipanggil');

        $suppliers = $this->model->findAll();
        return $this->respond($suppliers);
    }

    // Mendapatkan satu supplier berdasarkan id
    public function show($id = null)
    {
        $supplier = $this->model->find($id);
        if ($supplier) {
            return $this->respond($supplier);
        } else {
            return $this->failNotFound('Supplier not found');
        }
    }

    // Menambahkan data supplier baru
    public function create()
    {
        $data = $this->request->getJSON();

        if ($this->model->insert($data)) {
            $response = [
                'status'   => 201,
                'messages' => 'Supplier created successfully',
                'data'     => $data
            ];
            return $this->respondCreated($response);
        }

        return $this->failValidationErrors($this->model->errors());
    }

    // Mengupdate data supplier berdasarkan id
    public function update($id = null)
    {
        $data = $this->request->getJSON();

        if (!$this->model->find($id)) {
            return $this->failNotFound('Supplier not found');
        }

        if ($this->model->update($id, $data)) {
            return $this->respond(['message' => 'Supplier updated successfully']);
        }

        return $this->failValidationErrors($this->model->errors());
    }

    // Menghapus supplier berdasarkan id
    public function delete($id = null)
    {
        if ($this->model->find($id)) {
            $this->model->delete($id);
            return $this->respondDeleted(['message' => 'Supplier deleted successfully']);
        }

        return $this->failNotFound('Supplier not found');
    }
}
