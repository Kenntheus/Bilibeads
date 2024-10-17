@extends('layouts.app')
@section('content')
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <div class="checkout-steps">
                <a href="{{ route('cart.index') }}" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="javascript:void(0)" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="javascript:void(0)" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <form name="checkout-form" action="{{ route('cart.place.an.order') }}" method="POST">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="row">
                            <div class="col-6">
                                <h4>SHIPPING DETAILS</h4>
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="name" required=""
                                        value="">
                                    <label for="name">Full Name *</label>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="phone" required=""
                                        value="">
                                    <label for="phone">Phone Number *</label>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="address" required=""
                                        value="">
                                    <label for="address">House no, Building Name *</label>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mt-3 mb-3">
                                    <select class="form-control p-2" id="state" name="state" required="" value="">
                                        <option value="" disabled selected>Select your province</option>
                                        <!-- List of Provinces -->
                                        <option value="Abra">Abra</option>
                                        <option value="Agusan del Norte">Agusan del Norte</option>
                                        <option value="Agusan del Sur">Agusan del Sur</option>
                                        <option value="Aklan">Aklan</option>
                                        <option value="Albay">Albay</option>
                                        <option value="Antique">Antique</option>
                                        <option value="Apayao">Apayao</option>
                                        <option value="Aurora">Aurora</option>
                                        <option value="Basilan">Basilan</option>
                                        <option value="Bataan">Bataan</option>
                                        <option value="Batanes">Batanes</option>
                                        <option value="Batangas">Batangas</option>
                                        <option value="Benguet">Benguet</option>
                                        <option value="Biliran">Biliran</option>
                                        <option value="Bohol">Bohol</option>
                                        <option value="Bukidnon">Bukidnon</option>
                                        <option value="Bulacan">Bulacan</option>
                                        <option value="Cagayan">Cagayan</option>
                                        <option value="Camarines Norte">Camarines Norte</option>
                                        <option value="Camarines Sur">Camarines Sur</option>
                                        <option value="Camiguin">Camiguin</option>
                                        <option value="Capiz">Capiz</option>
                                        <option value="Catanduanes">Catanduanes</option>
                                        <option value="Cavite">Cavite</option>
                                        <option value="Cebu">Cebu</option>
                                        <option value="Compostela Valley">Compostela Valley</option>
                                        <option value="Cotabato">Cotabato</option>
                                        <option value="Davao del Norte">Davao del Norte</option>
                                        <option value="Davao del Sur">Davao del Sur</option>
                                        <option value="Davao Occidental">Davao Occidental</option>
                                        <option value="Davao Oriental">Davao Oriental</option>
                                        <option value="Dinagat Islands">Dinagat Islands</option>
                                        <option value="Eastern Samar">Eastern Samar</option>
                                        <option value="Guimaras">Guimaras</option>
                                        <option value="Ifugao">Ifugao</option>
                                        <option value="Ilocos Norte">Ilocos Norte</option>
                                        <option value="Ilocos Sur">Ilocos Sur</option>
                                        <option value="Iloilo">Iloilo</option>
                                        <option value="Isabela">Isabela</option>
                                        <option value="Kalinga">Kalinga</option>
                                        <option value="La Union">La Union</option>
                                        <option value="Laguna">Laguna</option>
                                        <option value="Lanao del Norte">Lanao del Norte</option>
                                        <option value="Lanao del Sur">Lanao del Sur</option>
                                        <option value="Leyte">Leyte</option>
                                        <option value="Maguindanao">Maguindanao</option>
                                        <option value="Marinduque">Marinduque</option>
                                        <option value="Masbate">Masbate</option>
                                        <option value="Metro Manila">Metro Manila</option>
                                        <option value="Misamis Occidental">Misamis Occidental</option>
                                        <option value="Misamis Oriental">Misamis Oriental</option>
                                        <option value="Mountain Province">Mountain Province</option>
                                        <option value="Negros Occidental">Negros Occidental</option>
                                        <option value="Negros Oriental">Negros Oriental</option>
                                        <option value="Northern Samar">Northern Samar</option>
                                        <option value="Nueva Ecija">Nueva Ecija</option>
                                        <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                        <option value="Occidental Mindoro">Occidental Mindoro</option>
                                        <option value="Oriental Mindoro">Oriental Mindoro</option>
                                        <option value="Palawan">Palawan</option>
                                        <option value="Pampanga">Pampanga</option>
                                        <option value="Pangasinan">Pangasinan</option>
                                        <option value="Quezon">Quezon</option>
                                        <option value="Quirino">Quirino</option>
                                        <option value="Rizal">Rizal</option>
                                        <option value="Romblon">Romblon</option>
                                        <option value="Samar">Samar</option>
                                        <option value="Sarangani">Sarangani</option>
                                        <option value="Siquijor">Siquijor</option>
                                        <option value="Sorsogon">Sorsogon</option>
                                        <option value="South Cotabato">South Cotabato</option>
                                        <option value="Southern Leyte">Southern Leyte</option>
                                        <option value="Sultan Kudarat">Sultan Kudarat</option>
                                        <option value="Sulu">Sulu</option>
                                        <option value="Surigao del Norte">Surigao del Norte</option>
                                        <option value="Surigao del Sur">Surigao del Sur</option>
                                        <option value="Tarlac">Tarlac</option>
                                        <option value="Tawi-Tawi">Tawi-Tawi</option>
                                        <option value="Zambales">Zambales</option>
                                        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                                        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                                        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                                    </select>
                                    <label for="province">Province *</label>
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-floating my-3">
                                    <select class="form-control p-2" id="city" name="city" required>
                                        <option value="" disabled selected>Select your city</option>
                                    </select>
                                    <label for="city">Town / City *</label>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" name="zip" required=""
                                        value="">
                                    <label for="zip">Zip Code *</label>
                                    @error('zip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th align="right">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::instance('cart') as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->name }} x {{ $item->qty }}
                                                </td>
                                                <td align="right">
                                                    {{ $item->subtotal() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td align="right">₱{{ Cart::instance('cart')->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping Fee</th>
                                            <td align="right">₱{{ Cart::instance('cart')->tax() }}</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td align="right">₱{{ Cart::instance('cart')->total() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__payment-methods">
                                <!-- <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode1" value="card">
                                            <label class="form-check-label" for="mode1">
                                                Debit or Credit Card
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input form-check-input_fill" type="radio" name="mode" id="mode2" value="paypal">
                                            <label class="form-check-label" for="mode2">
                                                Paypal
                                            </label>
                                        </div> -->
                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" type="radio" name="mode"
                                        id="mode3" value="cod">
                                    <label class="form-check-label" for="mode3">
                                        Cash on delivery
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-checkout">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
    <script>
        const citiesByProvince = {
            "Abra": ["Bangued"],
            "Agusan del Norte": ["Butuan", "Cabadbaran"],
            "Agusan del Sur": ["Bayugan"],
            "Aklan": ["Kalibo"],
            "Albay": ["Legazpi", "Ligao", "Tabaco"],
            "Antique": ["San Jose de Buenavista"],
            "Apayao": ["Kabugao"],
            "Aurora": ["Baler"],
            "Basilan": ["Isabela City"],
            "Bataan": ["Balanga"],
            "Batanes": ["Basco"],
            "Batangas": ["Batangas City", "Lipa", "Tanauan"],
            "Benguet": ["Baguio"],
            "Biliran": ["Naval"],
            "Bohol": ["Tagbilaran"],
            "Bukidnon": ["Malaybalay", "Valencia"],
            "Bulacan": ["Malolos", "Meycauayan", "San Jose del Monte"],
            "Cagayan": ["Tuguegarao"],
            "Camarines Norte": ["Daet"],
            "Camarines Sur": ["Naga", "Iriga"],
            "Camiguin": ["Mambajao"],
            "Capiz": ["Roxas City"],
            "Catanduanes": ["Virac"],
            "Cavite": ["Bacoor", "Cavite City", "Dasmariñas", "Imus", "Tagaytay", "Trece Martires"],
            "Cebu": ["Cebu City", "Mandaue", "Lapu-Lapu City", "Carcar", "Danao", "Talisay", "Naga"],
            "Compostela Valley": ["Monkayo"],
            "Cotabato": ["Kidapawan"],
            "Davao del Norte": ["Panabo", "Samal"],
            "Davao del Sur": ["Davao City", "Digos", "Santa Cruz"],
            "Davao Occidental": ["Malita"],
            "Davao Oriental": ["Mati"],
            "Dinagat Islands": ["San Jose"],
            "Eastern Samar": ["Borongan"],
            "Guimaras": ["Jordan"],
            "Ifugao": ["Lagawe"],
            "Ilocos Norte": ["Laoag"],
            "Ilocos Sur": ["Vigan", "Candon"],
            "Iloilo": ["Iloilo City", "Passi"],
            "Isabela": ["Cauayan", "Ilagan", "Santiago"],
            "Kalinga": ["Tabuk"],
            "La Union": ["San Fernando"],
            "Laguna": ["San Pablo", "Calamba", "Los Baños", "Santa Rosa", "Biñan"],
            "Lanao del Norte": ["Iligan"],
            "Lanao del Sur": ["Marawi"],
            "Leyte": ["Tacloban", "Ormoc"],
            "Maguindanao": ["Buluan"],
            "Marinduque": ["Boac"],
            "Masbate": ["Masbate City"],
            "Metro Manila": ["Manila", "Makati", "Quezon City", "Taguig", "Pasig", "Muntinlupa", "Parañaque",
                "Las Piñas", "Caloocan", "Malabon", "Navotas", "Valenzuela", "San Juan", "Pasay", "Mandaluyong",
                "Marikina"
            ],
            "Misamis Occidental": ["Oroquieta", "Ozamiz", "Tangub"],
            "Misamis Oriental": ["Cagayan de Oro", "Gingoog"],
            "Mountain Province": ["Bontoc"],
            "Negros Occidental": ["Bacolod", "Bago", "La Carlota", "San Carlos", "Sagay", "Sipalay", "Talisay",
                "Victorias"
            ],
            "Negros Oriental": ["Dumaguete", "Bais", "Tanjay"],
            "Northern Samar": ["Catarman"],
            "Nueva Ecija": ["Cabanatuan", "Gapan", "San Jose", "Palayan"],
            "Nueva Vizcaya": ["Bayombong"],
            "Occidental Mindoro": ["Mamburao"],
            "Oriental Mindoro": ["Calapan"],
            "Palawan": ["Puerto Princesa"],
            "Pampanga": ["Angeles", "San Fernando", "Mabalacat"],
            "Pangasinan": ["Agno",
                "Aguilar",
                "Alaminos City",
                "Alcala",
                "Anda",
                "Asingan",
                "Balungao",
                "Bani",
                "Basista",
                "Bautista",
                "Bayambang",
                "Binalonan",
                "Binmaley",
                "Bolinao",
                "Bugallon",
                "Burgos",
                "Calasiao",
                "Dagupan City",
                "Dasol",
                "Infanta",
                "Labrador",
                "Laoac",
                "Lingayen",
                "Mabini",
                "Malasiqui",
                "Manaoag",
                "Mangaldan",
                "Mangatarem",
                "Mapandan",
                "Natividad",
                "Pozorrubio",
                "Rosales",
                "San Carlos City",
                "San Fabian",
                "San Jacinto",
                "San Manuel",
                "San Nicolas",
                "San Quintin",
                "Santa Barbara",
                "Santa Maria",
                "Santo Tomas",
                "Sison",
                "Sual",
                "Tayug",
                "Umingan",
                "Urbiztondo",
                "Urdaneta City",
                "Villasis"
            ],
            "Quezon": ["Lucena", "Tayabas"],
            "Quirino": ["Cabarroguis"],
            "Rizal": ["Antipolo"],
            "Romblon": ["Romblon"],
            "Samar": ["Catbalogan", "Calbayog"],
            "Sarangani": ["Alabel"],
            "Siquijor": ["Siquijor"],
            "Sorsogon": ["Sorsogon City"],
            "South Cotabato": ["Koronadal", "General Santos"],
            "Southern Leyte": ["Maasin"],
            "Sultan Kudarat": ["Tacurong"],
            "Sulu": ["Jolo"],
            "Surigao del Norte": ["Surigao City"],
            "Surigao del Sur": ["Bislig", "Tandag"],
            "Tarlac": ["Tarlac City"],
            "Tawi-Tawi": ["Bongao"],
            "Zambales": ["Olongapo"],
            "Zamboanga del Norte": ["Dipolog", "Dapitan"],
            "Zamboanga del Sur": ["Pagadian", "Zamboanga City"],
            "Zamboanga Sibugay": ["Ipil"]
        };

        document.getElementById('state').addEventListener('change', function() {
            const state = this.value;
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = '';

            let defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            defaultOption.textContent = 'Select your city';
            citySelect.appendChild(defaultOption);

            if (citiesByProvince[state]) {
                citiesByProvince[state].forEach(city => {
                    let option = document.createElement('option');
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            }
        });
    </script>
@endsection
