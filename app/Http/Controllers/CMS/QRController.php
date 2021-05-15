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

        $dataUri = $this->generateQRCodesURI();
        

        return view('CMS/qr', ['dataUri' => $dataUri]);
    }

    public function generateQRCodesURI(){
        $qrcodes = QR::orderBy('id', 'asc')->get();

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

    public function addQRCodesPage(){
        return view('CMS/addqrcode');
    }

    public function addQRCodes(Request $request){

        $amountOfQRCodes = (int)$request->amount;

        for($u = 0; $u <= $amountOfQRCodes; $u++){

            //Generate new value
            $QRValue = $this->generateQRValue();
            
            //Check if duplicate
            if($this->QRDuplicateCheck($QRValue)){
                $u--;
            } else {
                $qrcode = new QR;
                $qrcode->code = $QRValue;
                $qrcode->available = True;
                $qrcode->save();
            }
        }



        $dataUri = $this->generateQRCodesURI();
        return view('CMS/qr', ['dataUri' => $dataUri]);
    }
    
    function generateQRValue(){
        //How long is the generated value of the QR Code
        $QRCodeValueLength = 40;

        //Characters in the generated value
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $newQRValue = '';
        for($i = 0; $i < $QRCodeValueLength; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $newQRValue .= $character;
        }

        return $newQRValue;
    }

    function QRDuplicateCheck($newQRValue){
        $qrcodes = QR::get();

        foreach($qrcodes as $qrcode){
            if ($qrcode->code == $newQRValue){
                return True;
            }
        }
        return False;
    }





}