@extends('layouts.app')
@section('title', $nursery->name)

@section('content')
@php $fallback = 'https://picsum.photos/seed/hadhana'.$nursery->id.'/1200/700'; @endphp
<div class="max-w-5xl mx-auto px-4 py-8">
    <a href="{{ route('home') }}" class="text-sm font-semibold text-brand-700 hover:underline">← {{ __('Back to directory') }}</a>

    <div class="mt-4 bg-white rounded-3xl overflow-hidden border border-amber-100 shadow-sm">
        <div class="relative h-64 sm:h-80">
            <img src="{{ $nursery->image_url ?: $fallback }}"
                 onerror="this.onerror=null;this.src='{{ $fallback }}';"
                 alt="{{ $nursery->name }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/55 to-transparent"></div>
            <div class="absolute bottom-4 start-5 text-white">
                <div class="flex items-center gap-2">
                    <h1 class="text-2xl sm:text-3xl font-extrabold">{{ $nursery->name }}</h1>
                    @if ($nursery->is_verified)
                        <span class="bg-emerald-500 text-white text-xs font-bold px-2.5 py-1 rounded-full">✓ {{ __('Verified') }}</span>
                    @endif
                </div>
                <p class="text-white/90 mt-1">📍 {{ $nursery->district }}, {{ $nursery->city }}</p>
            </div>
        </div>

        <div class="p-6 grid md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <h2 class="font-bold text-lg mb-2">{{ __('About this nursery') }}</h2>
                <p class="text-slate-600 leading-relaxed">{{ $nursery->description }}</p>

                <div class="flex flex-wrap gap-2 mt-4 text-sm">
                    @if ($nursery->is_bilingual)<span class="px-3 py-1.5 rounded-lg bg-brand-50 text-brand-700 font-semibold">{{ __('Bilingual') }}</span>@endif
                    @if ($nursery->has_meals)<span class="px-3 py-1.5 rounded-lg bg-amber-100 text-amber-700 font-semibold">🍎 {{ __('Meals') }}</span>@endif
                    @if ($nursery->has_transport)<span class="px-3 py-1.5 rounded-lg bg-sky-100 text-sky-700 font-semibold">🚌 {{ __('Transport') }}</span>@endif
                </div>
            </div>

            <aside class="bg-amber-50/60 rounded-2xl p-5 border border-amber-100 space-y-3 text-sm">
                <div class="flex justify-between"><span class="text-slate-500">{{ __('Rating') }}</span><span class="font-bold">★ {{ number_format($nursery->rating,1) }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">{{ __('Ages (months)') }}</span><span class="font-bold">{{ $nursery->age_range }}</span></div>
                <div class="flex justify-between"><span class="text-slate-500">{{ __('Capacity') }}</span><span class="font-bold">{{ $nursery->capacity }}</span></div>
                <hr class="border-amber-100">
                <div><span class="text-slate-500 block mb-1">{{ __('Contact') }}</span>
                    <p class="font-semibold">{{ $nursery->phone }}</p>
                    <p class="font-semibold text-brand-700">{{ $nursery->email }}</p>
                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
