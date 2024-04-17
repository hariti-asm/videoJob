<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(array $data, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->update($data);
        return $Category;
    }

    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
    }

    public function find($id)
    {
        return Category::findOrFail($id);
    }
    public function categoryToggle($id){
        $categoryToggle = Category::find($id);
        $categoryToggle->status = !$categoryToggle->status;
        $categoryToggle->save();

    }
    public function edit($id)
{
    return Category::findOrFail($id);
}

}