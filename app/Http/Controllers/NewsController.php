<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view('index', compact('news'));
    }

    public function create()
    {
        return view('create-news');
    }

    public function store(Request $request)
    {
        // Handle the form submission and store the news in the database

        $request->validate([
            'newsHeading' => 'required|max:50',
            'newsText' => 'required',
            'file' => 'required|mimes:jpeg,png',
        ]);

        // Save the news and file in the database

        $news = new News;
        $news->user_id = auth()->user()->id;
        $news->newsHeading = $request->newsHeading;
        $news->newsText = $request->newsText;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $news->newsPhoto = 'images/' . $fileName;
        }

        $news->save();

        return redirect()->route('index')->with('success', 'News added successfully');
    }

    public function update(Request $request)
    {
        $action = $request->input('action');
        $newsId = $request->input('newsId');

        // Handle the update action based on the values

        if ($action === 'edit') {
            // Retrieve the news item and pass its data to the edit modal form
            $news = News::find($newsId);
            return view('edit-news', compact('news'));
        } else if ($action === 'delete') {
            // Retrieve the news item and delete it
            $news = News::find($newsId);
            $news->delete();

            return redirect()->route('index')->with('success', 'News deleted successfully');
        }
    }
}
