<?php

function rupiah($number) {
    return 'Rp. '.number_format($number, 0, ',', '.');
}

function censor_card_number($number) {
    return '**** **** **** '.substr($number, -4);
}
