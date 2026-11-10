@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.products') }}
@endsection

@section('content')
<section class="relative pt-48 pb-28 sm:pt-56 sm:pb-32 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">
    <!-- Breadcrumb Background Image - High Opacity & Brightness -->
    <div class="absolute inset-0 bg-cover bg-center opacity-90 pointer-events-none scale-105 transition-transform duration-1000" style="background-image: url('{{ asset('website/assets/images/bread.png') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-[#05070a]/10 via-[#05070a]/30 to-[#05070a]/80 pointer-events-none"></div>

    <!-- Soft Ambient Cyber Glow -->
    <div class="absolute top-1/2 left-1/3 -translate-y-1/2 w-[800px] h-[350px] bg-cyan-500/[0.20] rounded-full blur-[160px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-4">
        <!-- Breadcrumb Links -->
        <nav class="flex items-center gap-3 text-base sm:text-lg font-bold text-slate-100 uppercase tracking-widest">
            <a href="{{route('home')}}" class="hover:text-cyan-400 transition-colors flex items-center gap-2">
                <i class="fa-solid fa-house text-sm text-cyan-400"></i>
                <span>{{ __('main.home') }}</span>
            </a>
            <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>
            <span class="text-cyan-400 font-extrabold drop-shadow-[0_0_15px_rgba(0,240,255,0.6)]">{{ __('main.products') }}</span>
        </nav>

        <!-- Big Page Title inside Breadcrumb -->
        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight uppercase drop-shadow-lg pt-2">
            {{ __('main.products') }}
        </h1>
    </div>
</section>

<!-- =====================================================
     MAIN CATALOG (SIDEBAR FILTER + 3-COL PRODUCTS GRID)
