<?php
require_once("/src/Bluemove/SepaDirectDebits/Sepa.php");
$config = array("name" => "Test",
                "IBAN" => "NL41BANK1234567890",
                //"BIC" => "BANKNL2A", <- Optional, banks may disallow BIC in future
                "batch" => True,
                "creditor_id" => "00000",
                "currency" => "EUR",
				"version" => "3"
                );
                
$payment = array("name" => "Test von Testenstein",
                 "IBAN" => "NL41BANK1234567890",
                 //"BIC" => "BANKNL2A", <- Optional, banks may disallow BIC in future
                 "amount" => "1000",
                 "type" => "FRST",
                 "collection_date" => date("Y-m-d"),
                 "mandate_id" => "1234",
                 "mandate_date" => date("2014-02-01"),
                 "description" => "Test transaction"
                );      

try{
    $SEPASDD = new Sepa($config);
    $SEPASDD->addPayment($payment);
    $xml = $SEPASDD->save();
    
    if($SEPASDD->validate($xml)){
		print_r($xml);
	}else{
		print_r($SEPASDD->validate($xml));
	}
	print_r($SEPASDD->getDirectDebitInfo());
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}

?>
