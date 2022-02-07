<?php

/* +***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 * *********************************************************************************** */
include_once 'include/Webservices/Revise.php';
include_once 'include/Webservices/Retrieve.php';

class InvoiceHandler extends VTEventHandler {

    function handleEvent($eventName, $entityData) {

        $moduleName = $entityData->getModuleName();

        // Validate the event target
        if ($moduleName != 'Invoice') {
            return;
        }

        //Get Current User Information
        global $current_user, $currentModule;

        /**
         * Adjust the balance amount against total & received amount
         * NOTE: beforesave the total amount will not be populated in event data.
         */
        if ($eventName == 'vtiger.entity.aftersave') {
           
            // Trigger from other module (due to indirect save) need to be ignored - to avoid inconsistency.
            if ($currentModule != 'Invoice')
                return;
            $entityDelta = new VTEntityDelta();
            $oldCurrency = $entityDelta->getOldValue($entityData->getModuleName(), $entityData->getId(), 'currency_id');
            $newCurrency = $entityDelta->getCurrentValue($entityData->getModuleName(), $entityData->getId(), 'currency_id');
            $oldConversionRate = $entityDelta->getOldValue($entityData->getModuleName(), $entityData->getId(), 'conversion_rate');
            $db = PearDatabase::getInstance();
            $wsid = vtws_getWebserviceEntityId('Invoice', $entityData->getId());
            $wsrecord = vtws_retrieve($wsid,$current_user);
            if ($oldCurrency != $newCurrency && $oldCurrency != '') {
              if($oldConversionRate != ''){ 
                $wsrecord['received'] = floatval(($wsrecord['received']/$oldConversionRate) * $wsrecord['conversion_rate']);
              }  
            }
            $wsrecord['balance'] = floatval($wsrecord['hdnGrandTotal'] - $wsrecord['received']);
            if ($wsrecord['balance'] == 0) {
                $wsrecord['invoicestatus'] = 'Paid';
            }
            $query = "UPDATE vtiger_invoice SET balance=?,received=? WHERE invoiceid=?";
            $db->pquery($query, array($wsrecord['balance'], $wsrecord['received'], $entityData->getId()));
            //cf_986
            $modeid=$entityData->get('id');
            if(is_null($modeid)){
                $amountInwords = self::getIndianCurrency($wsrecord['hdnGrandTotal']);
                 $query = "UPDATE vtiger_invoicecf SET cf_986=? WHERE invoiceid=?";
                $db->pquery($query, array($amountInwords , $entityData->getId()));
            } 
          
            
        }
    }
    
    public static function getIndianCurrency(float $number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'One', 2 => 'Two',
            3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
            7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
            10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
            13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
            16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
            19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
            40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
            70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
        while ($i < $digits_length) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
            } else
                $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? " " . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    //    return ($Rupees ? $Rupees . 'Rupees ' : '') .'AND'. $paise;
        return ($Rupees ?  'Rupees ' . $Rupees . ' Only' : '');
    }

}

?>
