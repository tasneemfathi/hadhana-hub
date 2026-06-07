@php
    $fallback = 'https://picsum.photos/seed/hadhana'.$nursery->id.'/900/600';
@endphp
<article class="group bg-white rounded-2xl overflow-hidden border border-amber-100 shadow-sm hover:shadow-md transition">
    <div class="relative h-44 overflow-hidden">
        <img src="{{ $nursery->image_url ?: $fallback }}"
             onerror="this.onerror=null;this.src='{{ $fallback }}';"
             alt="{{ $nursery->name }}"
             loading="lazy"
             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @if ($nursery->is_verified)
            <span class="absolute top-3 {{ app()->getLocale()==='ar' ? 'start-3' : 'start-3' }} inline-flex items-center gap-1 bg-white/95 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full shadow">
                ✓ {{ __('Verified') }}
            </span>
        @endif
        <span class="absolute top-3 end-3 inline-flex items-center gap-1 bg-amber-400 text-amber-900 text-xs font-bold px-2.5 py-1 rounded-full shadow">
            ★ {{ number_format($nursery->rating, 1) }}
        </span>
    </div>
    <div class="p-4">
        <h3 class="font-bold text-lg text-slate-800 leading-tight">{{ $nursery->name }}</h3>
        <p class="text-sm text-slate-500 mt-0.5">📍 {{ $nursery->district }}, {{ $nursery->city }}</p>
        <p class="text-sm text-slate-600 mt-2 line-clamp-2">{{ $nursery->description }}</p>

        <div class="flex flex-wrap gap-1.5 mt-3 text-xs">
            @if ($nursery->is_bilingual)<span class="px-2 py-1 rounded-md bg-brand-50 text-brand-700 font-semibold">{{ __('Bilingual') }}</span>@endif
            @if ($nursery->has_meals)<span class="px-2 py-1 rounded-md bg-amber-100 text-amber-700 font-semibold">🍎 {{ __('Meals') }}</span>@endif
            @if ($nursery->has_transport)<span class="px-2 py-1 rounded-md bg-sky-100 text-sky-700 font-semibold">🚌 {{ __('Transport') }}</span>@endif
        </div>

        <a href="{{ route('nurseries.show', $nursery) }}"
           class="mt-4 inline-flex w-full justify-center items-center gap-1 bg-brand-600 hover:bg-brand-700 text-white font-semibold text-sm px-4 py-2.5 rounded-xl transition">
            {{ __('View details') }}
        </a>
    </div>
</article>
