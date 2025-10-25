<?php

namespace App\Http\Controllers;

use App\Enum\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;

class DraftController extends Controller
{
    public function show() {
        return view('drafts.drafts');
    }

    public function create($mode) {
        $categories = Categories::select('category_id', 'name')->get();
        return view('drafts.drafts-form', ['mode' => $mode, 'categories' => $categories]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required|string|exists:categories,category_id',
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'status' => 'required|string|in:draft,published',
        ]);

        $slug = Str::slug($validated['title'], '-');
        $userAccount = Auth::user();
        $userId = $userAccount->user->user_id;
        $statusEnum = $validated['status'] === 'draft' ? StatusEnum::DRAFT : StatusEnum::PUBLISHED;

        Post::create([
            'category_id' => $validated['category_id'],
            'user_id' => $userId,
            'title' => $validated['title'],
            'slug' => $slug,
            'summary' => $validated['summary'],
            'content' => $validated['content'],
            'status' => $statusEnum->value,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Draft created successfully.'
        ]);
    }

    public function update() {}

    public function destroy() {}
}
