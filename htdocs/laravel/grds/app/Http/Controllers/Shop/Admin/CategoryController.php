<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Models\ShopCategories;
//use App\Models\ShopCategory;
//use App\Models\ShopProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;
use App\Http\Requests\ShopCategoryUpdateRequest;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = ShopCategories::paginate(5);
        return view('shop.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ShopCategories();
        $categoryList = ShopCategories::all();

        return view('shop.admin.categories.edit',compact('item','categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }

        // Создаст объект но не добавит в БД
        $item = new ShopCategories($data);
        $item->save();

        if ($item) {
            return redirect()->route('shop.admin.categories.edit', [$item->id])->with(['success' => 'Успешно сохранено']);
        }else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ShopCategories::findOrFail($id);
        $categoryList = ShopCategories::all();

        return view('shop.admin.categories.edit',
            compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'description' => 'string|max:500|min:3',
            'parent_id' => 'required|integer|exists:shop_categories,id',
        ];


        $validateData = $this->validate($request,$rules);

        $item = ShopCategories::find($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id =[{$id}] не найдена "])
                ->withInput();
        }
        $data = $request->all();
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }
        $result = $item->fill($data)->save();

        if($result) {
            return redirect()
                ->route('shop.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
