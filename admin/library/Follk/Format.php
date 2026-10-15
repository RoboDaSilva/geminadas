<?php

class Format {

    public function encodeInt($number) {
//        $number = str_replace(",", "", $number);
        $number = str_replace(".", "", $number);
        $number = str_replace(",", ".", $number);

        return $number;
    }

    public function decodeInt($number) {
        $number = number_format($number, 0, "", ".");

        return $number;
    }

    public function currency($number, $toFormat) {
        /*
         * Float: 15120.30 -> Us: 15,120.30 -> Br: 15.120,30
         */

        $number = str_replace("R$", "", $number);
        $number = str_replace("$", "", $number);
        $number = trim($number);

        if ($toFormat == "brToFloat") {
            $number = str_replace(".", "", $number);
            $number = (float) str_replace(",", ".", $number);
        } else if ($toFormat == "usToFloat") {
            $number = (float) str_replace(",", "", $number);
        } else if ($toFormat == "floatToBr") {
            $number = number_format($number, 2, ",", ".");
        } else if ($toFormat == "floatToUs") {
            $number = number_format($number, 2, ".", ",");
        }

        return $number;
    }

    public function encodeDate($date, $separator = "-") {
        /*
         * Input: dd/mm/YYYY
         * Output: YYYY/mm/dd
         */

        $date = trim($date);

        $year = substr($date, 6, 4);
        $month = substr($date, 3, 2);
        $day = substr($date, 0, 2);

        $new_date = $year . $separator . $month . $separator . $day;

        return $new_date;
    }

    public function decodeDate($date, $separator = "/") {
        /*
         * Input: YYYY/mm/dd
         * Output: dd/mm/YYYY
         */

        $date = trim($date);

        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $new_date = $day . $separator . $month . $separator . $year;

        return $new_date;
    }

    public function convertDate($date, $output_format = "dd/mm/YYYY") {
        /*
         * Input: YYYY/mm/dd
         */

        $date = trim($date);

        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);

        $new_date = str_replace("dd", $day, str_replace("mm", $month, str_replace("YYYY", $year, $output_format)));
                
        return $new_date;
    }

    public function sumDayData($date, $days) {
        /*
         * Input: YYYY/mm/dd
         * Output: mm/dd/YYYY
         */
        
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);        

        return date("m/d/Y", mktime(24 * $days, 0, 0, $month, $day, $year));
    }

    public function comparareDate($data_1, $data_2) {
        /*
         * Input: mm/dd/YYYY
         * Retorna 0 caso as datas sejam iguais
         * Retorna 1 caso a data 1 seja maior
         * Retorna 2 caso a data 2 seja maior
         */

        $data_1 = strtotime($data_1);
        $data_2 = strtotime($data_2);

        if ($data_1 == $data_2) {
            return 0;
        } else if ($data_1 > $data_2) {
            return 1;
        } else if ($data_1 < $data_2) {
            return 2;
        }
    }
    
    public function removeHTMLTags($text) {
        $text_striped = strip_tags($text, '<.*?>');

        return $text_striped;
    }

    public function extractDescription($text) {
        $text_exploded = explode("<!-- pagebreak -->", $text);
        
        $text_striped = $this->removeHTMLTags(reset($text_exploded));
        
        return $text_striped;
    }

}

?>
