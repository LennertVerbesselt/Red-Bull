<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;

//QR Generator Library
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

use App\Models\QR;



class QRController extends Controller
{
    public function index()
    {
        $qrcodes = QR::get();

        $dataUri = $this->generateQRCodesURI();
        

        return view('CMS/qr', ['qrcodes' => $qrcodes, 'dataUri' => $dataUri]);
    }

    public function generateQRCodesURI(){
        $qrcodes = QR::get();

        $dataUriArray = [];

        foreach ($qrcodes as $QR) {

            $dataUriItem = [];
            array_push($dataUriItem, $QR->id);
            array_push($dataUriItem, $QR->code);
            array_push($dataUriItem, $QR->available);

            $writer = new PngWriter();

            // Create QR code
            $qrCode = QrCode::create($QR->code)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(200)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(235, 88, 118))
            ->setBackgroundColor(new Color(18, 20, 38));

            $result = $writer->write($qrCode);

            $dataUri = $result->getDataUri();
            array_push($dataUriItem, $dataUri);
            array_push($dataUriArray, $dataUriItem);
        }
        return $dataUriArray;
    }





}