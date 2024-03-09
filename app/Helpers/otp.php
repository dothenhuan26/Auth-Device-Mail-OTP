<?php

use Ichtrojan\Otp\Otp;

function generateOtp($email)
{
    $otp = (new Otp)->generate($email, 'numeric', 6, 10);
    return $otp->token;
}

function validateOtp($email, $token)
{
    $otp = (new Otp)->validate($email, $token);
    return $otp->status;
}
