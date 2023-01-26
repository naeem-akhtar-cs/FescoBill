<?php

class ProcessFescoBillHtml{
    public function populateLinks($html){
        $html=str_replace('="/', '="https://bill.pitc.com.pk/', $html);
        $html=str_replace('action="./', '="action="https://bill.pitc.com.pk/', $html);
        $html=str_replace('<div id="printBtn" class="noprint">', '<div id="printBtn" class="noprint"></br><a href="" onclick="window.location.reload()">Back to Home</a></br>', $html);
        return $html;
    }

    public function getBillSection($html){
        $startPos=strpos($html, '<div class="maincontent fontsize">');
        $billHtml=substr($html, $startPos, strpos($html, '<script src="https://bill.pitc.com.pk/js/jquery-3.6.0.min.js"></script>')-$startPos);
        return $billHtml;
    }
}
