<?php
use App\Models\Repositories\CategoryRepository;
class CategoryController {

    public function createCategory($title){
        $category = new CategoryRepository();
        $category->addCategory($title);
        
    }
    
}