@php
    $locale = app()->getLocale();
    $isRtl = in_array($locale, config('app.rtl_locales', ['ar']), true);
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('Hadhana Hub'))</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['{{ $isRtl ? "Cairo" : "Poppins" }}', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        brand: { 50:'#f0fdfa',100:'#ccfbf1',500:'#14b8a6',600:'#0d9488',700:'#0f766e' },
                    },
                },
            },
        };
    </script>
    <style>body{font-family:'{{ $isRtl ? "Cairo" : "Poppins" }}',system-ui,sans-serif}</style>
</head>
<body class="bg-amber-50/40 text-slate-800 min-h-screen flex flex-col">

    <header class="bg-white/90 backdrop-blur border-b border-amber-100 sticky top-0 z-20">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-extrabold text-lg text-brand-700">
                <span class="w-9 h-9 rounded-xl bg-brand-500 text-white grid place-items-center text-xl">🧸</span>
                {{ __('Hadhana Hub') }}
            </a>

            <nav class="flex items-center gap-1 sm:gap-3 text-sm font-semibold">
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg hover:bg-amber-100 hidden sm:block">{{ __('Home') }}</a>
                <a href="{{ route('submissions.create') }}" class="px-3 py-2 rounded-lg hover:bg-amber-100">{{ __('List your nursery') }}</a>
                <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg hover:bg-amber-100 text-slate-500">{{ __('Admin') }}</a>
                @php $other = $locale === 'ar' ? 'en' : 'ar'; @endphp
                <a href="{{ route('lang.switch', $other) }}"
                   class="ms-1 px-3 py-2 rounded-lg bg-brand-50 text-brand-700 border border-brand-100 hover:bg-brand-100">
                    {{ $other === 'ar' ? 'العربية' : 'English' }}
                </a>
            </nav>
        </div>
    </header>

    <main class="flex-1">
        @if (session('status'))
            <div class="max-w-6xl mx-auto px-4 mt-4">
                <div class="rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 text-sm font-semibold">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="border-t border-amber-100 bg-white mt-12">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-slate-500 flex flex-wrap items-center justify-between gap-2">
            <span>© {{ date('Y') }} {{ __('Hadhana Hub') }} — {{ __('Phase 1 MVP') }}</span>
            <span class="inline-flex items-center gap-2">Laravel · PostgreSQL · Tailwind</span>
        </div>
    </footer>
</body>
</html>
