<?php
$xmlData = <<<EOT
<SOAP-ENV:Envelope 
xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" 
xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
xmlns:xsd="http://www.w3.org/2001/XMLSchema">
	<SOAP-ENV:Body>
		<m:nmbss xmlns:m="http://www.si-tech.com.cn/crm_ipd/nmbss">
			<m:BIPCode>NMCS030</m:BIPCode>
			<m:ActionCode>0</m:ActionCode>
			<m:ActivityCode>T030</m:ActivityCode>
			<m:ProcessTime>180314181421</m:ProcessTime>
			<m:SvcCont>
			<![CDATA[
				<?xml version="1.0" encoding="UTF-8"?>
				<AAAUserInfoReq>
					<currentdate>20180314</currentdate>
				</AAAUserInfoReq>
			]]>
			</m:SvcCont>
		</m:nmbss>
	</SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOT;

$url = "http://192.168.3.55:59080/services/wsadapter";

$headers = array(
    "Content-type: application/soap+xml;charset=utf-8",
    "Content-length: ".strlen($xmlData),
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if ($response === false){
    var_dump(curl_errno($ch), curl_error($ch));
}else{
    echo $response;
}

curl_close($ch);

die('ok');



