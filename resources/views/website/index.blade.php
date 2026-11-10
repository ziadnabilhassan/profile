@extends('website.layouts.master')
@section('title')
{{ __('main.site') }} | {{ __('main.home') }}
@endsection
@section('css')
@endsection
@section('content')
<section id="home" class="relative w-full h-screen min-h-[560px] overflow-hidden bg-darkBg">
    <video class="absolute inset-0 w-full h-full object-cover" src="{{ asset($slider->image) }}" autoplay muted loop playsinline preload="auto"></video>
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/30 pointer-events-none"></div>

</section>


<section id="about" class="py-36 relative bg-slate-50 dark:bg-[#070a12] overflow-hidden border-t border-slate-200 dark:border-white/[0.06]">

    <!-- Ambient Cyber Glows -->
    <div class="absolute top-1/3 left-0 w-[500px] h-[500px] bg-sky-500/[0.10] dark:bg-sky-500/[0.06] rounded-[15px] blur-[150px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-0 w-[500px] h-[500px] bg-blue-600/[0.08] dark:bg-blue-600/[0.06] rounded-[15px] blur-[150px] pointer-events-none"></div>

    <!-- Tech Grid Lines -->
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#00000008_1px,transparent_1px),linear-gradient(to_bottom,#00000008_1px,transparent_1px)] dark:bg-[linear-gradient(to_right,#ffffff02_1px,transparent_1px),linear-gradient(to_bottom,#ffffff02_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Section Top Header -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end mb-10">
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-[15px] bg-sky-500/10 border border-sky-500/30 dark:border-sky-500/20 backdrop-blur-xl">
                    <span class="w-2 h-2 rounded-[15px] bg-sky-600 dark:bg-sky-400"></span>
                    <span class="text-xs font-extrabold tracking-[0.25em] text-sky-700 dark:text-sky-400 uppercase">{{ __('main.who we are') }}</span>
                </div>
                <h2 class="text-4xl sm:text-6xl font-black tracking-tight leading-[1.08]">
                    <span class="text-slate-900 dark:text-[#ffffff]">{{ __('main.SHAPING THE FUTURE OF') }}</span>
                    <span class="bg-gradient-to-r from-sky-600 via-blue-600 to-indigo-600 dark:from-cyan-400 dark:via-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">
                       {{ __('main.site') }}
                    </span>
                </h2>
            </div>
            <div class="lg:col-span-5">
                <p class="text-slate-600 dark:text-slate-300 text-base sm:text-lg leading-relaxed border-l-2 border-sky-500/60 dark:border-sky-500/40 pl-6">
                  {{ Helper::limit($page->text ,50)}}
                </p>
            </div>
        </div>

        <!-- Main Showcase Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-[16px] items-stretch">

            <!-- Left Side -->
            <div class="lg:col-span-6 flex flex-col justify-between gap-6">
                @foreach ($Pages as $page)


                <!-- 1. Our Vision -->
                <div class="group relative p-8 rounded-3xl bg-white dark:bg-slate-900/80 backdrop-blur-2xl border border-slate-200 dark:border-white/[0.08] hover:border-sky-500/60 transition-all duration-500 shadow-[0_10px_30px_rgba(15,23,42,0.08)] dark:shadow-[0_20px_40px_rgba(0,0,0,0.4)]">
                    <div class="absolute inset-0 bg-gradient-to-r from-sky-500/5 to-transparent rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none"></div>
                    <div class="flex items-start gap-6 relative z-10">
                        <div class="w-14 h-14 rounded-2xl bg-sky-500/10 border border-sky-500/30 dark:border-sky-500/20 flex items-center justify-center text-sky-700 dark:text-sky-400 text-2xl group-hover:scale-110 group-hover:bg-sky-500 group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div class="space-y-2 flex-1">
                            <div class="flex items-center justify-between">
                                <h3 class="font-bold text-xl transition-colors">
                                    <span class="text-slate-900 dark:text-[#ffffff] group-hover:text-sky-600 dark:group-hover:text-sky-300">{{ $page->title }}</span>
                                </h3>

                            </div>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">{{ Helper::limit($page->text ,50) }}</p>
                        </div>
                    </div>
                </div>
                 @endforeach


            </div>

            <!-- Right Side: Image -->
            <div class="lg:col-span-6">
                <div class="relative h-full min-h-[500px] lg:min-h-full rounded-3xl overflow-hidden border border-slate-200 dark:border-white/[0.08] group shadow-[0_15px_40px_rgba(15,23,42,0.15)] dark:shadow-[0_25px_60px_rgba(0,0,0,0.8)] flex flex-col justify-end p-8">
                    <div class="absolute inset-0 z-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-transparent via-transparent to-transparent dark:from-[#070a12] dark:via-[#070a12]/40 dark:to-transparent z-10"></div>
                        <img src="{{ asset($page->image) }}" alt="Voltera Research Center" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-1000">
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- END: ABOUT SECTION -->

