<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Submission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $submissions = Submission::query()->latest()->paginate(15);

        $stats = [
            'pending'  => Submission::where('status', Submission::STATUS_PENDING)->count(),
            'approved' => Submission::where('status', Submission::STATUS_APPROVED)->count(),
            'rejected' => Submission::where('status', Submission::STATUS_REJECTED)->count(),
        ];

        return view('admin.dashboard', compact('submissions', 'stats'));
    }

    public function approve(Submission $submission): RedirectResponse
    {
        $submission->update(['status' => Submission::STATUS_APPROVED]);

        return back()->with('status', __('Submission approved.'));
    }

    public function reject(Submission $submission): RedirectResponse
    {
        $submission->update(['status' => Submission::STATUS_REJECTED]);

        return back()->with('status', __('Submission rejected.'));
    }
}
