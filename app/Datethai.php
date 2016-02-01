<?php
namespace App;
use Carbon\Carbon ;
use DateTimeZone;

 
class Datethai{
   
	public static function DateThai(Carbon $unixtimestamp)
		{

	        $strDate=date('d F Y  H:i:s', strtotime( $unixtimestamp->setTimezone(new DateTimeZone('Asia/Bangkok'))));
			$strYear = date("Y",strtotime($strDate))+543;
			$strMonth= date("n",strtotime($strDate));
			$strDay= date("j",strtotime($strDate));
			$strHour= date("H",strtotime($strDate));
			$strMinute= date("i",strtotime($strDate));
			$strSeconds= date("s",strtotime($strDate));
			$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
			$strMonthThai=$strMonthCut[$strMonth];
			return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strMinute";

		}

 

}

