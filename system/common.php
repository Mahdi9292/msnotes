<?php
function hr($return = false)
{
  if ($return) {
    return "<hr>\n";
  } else {
    echo "<hr>\n";
  }
}

function br($return = false)
{
  if ($return) {
    return "<br>\n";
  } else {
    echo "<br>\n";
  }
}

function dump($var, $return = false)
{
  if (is_array($var)) {
    $out = print_r($var, true);
  } else if (is_object($var)) {
    $out = var_export($var, true);
  } else {
    $out = $var;
  }

  if ($return) {
    return "\n<pre style='direction: ltr'>$out</pre>\n";
  } else {
    echo "\n<pre style='direction: ltr'>$out</pre>\n";
  }
}

function getCurrentDateTime()
{
  return date("Y-m-d H:i:s");
}

function encryptPassword($password)
{
  global $config;
  return md5($password . $config['salt']);
}

function getFullUrl()
{
  $fullurl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  return $fullurl;
}

function getRequestUri()
{
  return $_SERVER['REQUEST_URI'];
}

function baseUrl()
{
  global $config;
  return $config['base'];
}

function fullBaseUrl()
{
  global $config;
  return 'http://' . $_SERVER['HTTP_HOST'] . $config['base'];
}

function strhas($string, $search, $caseSensitive = false)
{
  if ($caseSensitive) {
    return strpos($string, $search) !== false;
  } else {
    return strpos(strtolower($string), strtolower($search)) !== false;
  }
}

function message($type, $message, $mustExit = false)
{
  $data['message'] = $message;
  View::render("/message/$type.php", $data);
  if ($mustExit) {
    exit;
  }
}

function twoDigitNumber($number)
{
  return ($number < 10) ? $number = "0" . $number : $number;
}


# UNIX timestamp => 1970-01-01 00:00:00 = 1348-10-11 00:00:00
function jdate($date, $format)
{

  $timestamp = strtotime($date);
  $secondsInOneDay = 24 * 60 * 60;
  $daysPassed = floor($timestamp / $secondsInOneDay) + 1;

  $days = $daysPassed;
  $day = 11;
  $month = 11; // we assume the jalali month 11 then we reeduce 19 days of it
  $year = 1348;

  $days -= 19; // we assume the jalali month 11 then we reeduce 19 days of it
  $daysInMonths = [31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29];


  $monthNames_en = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'Jun',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
  ];
  $monthNames_fa = [
    'فروردین',
    'اردیبهشت',
    'خرداد',
    'تیر',
    'مرداد',
    'شهریور',
    'مهر',
    'آبان',
    'آذر',
    'دی',
    'بهمن',
    'اسفند'
  ];

  while (true) {
    if ($days > $daysInMonths[$month - 1]) {
      $days -= $daysInMonths[$month - 1];
      $month++;
      if ($month == 13) {
        $year++;
        if (($year - 1347) % 4 == 0) {
          $days--;
        }
        $month = 1;
      }
    } else {
      break;
    }
  }

  $month = twoDigitNumber($month);
  $days = twoDigitNumber($days);

  header('Content-Type: text/html; charset= utf-8');
  //   $monthName = $monthNames_en[$month-1];
  $monthName = $monthNames_fa[$month - 1];

  $output = $format;
  $output = str_replace('y', $year, $output);
  $output = str_replace('m', $month, $output);
  $output = str_replace('d', $days, $output);
  $output = str_replace('M', $monthName, $output);
  
  return $output;
}

// in order to user you must echo the function below ==> <?= pagination() ...
///////////////ex: ('/notes-v2/note/catalog', 3, 'btn btn-blue', 'btn', $pageIndex, $pageCount)
function pagination($url, $showCount, $activeClass, $deactiveClass, $currentPageIndex, $pageCount, $jsFunction = null){ ?>

<? if(isset($jsFunction))?>

<? ob_start()?>

  <a href="<?=$url?>/1" class="<?=$activeClass?>">1</a>
  <span>..</span>
  <? for ($i = $currentPageIndex - $showCount; $i <=$currentPageIndex + $showCount; $i++ ){ 
      if ($i <= 1){continue;}
      if ($i >= $pageCount){continue;}
      if ($i == $currentPageIndex){
          ?>
          <span class="<?=$deactiveClass?>"><?=$i?></span>
          
      <? }else{ ?>

      <a href="<?=$url?>/<?=$i?>" class="<?=$activeClass?>"><?=$i?></a>

  <?}}?>
  <span>..</span>
  <a href="<?=$url?>/<?=$pageCount?>" class="<?=$activeClass?>"><?=$pageCount?></a>
<? 
$output = ob_get_clean();
return $output;  
      }