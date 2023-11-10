<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;    
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    // Shows all records
    public function show()
    {
        $categories = Category::latest()->paginate('5');;
        return view('category.index', ['categories' => $categories]); 
    }

    // Create form for category
    public function create()
    {
        return view('category.create');
    }

    // Saves the record
    public function save(Request $request)
    {
        $this->validate(request(), [
            'name'=> 'required|min:1|max:255',
            'description'=> 'required|min:1|max:255',
        ]);  

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        
        $category->save();

        return redirect('/category')->with('status', 'New Catagory Saved.');
    }

    // Edits the record
    public function update(Request $request, $id)
    {   
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->update();
        
        return redirect('/category')->with('status', 'Category updated.');
    }

    // Delete the record
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('status','Category deleted successfully.');
    }
    
}
