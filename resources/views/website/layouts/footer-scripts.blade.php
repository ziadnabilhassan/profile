  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.2.10/swiper-bundle.min.js"></script>
<script src="{{ asset('website/assets/js/script.js') }}"></script>

<script>
    // يوصّل التاب النشط لنص الشريط على الموبايل
    (function() {
        const bar = document.getElementById('page-tabs');
        const active = bar && bar.querySelector('[data-active]');
        if (active) {
            bar.scrollLeft = active.offsetLeft - (bar.clientWidth - active.offsetWidth) / 2;
        }
    })();
</script>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




<script>
(function() {
    var track = document.getElementById('sliderTrack');
    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');
    var dots = document.querySelectorAll('.dot');
    var total = 3;
    var current = 0;
    var autoTimer = null;
    var touchStartX = 0;

    // ✅ معرفة هل الموقع RTL
    var isRTL = document.documentElement.dir === "rtl";

    function goTo(index) {
        if (index < 0) index = total - 1;
        if (index >= total) index = 0;
        current = index;

        // ✅ دعم الاتجاه العربي
        var direction = isRTL ? 1 : -1;
        track.style.transform = 'translateX(' + (direction * current * (100 / total)) + '%)';

        dots.forEach(function(d, i) {
            d.classList.toggle('active', i === current);
        });
    }

    prevBtn.addEventListener('click', function() {
        goTo(isRTL ? current + 1 : current - 1); // ✅ عكس الاتجاه في العربي
        resetAuto();
    });

    nextBtn.addEventListener('click', function() {
        goTo(isRTL ? current - 1 : current + 1); // ✅ عكس الاتجاه
        resetAuto();
    });

    dots.forEach(function(dot, i) {
        dot.addEventListener('click', function() {
            goTo(i);
            resetAuto();
        });
    });

    function startAuto() {
        autoTimer = setInterval(function() {
            goTo(current + 1);
        }, 4000);
    }

    function resetAuto() {
        clearInterval(autoTimer);
        startAuto();
    }

    startAuto();

    track.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].clientX;
    }, {
        passive: true
    });

    track.addEventListener('touchend', function(e) {
        var diff = touchStartX - e.changedTouches[0].clientX;

        if (Math.abs(diff) > 50) {
            // ✅ swipe متوافق مع RTL
            if (isRTL) {
                goTo(diff > 0 ? current - 1 : current + 1);
            } else {
                goTo(diff > 0 ? current + 1 : current - 1);
            }
            resetAuto();
        }
    }, {
        passive: true
    });

    document.addEventListener('keydown', function(e) {
        // ✅ الكيبورد في العربي
        if (e.key === 'ArrowLeft') {
            goTo(isRTL ? current + 1 : current - 1);
            resetAuto();
        }
        if (e.key === 'ArrowRight') {
            goTo(isRTL ? current - 1 : current + 1);
            resetAuto();
        }
    });

})();
</script>

{{-- Add to cart function --}}
<script>
    function addToCart(productId, variant, qty = 1) {
        $.ajax({
            url: '{{ route('cart.add') }}',
            method: 'POST',
            data: {
                id: productId,
                variant: variant,
                qty: qty,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '{{ __('main.success') }}',
                    text: response.success,
                    showCancelButton: true,
                    confirmButtonText: '{{ __('main.shopping cart') }}',
                    cancelButtonText: '{{ __('main.continue shopping') }}',
                    preConfirm: () => {
                        window.location.href = '{{ route('cart') }}';
                    }
                }).then((result) => {
                    if (result.isDismissed) {
                        Swal.close();
                    }
                });

                // Update cart data (if needed)
                $.ajax({
                    method: 'GET',
                    url: '{{ route('contacts') }}',
                    success: function(response) {
                        let $response = $('<div>').html(response);
                        let cartCount = $response.find('header .cart-count').html();
                        let cartContent = $response.find('#shoppingCart').html();
                        let cartContents = $response.find('#shoppingCarts').html();
                        $('header .cart-count').html(cartCount);
                        $('#shoppingCart').html(cartContent);
                        $('#shoppingCarts').html(cartContents);
                        // let $responseitem = $('<div>').html(response);
                        // let cartitem = $responseitem.find('header .cart-item').html();
                        // $('header .cart-item').html(cartitem);

                    },
                    error: function() {
                        console.log('Error fetching cart data.');
                    }
                });
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.responseJSON.error,
                });
            }
        });
    }

    //  Add to cart using link
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        let productId = $(this).data('id');
        let variant = $(this).data('variant');
        addToCart(productId, variant);
    });

    //  Add to cart using form
    $(document).on('click', '.add-to-cart-details', function(e) {
        e.preventDefault();
        let qty = $('.quantity').val() || 1;
        let productId = $(this).attr('data-id');
        let variant = $(this).attr('data-variant');
        addToCart(productId, variant, qty);
    });
