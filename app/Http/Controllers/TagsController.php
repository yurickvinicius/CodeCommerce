<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Tag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class TagsController extends Controller
{

    private $tagModel;

    public function __construct(Tag $tag){
        $this->tagModel = $tag;
    }

    public function index()
    {
        $tags = $this->tagModel->paginate(10);
        return view('tags.index', compact('tags'));
    }


    public function create()
    {
        return view('tags.create');
    }

    public function store(Requests\TagRequest $request)
    {

        $input = $request->all();
        $this->tagModel->fill($input)->save();

        return redirect()->route('tags');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = $this->tagModel->find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {

        //dd($request->all());

        $this->tagModel->find($id)->update($request->all());

        return redirect()->route('tags');
    }

    public function destroy($id)
    {
        $this->tagModel->find($id)->delete($id);
        return redirect()->route('tags');
    }
}
