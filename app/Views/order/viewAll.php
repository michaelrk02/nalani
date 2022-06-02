<body class="my-orders" style="background-color: #F6F6F6">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-2 ">
        <div class="container">
            <div class="back-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path
                        d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
                </svg>
                <a href="<?php echo site_url(); ?>" class="stretched-link"></a>
            </div>

            <h5 class="page-title mt-2 mx-auto">My Orders
            </h5>


        </div>
    </nav>

    <!-- item list -->
    <section class="item-lists mt-4 mb-5">
        <div class="container">
            <div class="row d-flex justify content center">
                <?php foreach ($orders as $order): ?>
                    <div class="col-12 mb-3">
                        <div class="card upper-card p-3">
                            <?php foreach ($order->cart as $item): ?>
                                <div class="row mb-3">
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
                                        <h6 class="cart-product-title"><?php echo esc($item->product_name); ?> (x<?php echo $item->quantity; ?>)</h6>
                                        <p class="product-category ">
                                            <span class="d-block">
                                                <?php echo $item->finish; ?> |
                                                <?php echo $item->property; ?> |
                                                <?php echo $item->size; ?>
                                            </span>
                                            <?php if ($item->painter_service_fee > 0): ?><span class="d-block pt-2">With painter service</span><?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="row mt-3">
                                <div class="col-8">
                                    <h5 class="order-status">Order <?php echo $order->code; ?> <span class="in-transit">In Transit</span>
                                    </h5>
                                    <p class="estimate-delivery">Estimate Delivery: <?php echo $order->estimate_delivery; ?></p>
                                </div>
                                <div class="col-4">
                                    <a href="<?php echo site_url('order/view/'.$order->id); ?>" class="btn btn-primary track-btn text-right">
                                        Track
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</body>

