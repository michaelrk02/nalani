<body class="shipping-address-added" style="background-color: #F6F6F6">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-2 ">
        <div class="container">
            <div class="back-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
                </svg>
                <a href="/shipping-address.html" class="stretched-link"></a>
            </div>

            <h5 class="page-title mt-2 mx-auto">Shipping Address</h5>

        </div>
    </nav>

    <section class="delivery-option mt-4">
        <div class="container">
            <div class=" row d-flex justify-content-center button-container ">
                <div class=" btn-group " role=" group " aria-label=" Basic example " id="btn-group-3">
                    <button type=" button " class=" btn btn-secondary  d-flex rounded  ">
                        <div class="radio-button btn-shipping"></div>
                        <div class="card-label">
                            Home Delivery
                        </div>
                    </button>
                    <button type=" button " class=" btn btn-secondary  d-flex rounded ">
                        <div class="radio-button btn-shipping"></div>
                        <div class="card-label">
                            Pick Up Point
                        </div>
                    </button>

                </div>
            </div>
        </div>

        <?php foreach ($shippingAddresses as $address): ?>
            <div class=" container mt-3 card-address ">
                <div class="card p-2">
                    <div class="row">
                        <div class="col-2 icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3 128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z" />
                            </svg></div>
                        <div class="col title"><?php echo esc($address->place_name); ?></div>
                        <div class="col-auto card-address-radio-button">
                                <a class="d-block" style="font-size: inherit" href="<?php echo site_url('shipping/choose/'.$address->id); ?>">
                                    <div class="form-check">
                                        <input class="form-check-input" disabled type="radio" name="address" id="address-<?php echo $address->id; ?>" <?php echo $member->default_shipping_address == $address->id ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="address-<?php echo $address->id; ?>">
                                        </label>
                                    </div>
                                </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col card-address-description align-self-start">
                            <div><?php echo esc($address->first_name); ?> <?php echo esc($address->last_name); ?> | <?php echo esc($address->phone_number); ?></div>
                            <div><?php echo esc($address->address); ?></div>
                            <div><?php echo esc($address->city); ?>, <?php echo esc($address->province); ?> <?php echo esc($address->postal_code); ?>, <?php echo esc($address->country); ?></div>
                        </div>
                        <div class="col-auto align-self-end text-end">
                            <div><a class="" href="<?php echo site_url('shipping/editAddress/'.$address->id); ?>">Edit</a></div>
                            <div><a class="" onclick="return confirm('Are you sure?')" href="<?php echo site_url('shipping/deleteAddress/'.$address->id); ?>">Delete</a></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class=" container mt-3 ">
            <div class=" d-grid gap-2 ">
                <a class=" btn btn-primary add-new-address" href="<?php echo site_url('shipping/addAddress'); ?>" type=" button "><span
                        class="plus-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                        </svg></span>Add
                    New Address</a>
            </div>
        </div>
    </section>


    <div class="bottom-div mt-5 ">
        <!-- cart-total -->
        <section class="cart-total mt-5 ">
            <div class="container ">
                <div class="total">
                    <div class=" row d-flex justify-content-between mt-2 ">
                        <div class=" col-6 total-detail ">Sub-total</div>
                        <div class=" col-4 total-price "><?php echo rupiah($subtotal); ?></div>
                    </div>
                    <div class=" row d-flex justify-content-between mt-2">
                        <div class=" col-6 total-detail ">Shipping Fee</div>
                        <div class=" col-4 total-price "><?php echo rupiah($shippingFee); ?></div>
                    </div>
                    <hr>
                    <div class=" row d-flex justify-content-between ">
                        <div class=" col-6 total ">Total</div>
                        <div class=" col-4 final-price "><?php echo rupiah($subtotal + $shippingFee); ?></div>
                    </div>
                </div>


            </div>
        </section>

        <div class=" container mt-5 ">
            <div class=" d-grid gap-2 ">
                <a class=" btn btn-primary add-to-cart " href="<?php echo site_url('payment/options'); ?>">CONTINUE</a>
            </div>
        </div>
    </div>


</body>

