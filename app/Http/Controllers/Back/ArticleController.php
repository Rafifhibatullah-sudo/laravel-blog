<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $article = Article::with('Category')->latest()->get();

            return DataTables::of($article)
                ->addIndexColumn()
                ->addColumn('category_id', function($article) {
                    return $article->Category->name;
                })
                ->addColumn('status', function($article) {
                    if ($article->status == 0) {
                        return '<span class="badge bg-danger">Private</span>';
                    } else {
                        return '<span class="badge bg-success">Published</span>';
                    }
                })
                ->addColumn('button', function($article) {
                    return '<div class="text-center">
                                <a href="article/'.$article->id.'" class="btn btn-secondary">Detail</a>
                                <a href="article/'.$article->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deleteArticle(this)" data-id="'.$article->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                ->rawColumns(['category_id', 'status', 'button'])
                ->make();
        }
        return view('back.article.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.article.create', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->validated();

        $file = $request->file('img');
        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
        
        // Disimpan ke disk public
        $file->storeAs('back', $fileName, 'public');

        $data['user_id'] = auth()->user()->id;
        $data['img'] = $fileName;
        $data['slug'] = Str::slug($data['title']);

        Article::create($data);

        return redirect(url('article'))->with('success', 'Data article has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.article.show', [
            'article' => Article::with(['User', 'Category'])->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.article.update', [
            'article' => Article::find($id),
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $data = $request->validated();
        $article = Article::findOrFail($id);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            
            // Simpan foto baru ke disk public
            $file->storeAs('back', $fileName, 'public');

            // Hapus foto lama dari disk public
            if ($request->oldImg && Storage::disk('public')->exists('back/' . $request->oldImg)) {
                Storage::disk('public')->delete('back/' . $request->oldImg);
            }

            $data['img'] = $fileName;
        } else {
            $data['img'] = $request->oldImg;
        }

        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);

        $article->update($data);

        return redirect(url('article'))->with('success', 'Data article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Article::findOrFail($id);

        // Hapus file dari disk public
        if ($data->img && Storage::disk('public')->exists('back/' . $data->img)) {
            Storage::disk('public')->delete('back/' . $data->img);
        }

        $data->delete();

        return response()->json([
            'message' => 'Data article has been deleted'
        ]);
    }
}