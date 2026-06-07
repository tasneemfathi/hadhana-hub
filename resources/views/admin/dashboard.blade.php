@extends('layouts.app')
@section('title', __('Admin workspace'))

@section('content')
@php
    $badge = [
        'pending'  => 'bg-amber-100 text-amber-700',
        'approved' => 'bg-emerald-100 text-emerald-700',
        'rejected' => 'bg-red-100 text-red-700',
    ];
@endphp
<div class="max-w-6xl mx-auto px-4 py-10">
    <h1 class="text-2xl font-extrabold mb-1">{{ __('Admin workspace') }}</h1>
    <p class="text-slate-500 mb-6">{{ __('Submission requests') }}</p>

    <div class="grid grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-amber-100 p-5 text-center">
            <p class="text-3xl font-extrabold text-amber-600">{{ $stats['pending'] }}</p>
            <p class="text-sm text-slate-500 font-semibold mt-1">{{ __('Pending') }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-amber-100 p-5 text-center">
            <p class="text-3xl font-extrabold text-emerald-600">{{ $stats['approved'] }}</p>
            <p class="text-sm text-slate-500 font-semibold mt-1">{{ __('Approved') }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-amber-100 p-5 text-center">
            <p class="text-3xl font-extrabold text-red-500">{{ $stats['rejected'] }}</p>
            <p class="text-sm text-slate-500 font-semibold mt-1">{{ __('Rejected') }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-amber-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-amber-50/70 text-slate-500 text-start">
                <tr>
                    <th class="text-start font-semibold px-4 py-3">{{ __('Nursery name') }}</th>
                    <th class="text-start font-semibold px-4 py-3">{{ __('City') }}</th>
                    <th class="text-start font-semibold px-4 py-3">{{ __('Contact') }}</th>
                    <th class="text-start font-semibold px-4 py-3">{{ __('Status') }}</th>
                    <th class="text-start font-semibold px-4 py-3">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-amber-50">
                @forelse ($submissions as $s)
                    <tr class="hover:bg-amber-50/40">
                        <td class="px-4 py-3 font-semibold">{{ $s->nursery_name }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $s->city }}</td>
                        <td class="px-4 py-3 text-slate-600">{{ $s->contact_name }}<br><span class="text-xs text-slate-400">{{ $s->email }}</span></td>
                        <td class="px-4 py-3">
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $badge[$s->status] ?? '' }}">{{ __(ucfirst($s->status)) }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('admin.submissions.approve', $s) }}">
                                    @csrf @method('PATCH')
                                    <button class="px-3 py-1.5 rounded-lg bg-emerald-600 text-white text-xs font-bold hover:bg-emerald-700">{{ __('Approve') }}</button>
                                </form>
                                <form method="POST" action="{{ route('admin.submissions.reject', $s) }}">
                                    @csrf @method('PATCH')
                                    <button class="px-3 py-1.5 rounded-lg bg-red-100 text-red-700 text-xs font-bold hover:bg-red-200">{{ __('Reject') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-10 text-center text-slate-400 font-semibold">{{ __('No submissions yet.') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $submissions->links() }}</div>
</div>
@endsection
