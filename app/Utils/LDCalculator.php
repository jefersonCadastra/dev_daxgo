<?php

namespace App\Utils;

/**
 * This class is intended to perform the calculations referring 
 * to the business analysis method 
 */
class LDCalculator
{
  /**
   * Calculate the total number of visits, based on the other indicators
   * Calc: ((Faturado / (Aprovação / 100)) / Ticket Médio) / (Conversão / 100)
   */
  public static function calcTotalVisit($invoicing, $approval, $ticket, $conversion)
  {
    $visits =
      (
        ($invoicing /
          ($approval / 100)
        ) / $ticket
      ) /
      ($conversion / 100);

    return (int)$visits;
  }
}
