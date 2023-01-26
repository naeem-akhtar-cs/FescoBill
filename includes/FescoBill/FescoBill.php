<?php

require_once __DIR__ . '/FB_AccessExternalResource.php';
require_once __DIR__ . '/ProcessFescoBillHtml.php';

function getFescoBill($request)
{
    try {
        $trackingId = $request['parcelId'];
        $accessExternalResource = new FB_AccessExternalResource();
        $response = $accessExternalResource->getFescoBill($trackingId);
        $processFescoBillHtml=new ProcessFescoBillHtml();
        $completeHtml=$processFescoBillHtml->populateLinks($response);
        $billSection=$processFescoBillHtml->getBillSection($completeHtml);
        return base64_encode(json_encode([
            "completeHtml"=>base64_encode($completeHtml),
            "billSection"=>base64_encode($billSection),
            "shortInfo"=>base64_encode("
<div>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
<table>
  
  <tr>
    <td>Bill month</td>
    <td id='fescoBillMonth'></td>
  </tr>
  <tr>
    <td>Due date</td>
    <td id='fescoBillDueDate'></td>
  </tr>
  <tr>
    <td>Payable within due date</td>
    <td id='fescoBillDueBill'></td>
  </tr>
  <tr>
    <td>Payable after due date</td>
    <td id='fescoBillOverDueBill'></td>
  </tr>
</table>
</div>")
        ]));
    } catch (\Throwable $th) {
        return base64_encode("Error processing request...".$th);
    }
}
