<?php
$xmlData = <<<EOT
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:m="http://www.si-tech.com.cn/crm_ipd/nmbss" xmlns:fn="http://www.w3.org/2005/xpath-functions" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xalan="http://xml.apache.org/xalan" xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/">
  <SOAP-ENV:Body>
    <m:nmbss>
      <m:BIPCode>NMCS003</m:BIPCode>
      <m:ActionCode>0</m:ActionCode>
      <m:ActivityCode>T004</m:ActivityCode>
      <m:ProcessTime>20180314115856</m:ProcessTime>
	  <m:SvcCont>
		<![CDATA[
				<?xml version="1.0" encoding="UTF-8"?>
				<SyncUserInfoReq>
					<currentdate>20180314</currentdate>
				</SyncUserInfoReq>
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
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;