===================================================== -->
<section class="py-16 bg-[#070a12] min-h-screen relative overflow-hidden">
    <!-- Soft Background Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Mobile Filter Toggle Button -->
        <div class="lg:hidden mb-6">
            <button id="mobile-filter-toggle" type="button" class="w-full py-3 px-4 rounded-xl bg-[#0b0f19] border border-white/10 text-white font-semibold text-sm flex items-center justify-between">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-sliders text-cyan-400"></i>
                    <span>{{ __('main.filter') }}</span>
                </span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform" id="mobile-filter-icon"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- =========================================
                 LEFT SIDEBAR (FILTERS & CATEGORIES)
            ========================================== -->
            <aside id="sidebar-filter-wrapper" class="hidden lg:block lg:col-span-3 space-y-6 sticky top-28">

                <!-- Search Card -->
                <div class="p-5 rounded-2xl bg-[#0b0f19] border border-white/[0.08] shadow-lg backdrop-blur-xl">
                    <h3 class="text-xs font-bold text-slate-300 uppercase tracking-wider mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-magnifying-glass text-cyan-400"></i> {{ __('main.search') }}
                    </h3>
                    <div class="relative">
                        <form action="{{ route('products') }}" method="GET" id="product-search-form">
                        <input type="text" id="product-search-input" name="search" placeholder="{{ __('main.search') }}..."
                            class="w-full bg-[#05070a] border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 transition-colors">
                        <button type="button" id="clear-search-btn" class="hidden absolute right-3 top-2.5 text-slate-500 hover:text-white text-xs">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        </form>
                    </div>
                </div>

                <!-- Categories Filter Card -->
                <div class="p-5 rounded-2xl bg-[#0b0f19] border border-white/[0.08] shadow-lg backdrop-blur-xl">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-white/[0.06]">
                        <h3 class="text-xs font-bold text-slate-300 uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-layer-group text-cyan-400"></i> {{ __('main.categories') }}
                        </h3>
                        <span id="active-category-badge" class="text-[10px] font-bold text-cyan-400 bg-cyan-500/10 px-2 py-0.5 rounded-full border border-cyan-500/20">All</span>
                    </div>

                    <ul class="space-y-1.5" id="category-list">
                        <li>
                            <button type="button" data-category="all" class="category-btn active w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-300 hover:bg-white/[0.04] transition-all">
                                <span>{{ __('main.all categories') }}</span>
                                <span class="count-badge bg-white/10 text-slate-400 px-2 py-0.5 rounded-md text-[10px]">{{ $products->count() }}</span>
                            </button>
                        </li>
                        @foreach ($categories as $category)


                        <li>
                            <a  href="{{ Helper::link('category' , $category->id , $category->title) }}" type="button" data-category="ups" class="category-btn w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-300 hover:bg-white/[0.04] transition-all">
                                <span>{{ $category->title }}</span>
                                <span class="count-badge bg-white/10 text-slate-400 px-2 py-0.5 rounded-md text-[10px]">{{ $category->products->count() }}</span>
                            </a>
                        </li>
                   @endforeach
                    </ul>
                </div>




            </aside>

            <!-- =========================================
                 RIGHT MAIN PRODUCTS GRID (3 COLS)
            ========================================== -->
            <main class="lg:col-span-9 space-y-6">

                <!-- Control Header (Result Count & Sort) -->
                <div class="p-4 rounded-2xl bg-[#0b0f19] border border-white/[0.08] flex flex-wrap items-center justify-between gap-4">
                    <div class="text-xs text-slate-400">
                        {{ __('main.show') }} <span id="products-count-text" class="font-bold text-cyan-400">{{ $products->count() }}</span> {{ __('main.products') }}
                    </div>

                    <div class="flex items-center gap-3">
                        <label for="sort-select" class="text-xs text-slate-400 flex items-center gap-1.5">
                            <i class="fa-solid fa-arrow-down-short-wide text-cyan-400"></i>
                            <span>{{ __('main.Sort by') }}:</span>
                        </label>

                        <form action="{{ url()->current() }}" method="get">
                                            <select class="form-select wide" id="sort-by-select" name="sort_by"
                                                aria-label="{{ __('main.Sort by') }}" onchange="this.form.submit()">
                                                <option value="newest"
                                                    {{ request('sort_by') == 'newest' ? 'selected' : '' }}>
                                                    {{ __('main.Newest') }}
                                                </option>
                                                <option value="oldest"
                                                    {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>
                                                    {{ __('main.Oldest') }}
                                                </option>
                                                <option value="price-asc"
                                                    {{ request('sort_by') == 'price-asc' ? 'selected' : '' }}>
                                                    {{ __('main.Price, low to high') }}
                                                </option>
                                                <option value="price-desc"
                                                    {{ request('sort_by') == 'price-desc' ? 'selected' : '' }}>
                                                    {{ __('main.Price, high to low') }}
                                                </option>
                                            </select>
                                            @if (request('page'))
                                                <input type="hidden" name="page" value="{{ request('page') }}">
                                            @endif
                                        </form>

                    </div>

                </div>

                <!-- 3-COL PRODUCTS GRID -->
                <div id="products-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                    @foreach ($products as $product)


            <a href="{{ Helper::link('product.details', $product->id, $product->name) }}" class="group relative rounded-3xl bg-[#0b0f19] border border-white/[0.08] hover:border-cyan-500/50 p-6 sm:p-[12px] transition-all duration-700 flex flex-col justify-between shadow-[0_20px_40px_rgba(0,0,0,0.6)] hover:-translate-y-2 block overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-cyan-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                <div>
                    <!-- Image with Smooth Zoom Effect -->
                    <div class="relative h-60 rounded-2xl overflow-hidden mb-6 bg-slate-950 border border-white/[0.04]">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0b0f19] via-transparent to-transparent opacity-60"></div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">
                        {{ $product->name }}
                    </h3>

                    <!-- Description -->
                    <p class="text-slate-400 text-sm leading-relaxed mb-8">
                        {!! Helper::limit($product->description, 100) !!}
                    </p>
                </div>

                <!-- Unified Full-Width Button -->
                <div class="w-full py-3.5 px-4 rounded-xl bg-cyan-500 text-slate-950 font-black text-xs tracking-wider uppercase flex items-center justify-center gap-2 group-hover:bg-cyan-400 transition-colors shadow-[0_0_20px_rgba(6,182,212,0.3)]">
                    <span>{{ __('main.View More') }}</span>
                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </div>
            </a>
            @endforeach



                </div>




            </main>

        </div>
    </div>
</section>

@endsection
@section('js')
@endsection
