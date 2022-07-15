<?php

namespace App\Utils;

class Date
{
  /**
   * Instance of VisitController
   *
   * @param $month - number 1, 2, 3
   *
   * @return string - JAN, FEV, MAR
   */
  public static function monthNumberToString($month)
  {
    $listMonth = [
      0 => "",
      1 => "JAN",
      2 => "FEV",
      3 => "MAR",
      4 => "ABR",
      5 => "MAI",
      6 => "JUN",
      7 => "JUL",
      8 => "AGO",
      9 => "SET",
      10 => "OUT",
      11 => "NOV",
      12 => "DEZ"
    ];

    return $listMonth[$month];
  }

  /**
   * Instance of VisitController
   *
   * @param $month - number 1, 2, 3...
   *
   * @return string - Janeiro, Fevereiro, Março...
   */
  public static function monthNumberToFullString($month)
  {
    $listMonth = [
      0 => "",
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
      12 => "Dezembro"
    ];

    return $listMonth[$month];
  }
}
