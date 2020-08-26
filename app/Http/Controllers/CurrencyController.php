<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyTransactions;

class CurrencyController extends Controller
{
  public function getExchangeRates() {

    /*
    Курс на текущую дату берется с сайта НБУ в формате JSON,
    дата задается в формате yyymmdd без разделителей,
    т.е., например, "20200507"
    */
    $today = date("yymd");
    $url = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?date=".$today."&json";

    $opts = [
      'http' => [
          'method' => "GET",
      ]
    ];

    $context = stream_context_create($opts);

    $data = file_get_contents($url, false, $context);

    return response()->json(
      [
          'response' => [
              'rates' => $data
          ]
      ], 200);
  }

  public function getSignature() {
    $string = request()->string;
    $key = "77bd75340cb1347e89f326a3852becf867931834";
    $hash = hash_hmac("md5",$string,$key);
    return response()->json(
      [
              'hash' => $hash
      ], 200);
  }

    public function getTransactionId(){
      $today = date("yymd");
      $userID = request()->userID;
      $transaction = new CurrencyTransactions();
      $transactionId = $transaction->where('userID','=',$userID)->orderBy('id', 'desc')->value('id');
      return response()->json(
        [
                'transactionId' => $transactionId,
                'today' => $today
        ], 200);
    }

    public function getPaymentStatus() {
      $transaction = new CurrencyTransactions();
      $userID = request()->userID;
      $orderReference = $transaction->where('userID','=',$userID)->orderBy('id', 'desc')->value('id');
      $merchantAccount = "freelance_user_5f423b7780c06";
      $string = $merchantAccount.";".$orderReference;

      $key = "77bd75340cb1347e89f326a3852becf867931834";
      $hash = hash_hmac("md5",$string,$key);
              $data1 = [
                'transactionType' => 'CHECK_STATUS',
                'merchantAccount' => $merchantAccount,
                'orderReference' => "$orderReference",
                'merchantSignature' => $hash,
                'apiVersion' => '1',
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.wayforpay.com/api",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data1),
            CURLOPT_HTTPHEADER => array(
            	// Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ));

        $response = curl_exec($curl);
      //  $err = curl_error($curl);

        curl_close($curl);

      return response()->json(
        [
            'response' => $response
        ], 200);
    }

    public function setTransaction(){
      $transaction = new CurrencyTransactions();
      $transaction->userID = request()->userID;
      $transaction->date = date("Y-m-d H:i:s");
      $transaction->type = 0;
      $transaction->currency = request()->currency;
      $transaction->amount = request()->amount;

      $transaction->save();
    }
}
