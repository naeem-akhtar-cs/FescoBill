<?php

class FB_AccessExternalResource
{
    public function getFescoBill($trackingId)
    {
        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://bill.pitc.com.pk/fescobill/general?' . base64_decode($trackingId),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    catch(\Throwable $th){
        throw new Exception($th);
    }
    }
}