<body class="order-details" style="background-color: #FFFFFF">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-2 ">
        <div class="container">
            <div class="back-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
                </svg>
                <a href="<?php echo site_url('order/viewAll'); ?>" class="stretched-link"></a>
            </div>

            <h5 class="page-title mt-2 mx-auto">Order Details
            </h5>


        </div>
    </nav>

    <section class="thankyou-purchase mt-4">
        <div class="container">
            <div class="row text-center mx-2">
                <h5 class="thankyou-title">Thanks for your purchase!</h5>
                <p class="thankyou-description">Hi Cipta, we have received your order and are getting it ready to be shipped to you.
                    <br>We will notify you when it’s on its way!

            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </div>
    </section>

    <section class="status-icon mt-4">
        <div class="container ">
            <div class="row d-flex justify-content-center text-center">
                <hr class="status-icon-hr">
                <div class="col status-title">
                    <div class="status-circle mixing-paint ">
                        <img class="status-icon-img" src="/assets/img/mixing-icon.png" alt="">
                    </div>
                    Mixing the paint
                </div>
                <div class="col status-title">
                    <div class="status-circle">
                        <img class="status-icon-img" src="/assets/img/shipment-icon.png" alt="">
                    </div>Order Shipment
                </div>
                <div class="col status-title">
                    <div class="status-circle">
                        <img class="status-icon-img" src="/assets/img/arrived-icon.png" alt="">
                    </div>Order Arrived
                </div>
            </div>
        </div>
    </section>

    <!-- item list -->
    <section class="item-lists mt-4 mb-5 ">
        <div class="container ">
            <div class="row d-flex justify content center ">
                <div class="col ">
                    <div class="card upper-card p-3 pb-1 ">
                        <div class="row ">
                            <div class="col ">
                                <h6 class="order-id ">Order <?php echo $order->code; ?>
                                </h6>
                            </div>
                            <div class="col-5 ">
                                <h6 class="order-date text-right "><?php echo $order->estimate_delivery; ?>
                                </h6>
                            </div>
                        </div>

                        <?php foreach ($order->cart as $item): ?>
                            <div class="row ">
                                <div class="col-3 ">
                                    <div class="cart-img-container ">
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
                                <div class="col-8 ">
                                    <h6 class="cart-product-title "><?php echo esc($item->product_name); ?> (x<?php echo $item->quantity; ?>)</h6>
                                    <p class="product-category "><?php echo $item->finish; ?> | <?php echo $item->property; ?> | <?php echo $item->size; ?></p>
                                    <div class="row d-flex justify-content-between ">
                                        <div class="col ">
                                            <h6 class="cart-product-price "><?php echo rupiah($item->unit_price); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class=" container mt-3 card-payment ">
            <div class="card p-2 ">
                <div class="row ">
                    <div class="col ">
                        <h6 class="order-id ">Payment method
                        </h6>
                    </div>

                </div>
                <div class="row ">
                    <div class="col-2 icon .icon-visa-container">
                        <img class="icon-visa" src="/assets/img/visa-logo.png" alt="">
                    </div>
                    <div class="col-10 title "><?php echo $card->name_on_card; ?>
                        <p><?php echo censor_card_number($card->card_number); ?></p>
                    </div>
                </div>

                <hr>

                <div class="card p-2 ">
                    <div class="row ">
                        <div class="col ">
                            <h6 class="order-id ">Shipping address
                            </h6>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-2 icon "><svg xmlns="http://www.w3.org/2000/svg " viewBox="0 0 384 512 ">
                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M168.3 499.2C116.1 435 0 279.4 0 192C0 85.96 85.96 0 192 0C298 0 384 85.96 384 192C384 279.4 267 435 215.7 499.2C203.4 514.5 180.6 514.5 168.3 499.2H168.3zM192 256C227.3 256 256 227.3 256 192C256 156.7 227.3
        128 192 128C156.7 128 128 156.7 128 192C128 227.3 156.7 256 192 256z " />
                            </svg></div>
                        <div class="col-10 title ">
                            <?php echo esc($address->place_name); ?>
                            <div class="card-address-description align-self-start "><?php echo esc($address->place_address); ?></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <!-- cart-total -->
        <section class="cart-total mt-5 ">
            <div class="container ">
                <div class="total ">
                    <div class=" row d-flex justify-content-between mt-2 ">
                        <div class=" col-6 total-detail ">Sub-total</div>
                        <div class=" col-4 total-price "><?php echo rupiah($order->subtotal); ?></div>
                    </div>
                    <div class=" row d-flex justify-content-between mt-2 mb-2 ">
                        <div class=" col-6 total-detail ">Shipping Fee</div>
                        <div class=" col-4 total-price "><?php echo rupiah($order->shipping_fee); ?></div>
                    </div>
                    <hr>
                    <div class=" row d-flex justify-content-between ">
                        <div class=" col-6 total ">Total</div>
                        <div class=" col-4 final-price "><?php echo rupiah($order->total); ?></div>
                    </div>
                </div>


            </div>
        </section>
        </div>

    </section>

</body>

