<?php

class DateTransform {

    private $months = array(
        "pt_br" => array(
            1 => "Janeiro",
            2 => "Fevereiro",
            3 => "Março",
            4 => "Abril",
            5 => "Maio",
            6 => "Junho",
            7 => "Julho",
            8 => "Agosto",
            9 => "Setembro",
            10 => "Outubro",
            11 => "Novembro",
            12 => "Dezembro",
        ),
        "en_us" => array(
            1 => "January",
            2 => "February",
            3 => "March",
            4 => "April",
            5 => "May",
            6 => "June",
            7 => "July",
            8 => "August",
            9 => "September",
            10 => "October",
            11 => "November",
            12 => "December",
        )
    );

    public function extractDay($date) {
        /*
         * Input: YYYY/MM/DD
         */

        $day = (int) substr($date, 8, 2);

        return $day;
    }

    public function extractMonth($date, $leng = "pt_br", $type = 1) {
        /*
         * Input: YYYY/MM/DD
         */

        $month = (int) substr($date, 5, 2);

        if ($type == 1) {
            return $month;
        } else {
            $name_month = $this->months[$leng][$month];

            return $name_month;
        }
    }

    public function extractYear($date) {
        /*
         * Input: YYYY/MM/DD
         */

        $year = (int) substr($date, 0, 4);

        return $year;
    }
    
    public function convertMonth($month, $leng = "pt_br") {
        $month = (int) $month;
        
        return $this->months[$leng][$month];
    }

}

?>