<!-- Products Section -->
<section id="products" class="py-36 relative bg-[#070a12] overflow-hidden border-t border-white/[0.06]">

    <!-- Cinematic Ambient Glow -->
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-[900px] h-[500px] bg-cyan-500/[0.04] rounded-full blur-[180px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Header Section: Title/Subtitle on Left, View All Button on Right (or vice versa based on flow) -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="space-y-3 max-w-xl">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-[15px] bg-cyan-500/10 border border-cyan-500/20 backdrop-blur-xl">
                    <span class="w-2 h-2 rounded-[15px] bg-cyan-400 animate-pulse"></span>
                    <span class="text-xs font-extrabold tracking-[0.25em] text-cyan-400 uppercase">{{ __('main.Recent Products') }}</span>
                </div>

                <!-- <h2 class="text-4xl sm:text-5xl font-black tracking-tight text-white">
                    Engineered <span class="text-cyan-400">Systems</span>
                </h2> -->
                <p class="text-slate-400 text-base leading-relaxed">
                   {{ __('main.We are Providing Best Services') }}
                </p>
            </div>

            <!-- View All Products Button -->
            <div>
                <a href="{{ route('products') }}" class="group inline-flex items-center gap-3 px-6 py-3.5 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 hover:bg-cyan-500 hover:text-slate-950 font-bold text-sm tracking-wide transition-all duration-300 shadow-[0_0_20px_rgba(6,182,212,0.1)]">
                    <span>{{ __('main.view all') }}</span>
                    <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[16px]">

            @foreach ($recentProducts as $product)


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

    </div>
</section>
<!-- END: PRODUCTS SECTION  -->

<!-- Stats Section -->
<section class="py-28 relative bg-[#070a12] overflow-hidden border-y border-white/[0.06]">

    <!-- Background Image with Cinematic Overlay & Balanced Brightness -->
    <div class="absolute inset-0 z-0">
        <img id="counter-parallax-img" src="{{ asset('website/assets/images/counter.jpg') }}" alt="{{ __('main.projects') }}" class="w-full h-full object-cover object-center filter brightness-[0.40] contrast-125">

        <!-- Softer Multi-layer Gradients for Seamless Depth -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#070a1205]/90 via-[#070a1205]/60 to-[#070a12]/90"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#070a1205] via-transparent to-[#070a1205]/80"></div>
    </div>

    <!-- Glowing Accents Behind Stats -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-cyan-500/[0.08] rounded-full blur-[140px] pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 text-center divide-y lg:divide-y-0 lg:divide-x divide-white/[0.08]">
            @foreach ($counts as $count)


            <!-- Stat 1 -->
            <div class="p-6 group">
                <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 text-lg group-hover:scale-105 transition-transform duration-500">
                    <img src="{{ asset($count->icon) }}">
                </div>
                <div class="text-4xl sm:text-6xl font-black text-white drop-shadow-[0_0_25px_rgba(6,182,212,0.4)] mb-3 group-hover:scale-105 transition-transform duration-500">
                    <span data-countup="{{ $count->count }}">0</span><span class="text-cyan-400">+</span>
                </div>
                <div class="text-xs sm:text-sm font-bold text-slate-300 uppercase tracking-[0.2em]">{{ $count->title }}</div>
            </div>
             @endforeach



        </div>
    </div>
</section>
<!-- END: COUNTER SECTION -->


<!-- Contact / Quote Section -->
<section id="contact" class="py-28 bg-slate-50 dark:bg-[#030508] relative border-t border-slate-200 dark:border-cardBorder">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-[2px] bg-sky-600 dark:bg-cyanAccent"></div>
                    <span class="text-xs font-bold tracking-widest text-sky-700 dark:text-cyanAccent uppercase">{{ __('main.get in touch') }}</span>
                </div>
                <h2 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                    <span class="text-slate-900 dark:text-[#ffffff]">{{ __('main.contact us now') }}</span>
                </h2>

                <div class="space-y-4 pt-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 dark:bg-cyanAccent/10 border border-sky-500/30 dark:border-cyanAccent/20 flex items-center justify-center text-sky-700 dark:text-cyanAccent">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 dark:text-slate-400 block">{{ __('main.call us') }}</span>
                            <span class="text-slate-900 dark:text-[#ffffff] font-semibold">+{{ $Contact->phone1 }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 dark:bg-cyanAccent/10 border border-sky-500/30 dark:border-cyanAccent/20 flex items-center justify-center text-sky-700 dark:text-cyanAccent">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 dark:text-slate-400 block">{{ __('main.email') }}</span>
                            <span class="text-slate-900 dark:text-[#ffffff] font-semibold">{{ $Contact->email }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-sky-500/10 dark:bg-cyanAccent/10 border border-sky-500/30 dark:border-cyanAccent/20 flex items-center justify-center text-sky-700 dark:text-cyanAccent">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="text-xs text-slate-500 dark:text-slate-400 block">{{ __('main.location') }}</span>
                            <span class="text-slate-900 dark:text-[#ffffff] font-semibold">{{ $Contact->address }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 bg-white dark:bg-cardBg rounded-3xl p-8 sm:p-10 border border-slate-200 dark:border-cardBorder shadow-[0_15px_40px_rgba(15,23,42,0.10)] dark:shadow-2xl relative">
                <form id="send-message" class="space-y-6" >
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Full Name</label>
                            <input type="text" name="name" required placeholder="John Doe" class="w-full bg-slate-50 dark:bg-darkBg border border-slate-300 dark:border-cardBorder rounded-xl px-4 py-3.5 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-sky-600 dark:focus:border-cyanAccent transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Phone Number</label>
                            <input type="tel" name="phone" required placeholder="+20 123 456 7890" class="w-full bg-slate-50 dark:bg-darkBg border border-slate-300 dark:border-cardBorder rounded-xl px-4 py-3.5 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-sky-600 dark:focus:border-cyanAccent transition-colors">
                        </div>
                    </div>

                    <!-- Row 2: Email Address & Subject -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Email Address</label>
                            <input type="email" name="email" required placeholder="john@company.com" class="w-full bg-slate-50 dark:bg-darkBg border border-slate-300 dark:border-cardBorder rounded-xl px-4 py-3.5 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-sky-600 dark:focus:border-cyanAccent transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Subject</label>
                            <input type="text" name="subject"  required placeholder="Project Inquiry" class="w-full bg-slate-50 dark:bg-darkBg border border-slate-300 dark:border-cardBorder rounded-xl px-4 py-3.5 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-sky-600 dark:focus:border-cyanAccent transition-colors">
                        </div>
                    </div>

                    <!-- Row 3: Message -->
                    <div>
                        <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2">Message</label>
                        <textarea rows="4" name="message" required placeholder="Tell us about your power requirements..." class="w-full bg-slate-50 dark:bg-darkBg border border-slate-300 dark:border-cardBorder rounded-xl px-4 py-3.5 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-600 focus:outline-none focus:border-sky-600 dark:focus:border-cyanAccent transition-colors"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-4 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 dark:from-cyanAccent dark:to-blueAccent text-white dark:text-black font-bold text-base shadow-lg glow-cyan hover:opacity-90 transition-opacity flex items-center justify-center gap-3 cursor-pointer">
                        <span>{{ __('main.send message') }}</span>
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>


@endsection
@section('js')
<script>
    $(document).ready(function() {
        // Initialize swipers and other UI elements
        // ... (your existing swiper initialization code)

        // Size selection handler
        $('input[name="size"]').change(function() {
            const selectedSize = $(this).val();
            const productId = $('.add-to-cart-details').data('id');
            $('.value-currentSize').text(selectedSize);

            $.ajax({
                url: `/get-unique-colors-by-variant-size/${productId}/${selectedSize}`,
                method: 'GET',
                success: function(response) {
                    $('.shop-single-color').empty();

                    if (response.length > 0) {
                        response.forEach(function(variant, index) {
                            const colorId = variant.color.id;
                            const colorName = variant.color.name
                                . {
                                    {
                                        app() - > getLocale()
                                    }
                                };
                            const colorCode = variant.color.code;
                            const colorItem = `
                                        <li style="display: inline-block;">
                                            <input id="color-${colorId}" type="radio" name="color" value="${colorId}"
                                                data-variant-id="${variant.id}" data-price="${variant.price}"
                                                data-old-price="${variant.old_price}" data-quantity="${variant.quantity}"
                                                data-color="${colorName}"
                                                ${index === 0 ? 'checked' : ''}>
                                            <label class="hover-tooltip tooltip-bot radius-60 color-btn" for="color-${colorId}"
                                                data-value="${colorName}" data-color="${colorCode}">
                                                <span class="btn-checkbox" style="background-color: ${colorCode}"></span>
                                                <span class="tooltip">${colorName}</span>
                                            </label>
                                        </li>
                                    `;
                            $('.shop-single-color').append(colorItem);
                        });

                        // Update UI for the first color
                        $('input[name="color"]:first').trigger('change');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching colors:', error);
                }
            });
        });

        // Color selection handler
        $(document).on('change', 'input[name="color"]', function() {
            const price = $(this).data('price');
            const oldPrice = $(this).data('old-price');
            const variantId = $(this).data('variant-id');
            const quantity = $(this).data('quantity');
            const colorName = $(this).next('label').data('value');

            // Update current color display
            $('.value-currentColor').text(colorName);

            // Update price display
            $('.price-on-sale').text('{{ __('
                main.currency ') }} ' + price);
            if (oldPrice > 0) {
                $('.compare-at-price').text('{{ __('
                    main.currency ') }} ' + oldPrice).show();
            } else {
                $('.compare-at-price').hide();
            }
            $('.total-price').text('{{ __('
                main.currency ') }} ' + price);

            // Update the "Add to Cart" button with the variant ID
            $('.add-to-cart-details').attr('data-variant', variantId);

            // Stock visibility logic
            if (quantity > 0) {
                $('.add-to-cart-details').show();
                $('.out-of-stock').hide();
                $('.in-stock-text').text('In Stock');
            } else {
                $('.add-to-cart-details').hide();
                $('.out-of-stock').show();
                $('.in-stock-text').text('Out of Stock');
            }
        });

        // Quantity handlers
        $('.btn-increase').click(function() {
            const input = $(this).siblings('.quantity-product');
            input.val(parseInt(input.val()) + 1);
        });

        $('.btn-decrease').click(function() {
            const input = $(this).siblings('.quantity-product');
            if (parseInt(input.val()) > 1) {
                input.val(parseInt(input.val()) - 1);
            }
        });

        // Tab switching
        $('.widget-menu-tab .item-title').click(function() {
            const index = $(this).index();
            $(this).addClass('active').siblings().removeClass('active');
            $('.widget-content-inner').removeClass('active').eq(index).addClass('active');
        });

        // Trigger initial size selection
        $('input[name="size"]:checked').trigger('change');
    });
</script>
@endsection
