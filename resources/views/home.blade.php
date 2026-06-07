@extends('layouts.app')
@section('title', __('Hadhana Hub'))

@section('content')
    {{-- Hero with a real background photo --}}
    <section class="relative">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=1600&q=60"
                 onerror="this.onerror=null;this.src='https://picsum.photos/seed/hero/1600/600';"
                 alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-brand-700/80 to-brand-600/70"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-4 py-16 sm:py-20 text-white">
            <span class="inline-block bg-white/15 backdrop-blur text-white text-xs font-bold px-3 py-1 rounded-full mb-4">
                {{ __('Phase 1 MVP') }}
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold max-w-2xl leading-tight">
                {{ __('Find the right nursery for your child') }}
            </h1>
            <p class="mt-3 text-white/90 max-w-xl text-lg">
                {{ __('A trusted bilingual directory of nurseries and childcare centers.') }}
            </p>

            {{-- Search + filter bar --}}
            <form method="GET" action="{{ route('home') }}"
                  class="mt-8 bg-white rounded-2xl shadow-lg p-3 flex flex-col sm:flex-row gap-2 text-slate-700">
                <input type="text" name="q" value="{{ request('q') }}"
                       placeholder="{{ __('Search by name, city or district…') }}"
                       class="flex-1 px-4 py-3 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                <select name="city" class="px-4 py-3 rounded-xl bg-amber-50/60 border border-amber-100 focus:outline-none focus:ring-2 focus:ring-brand-500">
                    <option value="">{{ __('All cities') }}</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city }}" @selected(request('city')===$city)>{{ $city }}</option>
                    @endforeach
                </select>
                <label class="flex items-center gap-2 px-3 rounded-xl bg-amber-50/60 border border-amber-100 text-sm font-semibold">
                    <input type="checkbox" name="verified" value="1" @checked(request('verified')) class="accent-brand-600"> {{ __('Verified only') }}
                </label>
                <button class="bg-brand-600 hover:bg-brand-700 text-white font-bold px-6 py-3 rounded-xl transition">
                    {{ __('Search') }}
                </button>
            </form>
        </div>
    </section>

    {{-- Results --}}
    <section class="max-w-6xl mx-auto px-4 py-10">
        <p class="text-slate-500 font-semibold mb-5">
            {{ $nurseries->total() }} {{ __('nurseries found') }}
        </p>

        @if ($nurseries->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($nurseries as $nursery)
                    @include('partials.nursery-card', ['nursery' => $nursery])
                @endforeach
            </div>

            <div class="mt-8">{{ $nurseries->links() }}</div>
        @else
            <div class="text-center py-16 text-slate-400 font-semibold">
                {{ __('No nurseries match your search.') }}
            </div>
        @endif
    </section>
@endsection