</script>

{{-- update quantity in cart --}}
<script>
    $(".dec-btn").on("click", function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest("div").find("input");
        var value = parseInt($input.val(), 10);

        if (value > 1) {
            value = value - 1;
        }
        $input.val(value).trigger("change");
    });

    $(".inc-btn").on("click", function(e) {
        e.preventDefault();
        var $this = $(this);
        var $input = $this.closest("div").find("input");
        var value = parseInt($input.val(), 10);

        if (value > -1) {
            value = value + 1;
        }
        $input.val(value).trigger("change");
    });
    $(document).on('change', '.qty-update', function() {

        let $input = $(this);
        let productId = $(this).data('id');
        let quantity = $(this).val();
        if (quantity < 1) {
            $input.val(1);
            return;
        }
        $.ajax({
            url: '{{ route('cart.update') }}',
            method: 'POST',
            data: {
                id: productId,
                quantity: quantity,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                $input.val(quantity - 1);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.responseJSON.error,
                });
            }
        });
    });
</script>

{{-- remove item from cart --}}
<script>
    $(document).on('click', '.remove-item', function(e) {
        e.preventDefault();
        let productId = $(this).data('id');
        $.ajax({
            url: '{{ route('cart.remove') }}',
            method: 'POST',
            data: {
                id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(response) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                });
            }
        });
    });
</script>

{{-- quick view --}}
<script>
    $(document).ready(function() {
        $('.view-product').on('click', function(e) {
            e.preventDefault();
            $('.modal-dialog').empty();
            let id = $(this).data('id');
            let variant = $(this).data('variant');
            $.ajax({
                url: '{{ route('product.quickView', '') }}/' + variant,
                method: 'GET',
                success: function(response) {
                    $('.modal-dialog').html(response);
                },
                error: function() {
                    $('.modal-dialog').click();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "{{ __('main.no products') }}",
                    });
                }
            });
        });
    });
</script>
{{-- quick view actions --}}
<script>
    $(document).ready(function() {
        $(document).on('click', '.image-view-url', function(e) {
            let img = $(this).attr('src');
            $('.image-view').attr('src', img);
        });
        $(document).on('change', '.variants-list', function() {
            let selectedOption = $(this).find('option:selected');
            let price = selectedOption.data('price');
            let oldPrice = selectedOption.data('old_price');
            $('.size-price').text('LE ' + price);
            if (oldPrice) {
                if ($('.size-old-price').length) {
                    $('.size-old-price').text('LE ' + oldPrice);
                } else {
                    $('.quickview-wrapper .price').append(
                        '<del class="amount size-old-price" style="color: red; font-size: 15px;">LE ' +
                        oldPrice + '</del>');
                }
            } else {
                $('.size-old-price').remove();
            }
        });
        $(document).on('click', '.plus', function() {
            let $input = $(this).siblings('.qty');
            let currentVal = parseInt($input.val());
            if (!isNaN(currentVal)) {
                $input.val(currentVal + 1);
            }
        });
        $(document).on('click', '.minus', function() {
            let $input = $(this).siblings('.qty');
            let currentVal = parseInt($input.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $input.val(currentVal - 1);
            }
        });
    });
</script>
   <script>
        $(document).ready(function() {
            $('#send-message').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('contact.mail') }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.fire({
                            title: "Good job!",
                            text: response,
                            icon: "success"
                        });
                        $('#send-message')[0].reset();
                    },
                    error: function(error) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                });
            });
        });
    </script>
{{-- subscribtion --}}
<script>
    $(document).ready(function() {
        $('#subscribtion').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('newsletter.message') }}',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: "Good job!",
                        text: response,
                        icon: "success"
                    });
                    $('#subscribtion')[0].reset();
                },
                error: function(error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                }
            });
        });
    });
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ __('main.success') }}',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@yield('js')
