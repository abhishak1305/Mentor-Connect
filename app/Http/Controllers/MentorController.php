<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\Category;
use App\Models\MentorshipRequest;

/**
 * MentorController
 *
 * Demonstrates:
 * - Controllers handling resources (Unit III)
 * - Eloquent ORM: Eager Loading relationships to prevent N+1 queries (Unit VI)
 * - Passing data to views (Unit II)
 */
class MentorController extends Controller
{
    /**
     * Display a listing of approved mentors.
     */
    public function index(Request $request)
    {
        // Fetch mentors who are 'approved'
        // Uses eager loading `with('category')` to optimize database queries (Unit VI)
        $query = Mentor::with('category')->where('status', 'approved');

        // Apply category filter if requested (Unit IV - reading request data)
        if ($request->has('category') && !empty($request->input('category'))) {
            $query->where('category_id', $request->input('category'));
        }

        $mentors = $query->get();

        // Fetch all categories for the filter sidebar
        $categories = Category::all();

        // Get the current selected category ID to highlight in the view
        $selectedCategory = $request->input('category');

        // Return view and pass data (Unit II)
        return view('mentors.index', compact('mentors', 'categories', 'selectedCategory'));
    }

    /**
     * Display the specified mentor's full profile.
     * Demonstrates: Route parameters (Unit II), Eloquent findOrFail (Unit VI)
     */
    public function show(Request $request, $id)
    {
        // Fetch mentor by ID with category and reviews, automatically aborts 404 if not found (Unit VI)
        $mentor = Mentor::with(['category', 'reviews.startup'])->findOrFail($id);

        // Check if the current user is a startup and has an approved request (Unit VI - Eloquent Where)
        $canReview = false;
        if ($request->session()->get('user_role') === 'startup') {
            $canReview = MentorshipRequest::where('startup_id', $request->session()->get('user_id'))
                ->where('mentor_id', $id)
                ->where('status', 'approved')
                ->exists();
                
            // Check if they already reviewed
            if ($canReview) {
                $alreadyReviewed = $mentor->reviews()->where('startup_id', $request->session()->get('user_id'))->exists();
                if ($alreadyReviewed) {
                    $canReview = false; // Disable if already reviewed
                }
            }
        }

        return view('mentors.show', compact('mentor', 'canReview'));
    }
}
