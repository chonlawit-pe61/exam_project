<?
class classMain
{
	function gourl($url, $alert,$alertType="warning")
	{
		if ($alert != '') {
			echo "<script>window.location='" . $url . "&alerttext=" . $alert . "&alerttype=". $alertType ."'</script>";
		} else {
			echo "<script>window.location='" . $url . "'</script>";
		}
		exit();
	}

	#เปลี่ยน รูปแบบวันที่
	#engthai = จาก eng to thai
	#thaieng = จาก thai to eng
	#thaidot = จาก eng to thai แบบแสดงเดือนเป็น ม.ค.
	function dateFormat($value, $type)
	{
		if ($value == '' or $value == '0000-00-00') {
			$date = '';
		} else if ($type == "engthai") {

			$day = explode("-", $value);
			$date = $day[2] . '-' . $day[1] . '-' . ($day[0] + 543);
		} else if ($type == "thaieng") {

			$day = explode("-", $value);
			$date = ($day[2] - 543) . '-' . $day[1] . '-' . $day[0];
		} else if ($type == "engthai2") {

			$day = explode("-", $value);
			$date = $day[2] . '/' . $day[1] . '/' . ($day[0] + 543);
		} else if ($type == "thailinux") {

			$day = explode("/", $value);
			$date = ($day[2] - 543) . '-' . $day[1] . '-' . $day[0];
		} else if ($type == "thaidot") {

			$Month = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			$day = explode("-", $value);
			$Y = $day[0];
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$d = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = $d . ' ' . $Month[$m] . ' ' . ($Y + 543);
		} else if ($type == "thaifull") {
			$Month = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

			$day = explode("-", $value);
			$Y = $day[0];
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$d = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = $d . ' ' . $Month[$m] . ' ' . ($Y + 543);
		} else if ($type == "engfull") {
			$Month = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

			$day = explode("-", $value);
			$Y = $day[0];
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$d = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = intval($d) . ' ' . $Month[$m] . ' ' . ($Y);
		} else if ($type == "inputtothai") {

			$Month = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			$day = explode("-", $value);
			$d = $day[0];
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$Y = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = $d . ' ' . $Month[$m] . ' ' . ($Y);
		} else if ($type == "thaitime") {

			$Month = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			$st = explode(" ", $value);
			$day = explode("-", $st[0]);
			$Y = $day[0] + 543;
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$d = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = $d . ' ' . $Month[$m] . ' ' . ($Y) . ' เวลา ' . $st[1];
		} else if ($type == "thaifull2") {
			$Month = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

			$day = explode("-", $value);
			$Y = $day[0];
			$m = $day[1];
			if ($m < 10) {
				$m = str_replace("0", "", $m);
			}

			$d = $day[2];
			if ($d < 10) {
				$d = str_replace("0", "", $d);
			}
			$date = $d . ' ' . $Month[$m] . ' พ.ศ. ' . ($Y + 543);
		} else if ($type == "") {

			$date = explode("-", $value);
		}


		return $date;
	}


	function RandomStr($length = 5)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function diff_day($date_start, $date_end)
	{
		$diff = date_diff(date_create($date_start), date_create($date_end));
		$y = $diff->format('%Y');
		$m = $diff->format('%m');
		$d = $diff->format('%d');
		$result = array('y' => $y, 'm' => $m, 'd' => $d);
		return $result;
	}
}		// END Class


if (countVal($_POST) > 0) {
	setPOST($_POST);
}

function setPOST(&$post)
{
	if (countVal($post) > 0) {
		foreach ($post as $keyPOST => $valuePOST) {
			if (is_array($valuePOST)) {
				setPOST($post[$keyPOST]);
			} else {
				$post[$keyPOST] = str_replace("'", "&rsquo;", $valuePOST);
			}
		}
	}
}

function countVal($val = array())
{
	if (empty($val)) {
		return 0;
	} else {
		return count((array)$val);
		//return 1;
	}
}
