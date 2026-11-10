
@extends('website.layouts.master')

@section('title')
    {{ __('main.site') }} | {{ $product->name }}
@endsection

@section('css')
<style>
    .product-thumbs-swiper .swiper-slide {
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .product-thumbs-swiper .swiper-slide-thumb-active {
        border-color: #00f0ff !important;
        box-shadow: 0 0 15px rgba(0, 240, 255, 0.25);
    }

    .product-main-swiper .swiper-slide img {
        cursor: zoom-in;
        transition: transform 0.5s ease;
    }

    .product-main-swiper .swiper-slide img:hover {
        transform: scale(1.03);
    }

    .product-main-swiper .swiper-button-next,
    .product-main-swiper .swiper-button-prev {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: rgba(2, 6, 23, 0.85);
        border: 1px solid rgba(255, 255, 255, 0.12);
        transition: all 0.3s ease;
    }

    .product-main-swiper .swiper-button-next::after,
    .product-main-swiper .swiper-button-prev::after {
        font-size: 14px;
        font-weight: 900;
        color: #00f0ff;
    }

    .product-main-swiper .swiper-button-next:hover,
    .product-main-swiper .swiper-button-prev:hover {
        background: #00f0ff;
    }

    .product-main-swiper .swiper-button-next:hover::after,
    .product-main-swiper .swiper-button-prev:hover::after {
        color: #05070a;
    }

    .pd-lightbox {
        position: fixed;
        inset: 0;
        z-index: 99999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background: rgba(0, 0, 0, 0.95);
        cursor: zoom-out;
    }

    .pd-lightbox.is-open {
        display: flex;
    }

    .pd-lightbox img {
        max-width: 95%;
        max-height: 90vh;
        object-fit: contain;
        border-radius: 12px;
    }

    .pd-lightbox-close {
        position: absolute;
        top: 20px;
        right: 25px;
        width: 45px;
        height: 45px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        color: white;
        background: #0b0f19;
        font-size: 26px;
        cursor: pointer;
    }

    .pd-product-description {
        overflow-wrap: anywhere;
    }

    .pd-product-description img {
        max-width: 100%;
        height: auto;
    }

    @media (max-width: 640px) {
        .product-main-swiper {
            height: 320px !important;
        }

        .pd-lightbox img {
            max-width: 100%;
        }
    }
</style>
@endsection

@section('content')

@php
    $productImages = collect([$product->image])
        ->merge($product->images->pluck('image'))
        ->filter()
        ->unique()
        ->values();
@endphp

<main class="bg-[#070a12]">

    {{-- Breadcrumb Banner --}}
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-24 bg-[#05070a] overflow-hidden border-b border-white/[0.1]">

        <div
            class="absolute inset-0 bg-cover bg-center opacity-70 pointer-events-none"
            style="background-image: url('{{ asset('website/assets/images/bread.png') }}');">
        </div>

        <div class="absolute inset-0 bg-gradient-to-b from-[#05070a]/20 via-[#05070a]/50 to-[#05070a]/90 pointer-events-none"></div>

        <div class="absolute top-1/2 left-1/3 -translate-y-1/2 w-[500px] h-[250px] bg-cyan-500/[0.15] rounded-full blur-[140px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <nav class="flex flex-wrap items-center gap-3 text-sm sm:text-base font-bold text-slate-100 uppercase tracking-widest">

                <a href="{{ url('/') }}"
                   class="hover:text-cyan-400 transition-colors flex items-center gap-2">

                    <i class="fa-solid fa-house text-sm text-cyan-400"></i>

                    <span>{{ __('main.site') }}</span>
                </a>

                <i class="fa-solid fa-chevron-right text-xs text-cyan-400"></i>

                <span class="text-cyan-400 font-extrabold break-words">
                    {{ $product->name }}
                </span>

            </nav>

        </div>
    </section>


    {{-- Main Product Details --}}
    <section class="py-12 sm:py-16 bg-[#070a12] relative overflow-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start mb-16">

                {{-- Product Gallery --}}
                <div class="lg:col-span-6 space-y-4">

                    <div class="swiper product-main-swiper relative h-[380px] sm:h-[460px] rounded-3xl bg-[#0b0f19] border border-white/[0.08] overflow-hidden">

                        <div class="swiper-wrapper">

                            @forelse ($productImages as $image)

                                <div class="swiper-slide flex items-center justify-center p-5 sm:p-7">

                                    <img
                                        src="{{ asset($image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-contain rounded-2xl"
                                        loading="{{ $loop->first ? 'eager' : 'lazy' }}">

                                </div>

                            @empty

                                <div class="swiper-slide flex items-center justify-center p-6">

                                    <div class="text-center text-slate-500">
                                        <i class="fa-regular fa-image text-5xl mb-4"></i>
                                        <p>{{ __('main.no image available') }}</p>
                                    </div>

                                </div>

                            @endforelse

                        </div>

                        @if ($productImages->count() > 1)

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>

                        @endif

                    </div>


                    {{-- Product Thumbnails --}}
                    @if ($productImages->count() > 1)

                        <div class="swiper product-thumbs-swiper">

                            <div class="swiper-wrapper">

                                @foreach ($productImages as $image)

                                    <div class="swiper-slide cursor-pointer rounded-2xl bg-[#0b0f19] p-2 h-20 sm:h-24 flex items-center justify-center overflow-hidden hover:border-cyan-400/50 transition-colors">

                                        <img
                                            src="{{ asset($image) }}"
                                            alt="{{ $product->name }}"
                                            class="w-full h-full object-contain rounded-xl"
                                            loading="lazy">

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif

                </div>


                {{-- Product Information --}}
                <div class="lg:col-span-6 space-y-6">

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 text-xs font-extrabold uppercase tracking-widest">

                        <i class="fa-solid fa-cube"></i>

                        <span>{{ __('main.details') }}</span>

                    </div>


                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight break-words">

                        {{ $product->name }}

                    </h1>


                    {{-- Description --}}
                    <div class="space-y-4 pt-2">

                        <h2 class="text-lg font-bold text-white uppercase tracking-wider flex items-center gap-3">

                            <i class="fa-solid fa-align-left text-cyan-400"></i>

                            {{ __('main.description') }}

                        </h2>

                        <div class="pd-product-description text-slate-300 text-sm sm:text-base leading-relaxed p-5 sm:p-6 rounded-2xl bg-[#0b0f19] border border-white/[0.08]">

                            {!! $product->description !!}

                        </div>

                    </div>


                    {{-- Contact / Quote Button --}}
                    <div class="pt-3">

                        <a
                            href="{{ url('/') }}#contact"
                            class="inline-flex items-center gap-3 py-4 px-7 rounded-2xl bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-extrabold text-xs uppercase tracking-wider transition-all hover:scale-[1.02]">

                            <span>{{ __('main.contact us') }}</span>

                            <i class="fa-solid fa-arrow-right text-xs"></i>

                        </a>

                    </div>

                </div>

            </div>


            {{-- Detailed Product Description --}}
            <div class="my-12 sm:my-16 pt-10 sm:pt-12 border-t border-white/[0.08] space-y-8">

                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">

                    <div>

                        <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest flex items-center gap-2">

                            <i class="fa-solid fa-microchip"></i>

                            {{ __('main.details') }}

                        </span>

                        <h2 class="text-2xl sm:text-4xl font-black text-white mt-2">

                            {{ __('main.description') }}

                        </h2>

                    </div>

                    <div class="h-1 w-24 bg-gradient-to-r from-cyan-500 to-transparent rounded-full hidden sm:block"></div>

                </div>


                <div class="rounded-3xl bg-[#0b0f19] border border-white/[0.08] p-5 sm:p-8 relative overflow-hidden">

                    <div class="absolute -top-12 -right-12 w-40 h-40 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none"></div>

                    <div class="relative z-10 pd-product-description text-slate-300 text-sm sm:text-base leading-relaxed">

                        {!! $product->description !!}

                    </div>

                </div>

            </div>


            {{-- Related Products --}}
            @if (isset($relatedProducts) && $relatedProducts->isNotEmpty())

                <div class="mt-16 space-y-8 border-t border-white/[0.08] pt-12 sm:pt-16">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <span class="text-xs font-bold text-cyan-400 uppercase tracking-widest">

                                {{ __('main.related products') }}

                            </span>

                            <h2 class="text-2xl sm:text-3xl font-black text-white mt-2">

                                {{ __('main.products') }}

                            </h2>

                        </div>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

                        @foreach ($relatedProducts as $relatedProduct)

                            <a
                                href="{{ Helper::link('product.details', $relatedProduct->id, $relatedProduct->name) }}"
                                class="group relative rounded-3xl bg-[#0b0f19] border border-white/[0.08] hover:border-cyan-500/50 p-4 sm:p-5 transition-all duration-500 flex flex-col justify-between hover:-translate-y-1 overflow-hidden">

                                <div class="absolute inset-0 bg-gradient-to-b from-cyan-500/5 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                                <div class="relative z-10">

                                    <div class="relative h-56 sm:h-60 rounded-2xl overflow-hidden mb-5 bg-slate-950 border border-white/[0.04] flex items-center justify-center">

                                        <img
                                            src="{{ asset($relatedProduct->image) }}"
                                            alt="{{ $relatedProduct->name }}"
                                            class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-700"
                                            loading="lazy">

                                    </div>

                                    <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors break-words">

                                        {{ $relatedProduct->name }}

                                    </h3>

                                    <div class="text-slate-400 text-sm leading-relaxed line-clamp-3">

                                        {!! Helper::limit(strip_tags($relatedProduct->text), 160) !!}

                                    </div>

                                </div>


                                <div class="relative z-10 mt-6 w-full py-3.5 px-4 rounded-xl bg-cyan-500 text-slate-950 font-black text-xs tracking-wider uppercase flex items-center justify-center gap-2 group-hover:bg-cyan-400 transition-colors">

                                    <span>{{ __('main.view all') }}</span>

                                    <i class="fa-solid fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>

                                </div>

                            </a>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </section>

</main>


{{-- Image Lightbox --}}
<div id="pd-lightbox" class="pd-lightbox" aria-hidden="true">

    <button
        type="button"
        id="pd-lightbox-close"
        class="pd-lightbox-close"
        aria-label="Close image">

        &times;

    </button>

    <img id="pd-lightbox-img" src="" alt="{{ $product->name }}">

</div>

@endsection


@section('js')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (typeof Swiper !== 'undefined') {

            const thumbsElement = document.querySelector('.product-thumbs-swiper');
            const mainElement = document.querySelector('.product-main-swiper');

            let thumbsSwiper = null;

            if (thumbsElement) {
                thumbsSwiper = new Swiper(thumbsElement, {
                    spaceBetween: 12,
                    slidesPerView: 4,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        320: {
                            slidesPerView: 3
                        },
                        640: {
                            slidesPerView: 4
                        }
                    }
                });
            }

            if (mainElement) {
                new Swiper(mainElement, {
                    spaceBetween: 10,
                    loop: {{ $productImages->count() > 1 ? 'true' : 'false' }},
                    navigation: {
                        nextEl: mainElement.querySelector('.swiper-button-next'),
                        prevEl: mainElement.querySelector('.swiper-button-prev')
                    },
                    thumbs: thumbsSwiper ? {
                        swiper: thumbsSwiper
                    } : undefined
                });
            }

        }


        // Product image lightbox
        const lightbox = document.getElementById('pd-lightbox');
        const lightboxImg = document.getElementById('pd-lightbox-img');
        const closeButton = document.getElementById('pd-lightbox-close');

        document.querySelectorAll('.product-main-swiper .swiper-slide img').forEach(function (img) {

            img.addEventListener('click', function () {

                if (!lightbox || !lightboxImg) return;

                lightboxImg.src = this.src;
                lightboxImg.alt = this.alt;

                lightbox.classList.add('is-open');
                lightbox.setAttribute('aria-hidden', 'false');

            });

        });


        function closeLightbox() {

            if (!lightbox) return;

            lightbox.classList.remove('is-open');
            lightbox.setAttribute('aria-hidden', 'true');

        }


        if (closeButton) {
            closeButton.addEventListener('click', closeLightbox);
        }


        if (lightbox) {

            lightbox.addEventListener('click', function (event) {

                if (event.target === lightbox) {
                    closeLightbox();
                }

            });

        }


        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {
                closeLightbox();
            }

        });

    });
</script>

@endsection
