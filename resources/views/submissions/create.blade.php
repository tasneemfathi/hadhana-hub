@extends('layouts.app')
@section('title', __('List your nursery'))

@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    <div class="bg-white rounded-3xl border border-amber-100 shadow-sm overflow-hidden">
        <div class="bg-brand-600 text-white p-6">
            <h1 class="text-2xl font-extrabold">{{ __('List your nursery') }}</h1>
            <p class="text-white/90 mt-1">{{ __('Add your nursery to the directory and reach more families.') }}</p>
        </div>

        <form method="POST" action="{{ route('submissions.store') }}" class="p-6 space-y-4">
            @csrf

            @php
                $field = function ($name, $label, $type = 'text', $required = true) {
                    return compact('name', 'label', 'type', 'required');
                };
            @endphp

            <div class="grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">{{ __('Nursery name') }}</label>
                    <input name="nursery_name" value="{{ old('nursery_name') }}" required
                           class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    @error('nursery_name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">{{ __('City') }}</label>
                    <input name="city" value="{{ old('city') }}" required
                           class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    @error('city')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">{{ __('Contact name') }}</label>
                    <input name="contact_name" value="{{ old('contact_name') }}" required
                           class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    @error('contact_name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">{{ __('Phone') }}</label>
                    <input name="phone" value="{{ old('phone') }}" required
                           class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    @error('phone')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">{{ __('Email') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                @error('email')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">{{ __('Message') }}</label>
                <textarea name="message" rows="4"
                          class="w-full px-4 py-2.5 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">{{ old('message') }}</textarea>
                @error('message')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <button class="w-full bg-brand-600 hover:bg-brand-700 text-white font-bold py-3 rounded-xl transition">
                {{ __('Submit request') }}
            </button>
        </form>
    </div>
</div>
@endsection
