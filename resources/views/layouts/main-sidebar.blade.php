<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ route('dashboard') }}"><img
                src="{{ URL::asset('assets/img/brand/logo-solla.png') }}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ route('dashboard') }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-solla.png') }}" class="logo-icon" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <ul class="side-menu">

            {{-- dashboard --}}
            <li class="slide pt-1">
                <a class="side-menu__item" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                    </svg><span class="side-menu__label">Dashboard</span></a>
            </li>
            <li class="side-item side-item-category">General</li>

            {{-- sliders --}}
            <li class="slide">
                <a class="side-menu__item" href="{{ route('sliders.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                        class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 10 6.5 10s1.5.67 1.5 1.5S7.33 13 6.5 13zm3-4C8.67 9 8 8.33 8 7.5S8.67 6 9.5 6s1.5.67 1.5 1.5S10.33 9 9.5 9zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 6 14.5 6s1.5.67 1.5 1.5S15.33 9 14.5 9zm4.5 2.5c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z"
                            opacity=".3" />
                        <path
                            d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10c1.38 0 2.5-1.12 2.5-2.5 0-.61-.23-1.21-.64-1.67-.08-.09-.13-.21-.13-.33 0-.28.22-.5.5-.5H16c3.31 0 6-2.69 6-6 0-4.96-4.49-9-10-9zm4 13h-1.77c-1.38 0-2.5 1.12-2.5 2.5 0 .61.22 1.19.63 1.65.06.07.14.19.14.35 0 .28-.22.5-.5.5-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.14 8 7c0 2.21-1.79 4-4 4z" />
                        <circle cx="6.5" cy="11.5" r="1.5" />
                        <circle cx="9.5" cy="7.5" r="1.5" />
                        <circle cx="14.5" cy="7.5" r="1.5" />
                        <circle cx="17.5" cy="11.5" r="1.5" />
                    </svg><span class="side-menu__label">Sliders</span></a>
            </li>
            {{-- pages --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        enable-background="new 0 0 24 24" class="side-menu__icon" viewBox="0 0 24 24">
                        <g>
                            <rect fill="none" />
                        </g>
                        <g>
                            <g />
                            <g>
                                <path
                                    d="M21,5c-1.11-0.35-2.33-0.5-3.5-0.5c-1.95,0-4.05,0.4-5.5,1.5c-1.45-1.1-3.55-1.5-5.5-1.5S2.45,4.9,1,6v14.65 c0,0.25,0.25,0.5,0.5,0.5c0.1,0,0.15-0.05,0.25-0.05C3.1,20.45,5.05,20,6.5,20c1.95,0,4.05,0.4,5.5,1.5c1.35-0.85,3.8-1.5,5.5-1.5 c1.65,0,3.35,0.3,4.75,1.05c0.1,0.05,0.15,0.05,0.25,0.05c0.25,0,0.5-0.25,0.5-0.5V6C22.4,5.55,21.75,5.25,21,5z M3,18.5V7 c1.1-0.35,2.3-0.5,3.5-0.5c1.34,0,3.13,0.41,4.5,0.99v11.5C9.63,18.41,7.84,18,6.5,18C5.3,18,4.1,18.15,3,18.5z M21,18.5 c-1.1-0.35-2.3-0.5-3.5-0.5c-1.34,0-3.13,0.41-4.5,0.99V7.49c1.37-0.59,3.16-0.99,4.5-0.99c1.2,0,2.4,0.15,3.5,0.5V18.5z" />
                                <path
                                    d="M11,7.49C9.63,6.91,7.84,6.5,6.5,6.5C5.3,6.5,4.1,6.65,3,7v11.5C4.1,18.15,5.3,18,6.5,18 c1.34,0,3.13,0.41,4.5,0.99V7.49z"
                                    opacity=".3" />
                            </g>
                            <g>
                                <path
                                    d="M17.5,10.5c0.88,0,1.73,0.09,2.5,0.26V9.24C19.21,9.09,18.36,9,17.5,9c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,10.69,16.18,10.5,17.5,10.5z" />
                                <path
                                    d="M17.5,13.16c0.88,0,1.73,0.09,2.5,0.26V11.9c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,13.36,16.18,13.16,17.5,13.16z" />
                                <path
                                    d="M17.5,15.83c0.88,0,1.73,0.09,2.5,0.26v-1.52c-0.79-0.15-1.64-0.24-2.5-0.24c-1.28,0-2.46,0.16-3.5,0.47v1.57 C14.99,16.02,16.18,15.83,17.5,15.83z" />
                            </g>
                        </g>
                    </svg><span class="side-menu__label">Pages</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('pages.index') }}">Pages List</a></li>
                    <li><a class="slide-item" href="{{ route('contact') }}">Contact</a></li>
                    <li><a class="slide-item" href="{{ route('social') }}">Social Media</a></li>
                </ul>
            </li>

            {{-- info --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('solutions.index') }}">
                    <i style="height: unset; color:#5b6e88" class="icon ion-md-paper side-menu__icon"></i>
                    <span class="side-menu__label">Solution bar</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('solutions.index') }}">Solutions List</a></li>
                    <li><a class="slide-item" href="{{ route('solutions.create') }}">Add sSolutions</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('solutionitems.index') }}">
                    <i style="height: unset; color:#5b6e88" class="icon ion-md-paper side-menu__icon"></i>
                    <span class="side-menu__label">Solution Section bar</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('solutionitems.index') }}">Solution Section List</a></li>
                    <li><a class="slide-item" href="{{ route('solutionitems.create') }}">Add Solution Section</a></li>
                </ul>
            </li>



            {{-- banners --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-star side-menu__icon"></i>
                    <span class="side-menu__label">Counts</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('counts.index') }}">Counts List</a></li>
                    <li><a class="slide-item" href="{{ route('counts.create') }}">Add Counts</a></li>
                </ul>
            </li>
            {{-- Type Certificates --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="icon ion-md-pricetags side-menu__icon"></i>
                    <span class="side-menu__label">Type Certificates</span><i
                        class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('typecertificates.index') }}">Type Certificates List</a>
                    </li>
                    <li><a class="slide-item" href="{{ route('typecertificates.create') }}">Add Type Certificate</a>
                    </li>
                </ul>
            </li>

            {{-- certificate types --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="si si-list side-menu__icon"></i>
                    <span class="side-menu__label">Certificates </span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('certificates.index') }}">Certificate List</a></li>
                    <li><a class="slide-item" href="{{ route('certificates.create') }}">Add Certificate </a></li>
                </ul>
            </li>



            {{-- categories --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="si si-layers side-menu__icon"></i>
                    <span class="side-menu__label">Categories</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('categories.index') }}">Categories List</a></li>
                    <li><a class="slide-item" href="{{ route('categories.create') }}">Add Category</a></li>
                </ul>
            </li>

            {{-- gallary --}}


            {{-- service --}}


            {{-- products --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-cpu side-menu__icon"></i>
                    <span class="side-menu__label">Products</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('products.index') }}">Products List</a></li>
                    <li><a class="slide-item" href="{{ route('products.create') }}">Add Product</a></li>
                    {{-- <li><a class="slide-item" href="{{ route('product.createMultiple') }}">Add Multiple Products</a>
                    </li> --}}
                </ul>
            </li>
            {{-- offers --}}
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--        <i style="height: unset; color:#5b6e88" class="fe fe-cpu side-menu__icon"></i>-->
            <!--        <span class="side-menu__label">Offers</span><i class="angle fe fe-chevron-down"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a class="slide-item" href="{{ route('offers.index') }}">Offers List</a></li>-->
            <!--        {{-- <li><a class="slide-item" href="{{ route('product.createMultiple') }}">Add Multiple Products</a>-->
            <!--        </li> --}}-->
            <!--    </ul>-->
            <!--</li>-->
            {{-- process --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M10.9 19.91c.36.05.72.09 1.1.09 2.18 0 4.16-.88 5.61-2.3L14.89 13l-3.99 6.91zm-1.04-.21l2.71-4.7H4.59c.93 2.28 2.87 4.03 5.27 4.7zM8.54 12L5.7 7.09C4.64 8.45 4 10.15 4 12c0 .69.1 1.36.26 2h5.43l-1.15-2zm9.76 4.91C19.36 15.55 20 13.85 20 12c0-.69-.1-1.36-.26-2h-5.43l3.99 6.91zM13.73 9h5.68c-.93-2.28-2.88-4.04-5.28-4.7L11.42 9h2.31zm-3.46 0l2.83-4.92C12.74 4.03 12.37 4 12 4c-2.18 0-4.16.88-5.6 2.3L9.12 11l1.15-2z"
                            opacity=".3" />
                        <path
                            d="M12 22c5.52 0 10-4.48 10-10 0-4.75-3.31-8.72-7.75-9.74l-.08-.04-.01.02C13.46 2.09 12.74 2 12 2 6.48 2 2 6.48 2 12s4.48 10 10 10zm0-2c-.38 0-.74-.04-1.1-.09L14.89 13l2.72 4.7C16.16 19.12 14.18 20 12 20zm8-8c0 1.85-.64 3.55-1.7 4.91l-4-6.91h5.43c.17.64.27 1.31.27 2zm-.59-3h-7.99l2.71-4.7c2.4.66 4.35 2.42 5.28 4.7zM12 4c.37 0 .74.03 1.1.08L10.27 9l-1.15 2L6.4 6.3C7.84 4.88 9.82 4 12 4zm-8 8c0-1.85.64-3.55 1.7-4.91L8.54 12l1.15 2H4.26C4.1 13.36 4 12.69 4 12zm6.27 3h2.3l-2.71 4.7c-2.4-.67-4.35-2.42-5.28-4.7h5.69z" />
                    </svg><span class="side-menu__label"> Journey</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('process.index') }}"> Journey List</a></li>
                    <li><a class="slide-item" href="{{ route('process.create') }}">Add Journey</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><i
                        style="height: unset; color:#5b6e88" class="fe fe-award side-menu__icon"></i><span
                        class="side-menu__label">Why Choose</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('qualities.index') }}">Why Choose List</a></li>
                    <li><a class="slide-item" href="{{ route('qualities.create') }}">Add Why Choose</a></li>
                </ul>
            </li>
            {{-- orders --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">Reports</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('reports.index') }}">Reports List</a></li>
                    <li><a class="slide-item" href="{{ route('reports.create') }}"> Add Reports </a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fa fa-tag side-menu__icon"></i>
                    <span class="side-menu__label">Services</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('services.index') }}">Service List</a></li>
                    <li><a class="slide-item" href="{{ route('services.create') }}">Add Service</a></li>
                </ul>
            </li>
            {{-- users --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-download-cloud side-menu__icon"></i>
                    <span class="side-menu__label">Download Type</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('downloadtypes.index') }}">Download Type List</a></li>
                    <li><a class="slide-item" href="{{ route('downloadtypes.create') }}">Add Download Type </a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-download side-menu__icon"></i>
                    <span class="side-menu__label">Downloads</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('downloads.index') }}">Downloads List</a></li>
                    <li><a class="slide-item" href="{{ route('downloads.create') }}">Add Download </a></li>
                </ul>
            </li>

            {{-- faqs --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fe fe-help-circle side-menu__icon"></i>
                    <span class="side-menu__label">Faqs</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('faqs.index') }}">Faqs List</a></li>
                    <li><a class="slide-item" href="{{ route('faqs.create') }}">Add Faq</a></li>
                </ul>
            </li>

            {{-- sizes --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="ti-headphone-alt side-menu__icon"></i>
                    <span class="side-menu__label">Supports</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('supports.index') }}">Supports List</a></li>
                    <li><a class="slide-item" href="{{ route('supports.create') }}">Add Support </a></li>
                </ul>
            </li>

            {{-- locations --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fa fa-map-marker-alt side-menu__icon"></i>
                    <span class="side-menu__label">Locations</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('locations.index') }}">Locations List</a></li>
                    <li><a class="slide-item" href="{{ route('locations.create') }}">Add Location</a></li>
                </ul>
            </li>

            {{-- reviews --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="fa fa-comment-dots side-menu__icon"></i>
                    <span class="side-menu__label">Reviews</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('reviews.index') }}">Reviews List</a></li>
                </ul>
            </li>

            {{-- messages --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><svg
                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                        <path
                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                    </svg><span class="side-menu__label">Messages</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('messages.index') }}">Messages List</a></li>
                </ul>
            </li>

            {{-- subscription --}}
            <!--<li class="slide">-->
            <!--    <a class="side-menu__item" data-toggle="slide" href="#">-->
            <!--        <i style="height: unset; color:#5b6e88" class="typcn typcn-mail side-menu__icon"></i>-->
            <!--        <span class="side-menu__label">Subscriptions</span><i class="angle fe fe-chevron-down"></i></a>-->
            <!--    <ul class="slide-menu">-->
            <!--        <li><a class="slide-item" href="{{ route('newsletters.index') }}">Subscriptions List</a></li>-->
            <!--    </ul>-->
            <!--</li>-->

            {{-- settings --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i style="height: unset; color:#5b6e88" class="icon ion-ios-settings side-menu__icon"></i> <span
                        class="side-menu__label">Settings</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('settings.index') }}">Main Settings</a></li>
                </ul>
            </li>

            <li class="slide mt-4 pt-4">
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
