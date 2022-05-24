<body style="background-color: #F6F6F6">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-2 ">
        <div class="container">
            <div class="back-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
                </svg>
                <a href="/" class="stretched-link"></a>
            </div>

            <h5 class="page-title mt-2">My Cart
                <span class="my-cart-sub">(1)</span>
            </h5>

            <div class="ml-auto mrt mt-2">
                <h6 class="clear">Clear</h6>
            </div>

        </div>
    </nav>

    <!-- item list -->
    <section class="item-lists mt-4 mb-5">
        <div class="container">
            <div class="row d-flex justify content center">
                <?php foreach ($items as $item): ?>
                    <div class="col-12 mb-3">
                        <div class="card upper-card p-3">
                            <div class="row">
                                <div class="col-4">
                                    <div class="cart-img-container">
                                        <svg width="360" height="362" viewBox="0 0 360 362" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <rect x="-60" width="360" height="362" fill="url(#pattern0)" />
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                                    height="1">
                                                    <use xlink:href="#image0_0_254"
                                                        transform="translate(-0.00183285) scale(0.000602079)" />
                                                </pattern>
                                                <image id="image0_0_254" width="1667" height="1250"
                                                    xlink:href="<?php echo base_url('assets/img/titanium-white.png'); ?>" />
                                            </defs>
                                        </svg>

                                    </div>
                                </div>
                                <div class="col-8">
                                    <h6 class="cart-product-title"><?php echo esc($item->product_name); ?></h6>
                                    <p><?php echo $item->finish ?> | <?php echo $item->property; ?> | <?php echo $item->size; ?></p>
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-7">
                                            <h6 class="cart-product-price"><?php echo rupiah($item->unit_price); ?></h6>
                                        </div>
                                        <div class="col-5 add-product d-flex">
                                            <a href="<?php echo site_url('cart/change/'.$item->product).'?amount=-1'; ?>">
                                                <div class="minus-button text-center ">
                                                    <svg class="align-text-top" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z" />
                                                    </svg>
                                                </div>

                                            </a> <?php echo $item->quantity; ?>
                                            <a href="<?php echo site_url('cart/change/'.$item->product).'?amount=1'; ?>">
                                                <div class="plus-button text-center ">
                                                    <svg class="align-text-top" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 448 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
                                                    </svg>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" card p-0 bottom-card ">
                            <div class="row d-flex justify-content-between g-0 ">
                                <div class="col-1 ">
                                    <li class="list-group-item ">
                                        <a href="<?php echo site_url('cart/change/'.$item->product).'?painter_service='.(!($item->painter_service_fee > 0) ? 1 : 0); ?>">
                                            <div class="form-check form-switch ">
                                                <input class="form-check-input " type="checkbox" disabled id="<?php echo 'painter-'.$item->product; ?>" value="" <?php echo $item->painter_service_fee > 0 ? 'checked' : ''; ?>>
                                                <label class="form-check-label " for="<?php echo 'painter-'.$item->product; ?>"></label>
                                            </div>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-6 ">
                                    <p class="list-group-item cart-painter-service ">I need a painter service</p>
                                </div>
                                <div class="col-5 ">
                                    <li class="list-group-item cart-painter-service-price ">+Rp. 20.000</li>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <div class="bottom-div mt-5 ">
        <!-- cart-total -->
        <section class="cart-total mt-5 ">
            <div class="container ">
                <div class="card optional-card p-2 mb-3">
                    <div class="row ">
                        <div class="col-10 ">
                            <h6 class="add-voucher ">Add a voucher <span class="cart-optional ">(Optional)</span>
                            </h6>
                        </div>
                        <div class=" col-1 arrow-down ">
                            <svg xmlns="http://www.w3.org/2000/svg " viewBox="0 0 384 512 ">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path
                                    d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z " />
                            </svg>
                        </div>
                    </div>
                </div>
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
                <a class=" btn btn-primary add-to-cart " href="<?php echo site_url('cart/checkout'); ?>" type=" button ">CHECKOUT</a>
            </div>
        </div>
    </div>
</body>

