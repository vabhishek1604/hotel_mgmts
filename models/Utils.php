<?php

namespace app\models;

use yii\base\Object;

class Utils extends Object {

    public function getBloodGroup() {
        return ['A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O'];
    }

    public function getRhType() {
        return ['+' => 'Positive', '-' => 'Negative'];
    }

    public static function getDateTimeFormat($datetime) {
        return date('d-m-Y H:i:s', strtotime($datetime));
    }

    public static function getProjectDetail($column) {
        return "Ramuji Water Park";
    }

    public static function getRole() {
        return ['admin' => 'admin', 'user' => 'user', 'superadmin' => 'superadmin'];
    }

    public static function getMenuLoction() {
        return ['LEFT' => 'LEFT', 'TOP' => 'TOP'];
    }

    public static function getCompanyId() {
        return 1;
    }

    public static function paymentmode() {
        return ['' => '-Select-', 'cash' => 'Cash', 'cheque' => 'Cheque', 'dd' => 'DD', 'neft' => 'NEFT', 'rtgs' => 'RTGS'];
    }

    public static function convert_number_to_words($number) {

//   $number = 220693;

        $no = round($number);

        $point = round($number - $no, 2) * 100;

        $hundred = null;

        $digits_1 = strlen($no);

        $i = 0;

        $str = array();

        $words = array('0' => '', '1' => 'One', '2' => 'Two',
            '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
            '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
            '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
            '13' => 'Thirteen', '14' => 'Fourteen',
            '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
            '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
            '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
            '60' => 'Sixty', '70' => 'Seventy',
            '80' => 'Eighty', '90' => 'Ninety');

        $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');

        while ($i < $digits_1) {

            $divider = ($i == 2) ? 10 : 100;

            $number = floor($no % $divider);

            $no = floor($no / $divider);

            $i += ($divider == 10) ? 1 : 2;

            if ($number) {

                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;

                $hundred = ($counter == 1 && $str[0]) ? ' And ' : null;

                $str [] = ($number < 21) ? $words[$number] .
                        " " . $digits[$counter] . $plural . " " . $hundred :
                        $words[floor($number / 10) * 10]
                        . " " . $words[$number % 10] . " "
                        . $digits[$counter] . $plural . " " . $hundred;
            } else
                $str[] = null;
        }

        $str = array_reverse($str);

        $result = implode('', $str);

        $points = ($point) ?
                "." . $words[$point / 10] . " " .
                $words[$point = $point % 10] : '';



        return ucfirst($result) . "Rupees  " . ucfirst($points);
    }

    public static function date_Convert_yy_mm_dd_to_dd_mm_yy($date) {
        $new_date = date('d-m-Y', strtotime($date));
        return $new_date;
    }

    public static function dateDiffInDays($date1, $date2) {
        // Calulating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1);

        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400));
    }

    public static function get_mounth_first_last_date($query_date) {
        return date('Y-m-01', strtotime($query_date)) . '/' . date('Y-m-t', strtotime($query_date));
    }

    public static function get_year() {
        
    }

    public static function getMonth() {
        
    }

    public static function moneyFormatIndia($num) {
        $explrestunits = "";
        if (strlen($num) > 3) {
            $lastthree = substr($num, strlen($num) - 3, strlen($num));
            $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
            $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for ($i = 0; $i < sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if ($i == 0) {
                    $explrestunits .= (int) $expunit[$i] . ","; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i] . ",";
                }
            }
            $thecash = $explrestunits . $lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }

    public static function month_name() {
        return array('' => '-Select-', '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June',
            '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
    }

    public static function years() {
        $year = array();
        for ($i = 2020; $i <= 2030; $i++) {
            $year[] = $i;
        }
        return $year;
    }

}
