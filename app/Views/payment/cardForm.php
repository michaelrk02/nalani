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
                <a href="/shipping-address.html" class="stretched-link"></a>
            </div>

            <h5 class="page-title mt-2 mx-auto"><?php echo $action == 'add' ? 'Add New' : 'Edit'; ?> Card
            </h5>
        </div>
    </nav>

    <form method="post" action="<?php echo $action == 'add' ? site_url('payment/addCard') : site_url('payment/editCard/'.$card->id); ?>" onsubmit="return confirm('Are you sure?')">

    <section class="add-address-form mt-4">
        <div class="container">
            <div class="">
                <label for="cardname" class="form-label">Name on Card</label>
                <input type="text" class="form-control" name="name_on_card" id="cardname" value="<?php echo esc($card->name_on_card); ?>">
            </div>
            <div class="">
                <label for="cardnumber" class="form-label">Card Number</label>
                <input type="text" class="form-control" name="card_number" id="cardnumber" placeholder="**** **** **** ****" value="<?php echo esc($card->card_number); ?>">
            </div>
            <div class="row">
                <div class="col">
                    <div class="">
                        <label for="expireddate" class="form-label">Expired Date</label>
                        <input type="text" class="form-control" name="expire_date" id="expireddate" placeholder="MM / YY" value="<?php echo esc($card->expire_date); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="password" class="form-control" name="cvv" id="cvv" maxLength="4" value="<?php echo esc($card->cvv); ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="bottom-div">
        <div class=" container mt-5 mb-3 ">
            <div class=" d-grid gap-2 ">
                <button class=" btn btn-primary add-to-cart " type="submit" name="submit" value="1">SAVE &
                    CONTINUE</button>
            </div>
        </div>
    </div>

    </form>

</body>

