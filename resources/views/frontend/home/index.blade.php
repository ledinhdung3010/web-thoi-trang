@extends('frontend_layout')
@section('title','HOME-PRODUCT')
@php
    $showSlider=true;
    $showBanner=true;
@endphp
@section('content')
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Category
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a id="all-products" href="{{route('frontend.home')}}" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </a>
                @foreach ($categories as $key=>$category)
                    <button class="js-item-product stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter=".{{$category->slug}}">
                        {{$category->name}}
                    </button>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                     Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
            
            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" id="btn-search-product">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input value="{{$keyword}}" id="search-product" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                    
                </div>	
            </div>

            <!-- Filter -->
            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    {{-- <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Average rating
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div> --}}

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="{{route('frontend.home')}}" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('frontend.home',['from_price'=>1,'to_price'=>50])}}" class="filter-link stext-106 trans-04">
                                    $1.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('frontend.home',['from_price'=>50000,'to_price'=>100000])}}" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('frontend.home',['from_price'=>100000,'to_price'=>150000])}}" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('frontend.home',['from_price'=>150000,'to_price'=>200000])}}" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="{{route('frontend.home',['from_price'=>200000,'to_price'=>200000])}}" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                          @foreach ($colors as $color)
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: {{$color->code}};">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="{{route('frontend.home',['color'=>$color->slug])}}" class="filter-link stext-106 trans-04">
                                    {{$color->name}}
                                </a>
                            </li>
                              
                          @endforeach
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            @foreach ($tags as $tag)
                                <a href="{{route('frontend.home',['tag'=>$tag->slug])}}" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                           

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row isotope-grid">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->category_slug}}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img width="100%" src="{{URL::to('/')}}/upload/images/product/{{$product->image}}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="{{route('frontend.product.detail',['slug'=>$product->slug,'id'=>$product->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                               {{$product->name}}
                            </a>

                            <span class="stext-105 cl3">
                                {{"$".$product->price}}
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="{{asset('frontend/images/icons/icon-heart-01.png')}}" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('frontend/images/icons/icon-heart-02.png')}}" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="container d-flex justify-content-center align-items-center" >
            {{$products->appends(request()->input())->links()}}
        </div>
       
    </div>
    
   
</section>
@endsection
@push('javascript')
    <script>
            $(function(){
                $('.js-item-product').click(function () {
                    $('#all-products').removeClass('how-active1')
                });
                $('#search-product').bind('enterKey',function(){
                    let keyword=$('#search-product').val().trim();
                    keyword=encodeURI(keyword);
                    window.location.href="{{route('frontend.home')}}"+"?s="+keyword;
                    
                })
                $('#search-product').keyup(function(e){
                    if(e.keyCode==13){
                        $(this).trigger('enterKey')
                    }
                })

                $('#btn-search-product').click(function(){
                    let keyword=$('#search-product').val().trim();
                    keyword=encodeURI(keyword);
                    window.location.href="{{route('frontend.home')}}"+"?s="+keyword;
                    
                })

            })
    </script>
@endpush