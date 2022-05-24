<body style="background-color: #F6F6F6">

    <section class="card-payment-success">
        <div class="container">
            <div class="card p-2 mt-3">
                <div class="row text-center">
                    <img class="text-center" src="/assets/img/payment-success.png" alt="">
                    <h5 class="text">
                        Hey, <span class="payment-user"><?php echo esc($member->first_name); ?></span> <br> Thanks for your purchase
                    </h5>
                </div>
                <div class=" row d-flex justify-content-between mt-3">
                    <div class=" col-6 total-detail ">Sub-total</div>
                    <div class=" col-4 total-price "><?php echo rupiah($order->subtotal); ?></div>
                </div>
                <div class=" row d-flex justify-content-between mt-2">
                    <div class=" col-6 total-detail ">Shipping Fee</div>
                    <div class=" col-4 total-price "><?php echo rupiah($order->shipping_fee); ?></div>
                </div>
                <hr>
                <div class=" row d-flex justify-content-between ">
                    <div class=" col-6 total ">Total</div>
                    <div class=" col-4 final-price "><?php echo rupiah($order->total); ?></div>
                </div>

                <div class=" container mt-3 text-center ">
                    <div class=" d-grid gap-2 ">
                        <a class=" btn btn-primary track-order " href="<?php echo site_url('order/viewAll'); ?>" type=" button ">TRACK
                            ORDER</a>
                    </div>
                    <p class="order-id mt-3">Order <?php echo $order->code; ?></p>
                </div>
            </div>
        </div>
    </section>


    <div class="bottom-div mt-5 ">

        <div class=" container mt-5 ">
            <div class=" d-grid gap-2 ">
                <a class=" btn btn-primary add-to-cart " href="<?php echo site_url(); ?>" type=" button ">BACK TO HOME</a>
            </div>
        </div>
    </div>
</body>

