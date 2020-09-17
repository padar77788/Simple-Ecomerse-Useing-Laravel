@extends('frontend.layouts.app')

@section('content')

    @php
        $bangladesh = [
            "Barisal" =>    ["Barguna",  "Barisal",        "Bhola",    "Jhalokati",  "Patuakhali", "Pirojpur"],
            "Chittagong" => ["Bandarban","Brahmanbaria",   "Chandpur", "Chittagong", "Comilla",    "Cox's Bazar","Feni",     "Khagrachhari","Lakshmipur", "Noakhali", "Rangamati"],
            "Dhaka" =>      ["Dhaka",    "Faridpur",       "Gazipur",  "Gopalganj",  "Kishoreganj","Madaripur",  "Manikganj","Munshiganj",  "Narayanganj","Narsingdi","Rajbari","Shariatpur","Tangail"],
            "Khulna" =>     ["Bagerhat", "Chuadanga",      "Jessore",  "Jhenaidah",  "Khulna",     "Kushtia",    "Magura",   "Meherpur",    "Narail",     "Satkhira"],
            "Mymensingh" => ["Jamalpur", "Mymensingh",     "Netrakona","Sherpur"],
            "Rajshahi"   => ["Bogra",    "Chapainawabganj","Joypurhat","Naogaon",    "Natore",     "Pabna",      "Rajshahi", "Sirajganj"],
            "Rangpur"    => ["Dinajpur", "Gaibandha",      "Kurigram", "Lalmonirhat","Nilphamari", "Panchagarh", "Rangpur",  "Thakurgaon"],
            "Sylhet"     => ["Habiganj", "Moulvibazar",    "Sunamganj","Sylhet"]
        ];
    @endphp

    <div id="page-content">
        <section class="slice-xs sct-color-2 border-bottom">
            <div class="container container-sm">
                <div class="row cols-delimited">
                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon mb-0">
                                <i class="icon-hotel-restaurant-105"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">1. {{__('My Cart')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center active">
                            <div class="block-icon mb-0">
                                <i class="icon-finance-067"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">2. {{__('Shipping info')}}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="icon-block icon-block--style-1-v5 text-center">
                            <div class="block-icon c-gray-light mb-0">
                                <i class="icon-finance-059"></i>
                            </div>
                            <div class="block-content d-none d-md-block">
                                <h3 class="heading heading-sm strong-300 c-gray-light text-capitalize">3. {{__('Payment')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 gry-bg">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-5">
                        <form class="form-default" data-toggle="validator" action="{{ route('checkout.store_shipping_infostore') }}" role="form" method="POST">
                            @csrf
                            <div class="card">
                                @if(Auth::check())
                                    @php
                                        $user = Auth::user();
                                    @endphp
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Name')}}</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Email')}}</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Address')}}</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Select your country')}}</label>
                                                    <select class="form-control selectpicker" data-live-search="true" name="country">
                                                        @foreach (\App\Country::all() as $key => $country)
                                                            <option value="{{ $country->name }}" @if ($country->code == $user->country) selected @endif>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">{{__('City')}}</label>
                                                    <input type="text" class="form-control" value="{{ $user->city }}" name="city" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">{{__('Postal code')}}</label>
                                                    <input type="text" class="form-control" value="{{ $user->postal_code }}" name="postal_code" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label class="control-label">{{__('Phone')}}</label>
                                                    <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" required>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="logged">
                                    </div>
                                @else
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Name')}}</label>
                                                    <input type="text" class="form-control" name="name" placeholder="{{__('Name')}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Email')}}</label>
                                                    <input type="text" class="form-control" name="email" placeholder="{{__('Email')}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('Address')}}</label>
                                                    <input type="text" class="form-control" name="address" placeholder="{{__('Address')}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">{{__('Select your country')}}</label>
                                            <select class="form-control custome-control" data-live-search="true" id="country" name="country">
                                                @foreach (\App\Country::all() as $key => $country)
                                                    <option value="{{ $country->name }}" {{ $country->name == 'Bangladesh' ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">{{__('City')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('City')}}" id="cityName">
                                            <select class="form-control" id="cityList">
                                                <option value="">Please select district or region</option>
                                                @foreach ($bangladesh as $division => $districts)
                                                    <optgroup label="{{ $division }}">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district }}" {{ $district == 'Dhaka' ? 'selected' : '' }}>{{ $district }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label class="control-label">{{__('Postal code')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Postal code')}}" name="postal_code" required>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="control-label">{{__('Phone')}}</label>
                                            <input type="text" class="form-control" placeholder="{{__('Phone')}}" name="phone" required>
                                        </div>

                                        <input type="hidden" name="checkout_type" value="guest">
                                    </div>
                                @endif
                            </div>

                            <div class="row align-items-center pt-4">
                                <div class="col-6">
                                    <a href="{{ route('home') }}" class="link link--style-3">
                                        <i class="ion-android-arrow-back"></i>
                                        {{__('Return to shop')}}
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="btn btn-styled btn-base-1">{{__('Continue to Payment')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-7 ml-lg-auto">
                        
                        
                        <div class="bg-white py-2 mb-2">
                            
                            <div class="card-title px-3">
                                <h4 class="heading heading-4 strong-400 mb-0">
                                    Delivery Method
                                </h4>
                            </div>
                            
                            <div class="ml-4">
                                
                                <label for="home_delivery" class="d-block">
                                    <input type="radio" name="delivery_method" id="home_delivery"> 
                                    <span class="ml-1">Home Delivery <b>Tk.</b> <b id="home_delivery_amount"></b> </span>
                                </label>
                                
                                <div id="near_office" style="display:none">
                                    <label for="pickup_from_office">
                                        <input type="radio" name="delivery_method" id="pickup_from_office"> 
                                        <span class="ml-1">Pickup from joestore.com.bd Office <b>Tk. 0</b></span>
                                    </label>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                        <div class="bg-white p-2">
                            
                            <div class="card-title px-3 pt-2">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h3 class="heading heading-3 strong-400 mb-0">
                                            <span>{{__('Summary')}}</span>
                                        </h3>
                                    </div>
                        
                                    <div class="col-6 text-right">
                                        <span class="badge badge-md badge-success">{{ count(Session::get('cart')) }} {{__('Items')}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                            
                                <table class="table-cart table-cart-review">
                                    <thead>
                                        <tr>
                                            <th class="product-name">{{__('Product')}}</th>
                                            <th class="product-total text-right">{{__('Total')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $subtotal = 0;
                                            $tax = 0;
                                            $shipping = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $key => $cartItem)
                                            @php
                                            $product = \App\Product::find($cartItem['id']);
                                            $subtotal += $cartItem['price']*$cartItem['quantity'];
                                            $tax += $cartItem['tax']*$cartItem['quantity'];
                                            $shipping += $cartItem['shipping']*$cartItem['quantity'];
                                            $product_name_with_choice = $product->name;
                                            if(isset($cartItem['color'])){
                                                $product_name_with_choice .= ' - '.\App\Color::where('code', $cartItem['color'])->first()->name;
                                            }
                                            foreach (json_decode($product->choice_options) as $choice){
                                                $str = $choice->name; // example $str =  choice_0
                                                $product_name_with_choice .= ' - '.$cartItem[$str];
                                            }
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $product_name_with_choice }}
                                                    <strong class="product-quantity">× {{ $cartItem['quantity'] }}</strong>
                                                </td>
                                                <td class="product-total text-right">
                                                    <span class="pl-4">{{ single_price($cartItem['price']*$cartItem['quantity']) }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>{{__('Subtotal')}}</th>
                                            <td class="text-right">
                                                <span class="strong-600">{{ single_price($subtotal) }}</span>
                                            </td>
                                        </tr>
                        
                                        <tr class="cart-shipping">
                                            <th>{{__('Tax')}}</th>
                                            <td class="text-right">
                                                <span class="text-italic">{{ single_price($tax) }}</span>
                                            </td>
                                        </tr>
                        
                                        <tr class="cart-shipping">
                                            <th>{{__('Shipping Charge')}}</th>
                                            <td class="text-right">
                                                <b>Tk.</b> <span class="text-italic" id="shipping_charge">0</span>
                                            </td>
                                        </tr>
                        
                                        @if (Session::has('coupon_discount'))
                                            <tr class="cart-shipping">
                                                <th>{{__('Coupon Discount')}}</th>
                                                <td class="text-right">
                                                    <span class="text-italic">{{ single_price(Session::get('coupon_discount')) }}</span>
                                                </td>
                                            </tr>
                                        @endif
                        
                                        @php
                                            $total = $subtotal+$tax;
                                            if(Session::has('coupon_discount')){
                                                $total -= Session::get('coupon_discount');
                                            }
                                        @endphp
                        
                                        <tr class="cart-total">
                                            <th><span class="strong-600">{{__('Total')}}</span></th>
                                            <td class="text-right">
                                                <strong> Tk. <span id="total">{{ $total }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
    
                            </div>
                            
                        </div>
    
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    
    <script>
        var country = document.getElementById('country');
        var cityList = document.getElementById('cityList');
        var cityName = document.getElementById('cityName');
        var near_office = document.getElementById('near_office');
        var home_delivery_amount = document.getElementById('home_delivery_amount');
        var home_delivery = document.getElementById('home_delivery');
        var pickup_from_office = document.getElementById('pickup_from_office');
        var shipping_charge = document.getElementById('shipping_charge');
        var total = document.getElementById('total');
        
        checkCountry(country.value);
        
        country.addEventListener('change', function(e) {
            checkCountry(e.target.value);
        });
        
        checkCity(cityList.value);
        
        cityList.addEventListener('change', function(e) {
            checkCity(e.target.value);
            if (home_delivery.checked) {
                hd();
            }
            if (pickup_from_office.checked) {
                pfo();
            }
        });
        
        home_delivery.addEventListener('change', function(e) {
            if (e.target.checked) {
                hd();
            }
        });
        
        pickup_from_office.addEventListener('change', function(e) {
            if (e.target.checked) {
                pfo();
            }
        });
        
        function hd() {
            shipping_charge.textContent = home_delivery_amount.textContent;
            total.textContent = Number('{{ $total }}') + Number(shipping_charge.textContent);
        }
        
        function pfo() {
            shipping_charge.textContent = '0';
            total.textContent = Number('{{ $total }}') + 0;
        }
        
        function checkCity(city) {
            if ('Dhaka' == city) {
                near_office.style.display = '';
                home_delivery_amount.textContent = '60';
            } else {
                home_delivery_amount.textContent = '100';
                near_office.style.display = 'none';
            }
        }
        
        function checkCountry(country) {
            if ('Bangladesh' == country) {
                cityList.name = 'city';
                cityList.setAttribute('required', 'required');
                cityList.style.display = '';
                cityName.removeAttribute('required');
                cityName.removeAttribute('name');
                cityName.style.display = 'none';
            } else {
                cityList.removeAttribute('required');
                cityList.removeAttribute('name');
                cityList.style.display = 'none';
                cityName.name = 'city';
                cityName.setAttribute('required', 'required');
                cityName.style.display = '';
            }
        }
    </script>

@endsection
