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

            <h5 class="page-title mt-2 mx-auto"><?php echo $action == 'add' ? 'Add New' : 'Edit'; ?> Address
            </h5>
        </div>
    </nav>

    <form method="post" action="<?php echo $action == 'add' ? site_url('shipping/addAddress') : site_url('shipping/editAddress/'.$address->id); ?>" onsubmit="return confirm('Are you sure?')">

    <section class="add-address-form mt-4">
        <div class="container">
            <div class="">
                <label for="placename" class="form-label">Place Name</label>
                <input type="text" class="form-control" name="place_name" id="placename" value="<?php echo esc($address->place_name); ?>">
            </div>
            <div class="row">
                <div class="col">
                    <div class="">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="firstname" value="<?php echo esc($address->first_name); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="lastname" value="<?php echo esc($address->last_name); ?>">
                    </div>
                </div>
            </div>
            <div class="">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" value="<?php echo esc($address->address); ?>">
            </div>
            <div class="row">
                <div class="col">
                    <div class="">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" name="city" id="city" value="<?php echo esc($address->city); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control" name="province" id="province" value="<?php echo esc($address->province); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="">
                        <label for="postalcode" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" name="postal_code" id="postalcode" value="<?php echo esc($address->postal_code); ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" name="country" id="country" value="<?php echo esc($address->country); ?>">
                    </div>
                </div>
            </div>
            <div class="">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" id="phonenumber" value="<?php echo esc($address->phone_number); ?>">
            </div>
            <div class="">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo esc($address->email); ?>">
            </div>
        </div>
    </section>

    <div class=" container mt-5 mb-3 ">
        <div class=" d-grid gap-2 ">
            <button class=" btn btn-primary add-to-cart " type="submit" name="submit" value="1">SAVE &
                CONTINUE</button>
        </div>
    </div>

    </form>

</body>

