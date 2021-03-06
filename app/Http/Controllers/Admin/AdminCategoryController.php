<?php

namespace CodeCommerce\Http\Controllers\Admin;

use CodeCommerce\Category;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Http\Requests\Admin\CategoryRequest;
use CodeCommerce\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminCategoryController extends Controller
{
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->category->fill($request->all())->save();
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        try {
            $category = $this->category->findOrFail($id);
            return view('admin.category.update', compact('category'));
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro Não Localizado');
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $this->category->findOrFail($id)->fill($request->all())->save();
            return redirect()->route('admin.category.index');
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro não localizado para ser editado');
        }
    }

    public function destroy($id)
    {
        try {
            $category = $this->category->findOrFail($id);
            if (count($category->products) > 0)
                die('Produtos relacionados... Não é possivel excluir esta categoria!');
            else
                $category->delete();
            return redirect()->route('admin.category.index');
        } catch (ModelNotFoundException $e) {
            abort(404, 'Registro não localizado para ser deletado');
        }

    }
}
