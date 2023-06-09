<?php


namespace App\Helpers;


use App\Models\UserManagement\RiwayatPenggunaanCaptchaModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class CFHelper
{
    public static function calculateCF($CF1, $CF2)
    {
        // $CF1 = number_format($CF1, 4);
        // $CF2 = number_format($CF2, 4);
        // dd($CF1, $CF2);
        // echo ($CF1 . ' +  (' . $CF2 . ' * (1 - ' . $CF1 . ')) = ' . $CF1 + ($CF2 * (1 - $CF1)) . "<br />");
        return (float) $CF1 + ($CF2 * (1 - $CF1));
        // echo ($CF1 . ' +  (' . $CF2 . ' * (1 - ' . $CF1 . ')) = ' . $CF1 + ($CF2 * (1 - $CF1)) . "<br />");
        // return $CF1 + ($CF2 * (1 - $CF1));

        // echo ($CF1 . ' +  (' . $CF2 . ' * (1 - ' . $CF1 . ')) = ' . number_format($CF1 + ($CF2 * (1 - $CF1)), 4) . "<br />");
        // return (float) number_format($CF1 + ($CF2 * (1 - $CF1)), 4);

        // echo ($CF1 . ' +  (' . $CF2 . ' * (1 - ' . $CF1 . ')) = ' . number_format($CF1 + ($CF2 * number_format((1 - $CF1), 4)), 4) . "<br />");
        // return (float) number_format($CF1 + ($CF2 * number_format((1 - $CF1), 4)), 4);

        //mODIFIKASI
        // echo ('(' . $CF1 . ' +  ' . $CF2 . ') * (1 - ' . $CF1 . ') = ' . number_format($CF1 + ($CF2 * (1 - $CF1)), 4) . "<br />");
        // return (float) number_format(($CF1 + $CF2) * (1 - $CF1), 4);
    }
}
