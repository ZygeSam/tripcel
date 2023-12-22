<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function generateCode($data, $size = 200, $margin = 10) {
        return QrCode::format('png')
            ->size(200)
            ->margin(10)
            ->errorCorrection('H')
            ->generate($data);
    }
}
