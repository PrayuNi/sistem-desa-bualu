<?php

namespace App\Http\Controllers;

use App\Models\News;
Use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at', 'desc')->get(); //1.1 untuk mensortir dan memilih data baru
        return view('news.index', compact('news')); // 1.2 untuk menampilkan halaman dari data
    }
    
    public function create(){
        return view('news.create-news');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:600',
            'date' => 'required|max:100',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $originalName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('news_images', $originalName, 'public');
            $validated['image'] = $path;
        }else {
            $validated['image'] = 'news_images/default.png';
        }

        News::create($validated);

        return redirect()->route('news.index')->with('success', 'Berhasil ditambah');
        }

        public function edit($id){
            $news = News::findOrFail($id);
            return view('news.edit-news', compact('news'));
        }

        public function update(Request $request, $id){
            $news = News::findOrFail($id);
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:600',
                'date' => 'required|max:100',
                'image' => 'required',
            ]);
            if ($request->hasFile('image')){
            if($news->image && $news->image !== 'news_images/default.png'){
                Storage::disk('public')->delete($news->image);
            }

            $originalName = time(). '_' .$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('news_images', $originalName, 'public');
            $validated['image']=$path;
        } else {
            $validated['image'] = $news->image;
        }

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Data Berhasil Disimpan!');
        }

        public function delete ($id) {
        $news = News::findOrFail ($id);

        $news->delete();
        return redirect()->route('news.index')->with('success', 'Data Berhasil Dihapus!');
    }
    }