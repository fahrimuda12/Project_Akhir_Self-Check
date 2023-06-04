<?php


namespace App\Helpers;


use App\Models\UserManagement\RiwayatPenggunaanCaptchaModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class CFHelper
{
    public static function calculateCF($CF1, $CF2)
    {
        return (float) number_format(($CF1 + $CF2) * (1 - $CF1), 4);
    }
}
