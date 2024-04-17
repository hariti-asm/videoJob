<?php

namespace App\Services;

use App\Repositories\CategoryInterface;

class CategoryService
{
    public function __construct(
        protected CategoryInterface $CategoryRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->CategoryRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->CategoryRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->CategoryRepository->delete($id);
    }

    public function all()
    {
        return $this->CategoryRepository->all();
    }
    
    public function find($id)
    {
        return $this->CategoryRepository->find($id);
    }
    public function categoryToggle($id){
        return $this->CategoryRepository->categoryToggle($id);
    }

}