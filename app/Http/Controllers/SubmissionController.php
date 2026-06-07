<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubmissionController extends Controller
{
    public function create(): View
    {
        return view('submissions.create');
    }

    /**
     * Server-side validated registration request (anti-SQLi via Eloquent binding).
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nursery_name' => ['required', 'string', 'max:160'],
            'city'         => ['required', 'string', 'max:80'],
            'contact_name' => ['required', 'string', 'max:120'],
            'phone'        => ['required', 'string', 'max:40'],
            'email'        => ['required', 'email', 'max:160'],
            'message'      => ['nullable', 'string', 'max:1000'],
        ]);

        Submission::create($validated);

        return redirect()
            ->route('submissions.create')
            ->with('status', __('Thank you! Your request was submitted and is pending review.'));
    }
}
