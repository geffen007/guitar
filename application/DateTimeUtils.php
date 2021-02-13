<?php
class DateTimeUtils{
	
	public static function ConvertDateIT2EN($IT_date, $separator = "/", $new_separator = "-"){
		$arr_date_only = explode(" ", $IT_date);
		$arr_date = explode($separator, $arr_date_only[0]);
        return $arr_date[2].$new_separator.$arr_date[1].$new_separator.$arr_date[0]." ".$arr_date_only[1];
	}
        
	public static function ConvertDateEN2IT($DB_date, $separator = "-", $new_separator = "/"){
		$arr_date_only = explode(" ", $DB_date);
		$arr_date = explode($separator, $arr_date_only[0]);
		return $arr_date[2].$new_separator.$arr_date[1].$new_separator.$arr_date[0]." ".$arr_date_only[1];
	}
        
	public static function ConvertDateIT2ENTimeLess($IT_date, $oldSeparator = "/", $newSeparator = "/"){
		$arr_date_only = explode(" ", $IT_date);
		$arr_date = explode($oldSeparator, $arr_date_only[0]);
		return $arr_date[2].$newSeparator.$arr_date[1].$newSeparator.$arr_date[0];
	}
        
	public static function ConvertDateEN2ITTimeLess($DB_date, $oldSeparator = "-", $newSeparator = "-"){
		$arr_date_only = explode(" ", $DB_date);
		$arr_date = explode($oldSeparator, $arr_date_only[0]);
		return $arr_date[2].$newSeparator.$arr_date[1].$newSeparator.$arr_date[0];
	}
	
}
?>