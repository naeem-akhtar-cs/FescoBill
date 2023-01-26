<?php

function fescoBillShortCode()
{
    ob_start();
    include(__DIR__ . './../../public/partials/FescoBillShortCode.html');
    return ob_get_clean();
}