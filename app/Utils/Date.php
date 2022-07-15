<?php

namespace App\Utils;

class Date
{
  /**
   * 
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
   * 
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

  /**
   * 
   *
   * @param $month - number 1, 2, 3...
   * @param $year - number yyyy
   *
   * @return string - Last day of month
   */
  public static function lastDayOfMonth($month, $year)
  {
    $date = "$year-$month-1";
    $lastDay = date("Y-m-t", strtotime($date));
    return $lastDay;
  }

  /**
   * Converts the day of the week in the ISO-8601 representation, 
   * to the full format in abbreviated ptBr
   *
   * @param $day - number 1, 2, 3 (php date day of the week format, ISO-8601)
   *
   * @return string - Last day of month
   */
  public static function stringDayOfWeek($day, $full = false)
  {
    $dayList = [
      '1' => 'Seg',
      '2' => 'Ter',
      '3' => 'Qua',
      '4' => 'Qui',
      '5' => 'Sex',
      '6' => 'Sab',
      '7' => 'Dom',
    ];

    $dayListFull = [
      '1' => 'Segunda',
      '2' => 'Terça',
      '3' => 'Quarta',
      '4' => 'Quinta',
      '5' => 'Sexta',
      '6' => 'Sábado',
      '7' => 'Domingo',
    ];

    if ($full)
      return $dayListFull[$day];
    else
      return $dayList[$day];
  }

  /**
   * Receives a date and returns the day of the week in full, in full or abbreviated format
   *
   * @param string date
   *
   */
  public static function dayOfWeek($date)
  {
    $dayOfWeek = date("N", strtotime($date));
    return (new self)->stringDayOfWeek($dayOfWeek, false);
  }
}
