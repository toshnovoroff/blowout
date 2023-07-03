<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use ReCaptcha\ReCaptcha;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all(); // Fetch all reviews from the database

        return view('reviews', compact('reviews'));
    }

    protected $casts = [
        'reviewDate' => 'datetime',
    ];

    public function store(Request $request)
    {
        $request->validate([
            'reviewText' => 'required',
            'rating' => 'required|integer|min:0|max:5',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the maximum file size and allowed file types as needed
            // 'g-recaptcha-response' => 'required|recaptcha'
        ]);

        // $recaptcha = new ReCaptcha(env('GOOGLE_RECAPTCHA_SECRET'));
        // $response = $recaptcha->verify($request->input('g-recaptcha-response'));

        // if (!$response->isSuccess()) {
        //     return back()->withErrors(['captcha' => 'Invalid reCAPTCHA response. Please try again.']);
        // }

        // Create a new review instance
        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->reviewText = $request->input('reviewText');
        $review->rating = $request->input('rating');
        $review->reviewDate = now();

        // Check if a file is uploaded
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $review->reviewPhoto = 'images/' . $fileName;
        }

        $review->save();

        return redirect()->route('reviews')->with('success', 'Review added successfully.');
    }

    // public function addReply(Request $request, $id)
    // {
    //     $request->validate([
    //         'replyText' => 'required',
    //     ]);

    //     // Find the review by its ID
    //     $review = Review::findOrFail($id);

    //     // Only allow admins to add replies
    //     if (!auth()->user()->isAdmin) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     // Update the reply fields
    //     $review->replyText = $request->input('replyText');
    //     $review->replyDate = now();
    //     $review->save();

    //     return redirect()->route('reviews')->with('success', 'Reply added successfully.');
    // }
}
