<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mt-2 ">
        <div class="container">
            <ul>
                <li class="left">

                    <div class="back-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z" />
                        </svg>
                        <a href="/" class="stretched-link"></a>
                    </div>

                </li>

                <li class="right">
                    <div class="headercart-icon" href="#">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.9421 24.2424C11.9421 25.2132 11.1546 26.0001 10.1833 26.0001C9.21234 26.0001 8.4248 25.2132 8.4248 24.2424C8.4248 23.2715 9.21234 22.4846 10.1833 22.4846C11.1546 22.4846 11.9421 23.2715 11.9421 24.2424Z"
                                fill="black" />
                            <path
                                d="M23.2758 24.2424C23.2758 25.2132 22.4886 26.0001 21.5173 26.0001C20.546 26.0001 19.7588 25.2132 19.7588 24.2424C19.7588 23.2715 20.546 22.4846 21.5173 22.4846C22.4886 22.4846 23.2758 23.2715 23.2758 24.2424Z"
                                fill="black" />
                            <path
                                d="M2.56285 4.1251H3.61808C3.96973 4.1251 4.24342 4.35943 4.36067 4.67196L8.19043 16.1563C8.81577 18.0702 10.6133 19.3593 12.6455 19.3593H19.0936C21.0866 19.3593 22.8843 18.1092 23.5097 16.1953L25.8546 9.43758C26.3235 8.10953 25.6202 6.66401 24.2916 6.23432C24.0569 6.11715 23.7834 6.07819 23.4708 6.07819H8.11234L7.33081 3.65639C6.78371 2.09375 5.29858 1 3.61829 1H2.56306C1.7033 1 1 1.70298 1 2.56236C1 3.42173 1.7033 4.125 2.56306 4.125L2.56285 4.1251ZM22.6499 9.20301L20.5787 15.1796C20.3443 15.8046 19.7582 16.2343 19.0936 16.2343H12.6455C11.9812 16.2343 11.3948 15.8046 11.1604 15.1796L9.16743 9.20301H22.6499Z"
                                fill="black" />
                        </svg>
                        <a href="/#" class="stretched-link"></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- main banner -->
    <section class="product-banner">
        <svg class="main-product" width="360" height="360" viewBox="0 0 360 362" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <rect x="-60" width="482" height="482" fill="url(#pattern0)" />
            <defs>
                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_0_254" transform="translate(-0.00183285) scale(0.000602079)" />
                </pattern>
                <image id="image0_0_254" width="1667" height="1250"
                    xlink:href="<?php echo base_url('assets/img/titanium-white-banner.png'); ?>" />
            </defs>
        </svg>

        <img class="elipse-bg" src="<?php echo base_url('./assets/img/elipse-bg.png'); ?>" alt="">
    </section>

    <section class="description">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-8">
                    <div class="rating">
                        <p>
                            <span><i class="fa fa-solid fa-star"></i>
                            </span>
                            <span class="rating-number"><?php echo $product->review_score; ?></span>
                            <span class="rating-count">(<?php echo $product->review_count; ?>)</span>
                            <span class="rating-review">reviews</span>

                        </p>
                    </div>
                </div>
                <div class="col-4">
                    <span class="product-code"><?php echo $product->code; ?></span>
                </div>
            </div>

            <div class="row">
                <h4 class="product-title"><?php echo esc($product->name); ?></h4>
                <p class="product-description"><?php echo esc($product->description); ?></p>
                <h5 class="product-price"><?php echo rupiah($product->price); ?></h5>
            </div>
        </div>
    </section>

    <form method="post" action="<?php echo site_url('cart/add/'.$product->id); ?>">

    <section class=" variations mt-4">
        <div class=" container ">

            <div class=" row d-flex justify-content-center ">
                <h5 class=" variations-title ">Finish</h5>
            </div>
            <div class=" row d-flex justify-content-center button-container ">
                <div class=" btn-group " role=" group " aria-label=" Basic example " id="btn-group-1">
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="finish" value="Eggshell" id="opt-finish-eggshell" checked>
                            <label class="btn btn-secondary rounded" for="opt-finish-eggshell">Eggshell</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="finish" value="Matt" id="opt-finish-matt">
                            <label class="btn btn-secondary rounded" for="opt-finish-matt">Matt</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 25.000</div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="finish" value="Glossy" id="opt-finish-glossy">
                            <label class="btn btn-secondary rounded" for="opt-finish-glossy">Glossy</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 50.000</div>
                    </div>
                </div>
            </div>

            <div class=" row d-flex justify-content-center mt-4 ">
                <h5 class=" variations-title ">Property</h5>
            </div>
            <div class=" row d-flex justify-content-center button-container ">
                <div class=" btn-group " role=" group " aria-label=" Basic example " id="btn-group-2">
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="property" value="Standard" id="opt-property-standard" checked>
                            <label class="btn btn-secondary rounded" for="opt-property-standard">Standard</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="property" value="Waterproof" id="opt-property-waterproof">
                            <label class="btn btn-secondary rounded" for="opt-property-waterproof">Waterproof</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 25.000</div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="property" value="Easy-clear" id="opt-property-easyclear">
                            <label class="btn btn-secondary rounded" for="opt-property-easyclear">Easy-clear</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 50.000</div>
                    </div>
                </div>
            </div>

            <div class=" row d-flex justify-content-center mt-4 ">
                <h5 class=" variations-title ">Size</h5>
            </div>
            <div class=" row d-flex justify-content-center button-container ">
                <div class=" btn-group " role=" group " aria-label=" Basic example " id="btn-group-3">
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="size" value="2.5 litre" id="opt-size-2p5l" checked>
                            <label class="btn btn-secondary rounded" for="opt-size-2p5l">2.5 litre</label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="size" value="5 litre" id="opt-size-5l">
                            <label class="btn btn-secondary rounded" for="opt-size-5l">5 litre</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 100.000</div>
                    </div>
                    <div>
                        <div>
                            <input class="btn-check" type="radio" name="size" value="10 litre" id="opt-size-10l">
                            <label class="btn btn-secondary rounded" for="opt-size-10l">10 litre</label>
                        </div>
                        <div class="text-center text-muted" style="font-size: 0.75rem">+Rp. 200.000</div>
                    </div>
                </div>
            </div>

        </div>


    </section>

    <div class=" container mt-5 ">
        <div class=" d-grid gap-2 ">
            <button type="submit" class=" btn btn-primary add-to-cart " name="submit" value="1">ADD TO CART</button>
        </div>
    </div>

    </form>

</body>

