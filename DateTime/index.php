<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*

    1. Сформировать переменные, содержащие даты и время следующих диапазонов и вывести их на экран с сопутствующими текстами (опирая на динамическую дату текущего дня) DateTime('now'). К примеру:

    Сегодня
    $todayStartDate, пример: 2020-08-21 00:00:00
    $todayEndDate, пример: 2020-08-21 23:59:59 */

$format = 'd/m/Y H:i:s';
$todayStartDate = new DateTime();
$todayEndDate = new DateTime();
$h = $todayStartDate->format('H');
$difH = 23 - $h;
$m = $todayStartDate->format('i');
$difM = 59 - $m;
$s = $todayStartDate->format('s');
$difS = 59 - $s;
$todayStartDate->sub(new DateInterval('PT' . $h . 'H' . $m . 'M' . $s . 'S'));
$todayEndDate->add(new DateInterval('PT' . $difH . 'H' . $difM . 'M' . $difS . 'S'));
echo '</br><b>' . 'Сегодня: ' . '</b></br>';
echo ($todayStartDate->format($format)) . '</br>';
echo ($todayEndDate->format($format)) . '</br>';


/*    Вчера
    $yesterdayStartDate, пример: 2020-08-20 00:00:00
    $yesterdayEndDate, пример: 2020-08-20 23:59:59
*/
$yesterdayStartDate = $todayStartDate->sub(new DateInterval('P1D'));
$yesterdayEndDate = $todayEndDate->sub(new DateInterval('P1D'));
echo '</br><b>' . 'Вчера: ' . '</b></br>';
echo ($yesterdayStartDate->format($format)) . '</br>';
echo ($yesterdayEndDate->format($format)) . '</br>';


/*    Текущая неделя
    $thisWeekStartDate, пример: 2020-08-17 00:00:00
    $thisWeekEndDate, пример: 2020-08-23 23:59:59
*/

$currentWeekDay = $yesterdayStartDate->format('N');
$weekStart = $currentWeekDay - 1;
$weekEnd = 7 - $currentWeekDay;
$thisWeekStartDate = $yesterdayStartDate->sub(new DateInterval('P' . $weekStart . 'D'));
$thisWeekEndDate = $yesterdayEndDate->add(new DateInterval('P' . $weekEnd . 'D'));
echo '</br><b>' . 'Текущая неделя: ' . '</b></br>';
echo ($thisWeekStartDate->format($format)) . '</br>';
echo ($thisWeekEndDate->format($format)) . '</br>';


/*    Прошлая неделя
    $lastWeekStartDate, пример: 2020-08-10 00:00:00
    $lastWeekEndDate, пример: 2020-08-16 23:59:59
*/

$lastWeekStartDate = $thisWeekStartDate->sub(new DateInterval('P7D'));
$lastWeekEndDate = $thisWeekEndDate->sub(new DateInterval('P7D'));
echo '</br><b>' . 'Прошлая неделя: ' . '</b></br>';
echo ($lastWeekStartDate->format($format)) . '</br>';
echo ($lastWeekEndDate->format($format)) . '</br>';

///*    Текущий месяц
//    $thisMonthStartDate, пример: 2020-08-01 00:00:00
//    $thisMonthEndDate, пример: 2020-08-31 23:59:59
//*/
$todayStartDate2 = new DateTime;
$todayEndDate2 = new DateTime();
$todayStartDate2->sub(new DateInterval('PT' . $h . 'H' . $m . 'M' . $s . 'S'));
$todayEndDate2->add(new DateInterval('PT' . $difH . 'H' . $difM . 'M' . $difS . 'S'));
if ($lastWeekStartDate->format('j') < $todayStartDate2->format('j')) {
    $monthStart = $lastWeekStartDate->format('j'); // день месяца
    $dayInMonth = $lastWeekStartDate->format('t'); // количество дней
    $difDaysLastWeek = $monthStart - 1;
    $thisMonthStartDate = $lastWeekStartDate->sub(new DateInterval('P' . $difDaysLastWeek . 'D'));
} else {
    $monthStart = $lastWeekStartDate->format('j'); // день месяца
    $dayInMonth = $lastWeekStartDate->format('t'); // количество дней
    $difDaysLastWeek = $dayInMonth - $monthStart + 1;
    $thisMonthStartDate = $lastWeekStartDate->add(new DateInterval('P' . $difDaysLastWeek . 'D'));
}
$monthEnd = $dayInMonth - $lastWeekEndDate->format('j');
$thisMonthEndDate = $lastWeekEndDate->add(new DateInterval('P' . $monthEnd . 'D'));
echo '</br><b>' . 'Текущий месяц: ' . '</b></br>';
echo ($thisMonthStartDate->format($format)) . '</br>';
echo ($thisMonthEndDate->format($format)) . '</br>';


///*    Прошлый месяц
//    $lastMonthStartDate, пример: 2020-07-01 00:00:00
//    $lastMonthEndDate, пример: 2020-07-31 23:59:59
//*/

$lastMonthStartDate = $thisMonthStartDate->sub(new DateInterval('P1M'));
$lastMonthEndDate = $thisMonthEndDate->sub(new DateInterval('P1M'));
echo '</br><b>' . 'Прошлый месяц: ' . '</b></br>';
echo ($lastMonthStartDate->format($format)) . '</br>';
echo ($lastMonthEndDate->format($format)) . '</br>';



