<?php
	function GetUserIPInfo($ip){
		$IpInfo = [];
		
		// Option 1: 50K Per month
		$jsonData = file_get_contents('https://ipinfo.io/'.$ip);
		$data = json_decode($jsonData, true);
		if (isset($data['country'])) {
			$IpInfo['country'] = $data['country'] ?? "Unknown";
			$IpInfo['city'] = $data['city'] ?? "Unknown";
			$IpInfo['loc'] = $data['loc'] ?? "Unknown";
			$IpInfo['org'] = $data['org'] ?? "Unknown";
			$IpInfo['timezone'] = $data['timezone'] ?? "Unknown";
			return $IpInfo;
		}
		
		// Option 2: 45 Per minute
		$jsonData = file_get_contents('http://ip-api.com/json/'.$ip);
		$data = json_decode($jsonData, true);
		if (isset($data['countryCode'])) {
			$IpInfo['country'] = $data['countryCode'] ?? "Unknown";
			$IpInfo['city'] = $data['city'] ?? "Unknown";
			$IpInfo['loc'] = $data['lat'].','.$data['lon'];
			$IpInfo['org'] = $data['isp'].' - '.$data['org'];
			$IpInfo['timezone'] = $data['timezone'] ?? "Unknown";
			return $IpInfo;
		}
		
		// Option 3: 10K Per month
		$jsonData = file_get_contents('https://ipwho.is/'.$ip);
		$data = json_decode($jsonData, true);
		if (isset($data['country_code'])) {
			$IpInfo['country'] = $data['country_code'] ?? "Unknown";
			$IpInfo['city'] = $data['city'] ?? "Unknown";
			$IpInfo['loc'] = $data['latitude'].','.$data['longitude'];
			$IpInfo['org'] = $data['connection']['isp'].' - '.$data['connection']['org'];
			$IpInfo['timezone'] = $data['timezone']['id'] ?? "Unknown";
			return $IpInfo;
		}
		
		// Option 4: 1K per day
		$jsonData = file_get_contents('https://ipapi.co/'.$ip.'/json/');
		$data = json_decode($jsonData, true);
		if (isset($data['country_code'])) {
			$IpInfo['country'] = $data['country_code'] ?? "Unknown";
			$IpInfo['city'] = $data['city'] ?? "Unknown";
			$IpInfo['loc'] = $data['latitude'].','.$data['longitude'];
			$IpInfo['org'] = $data['org'] ?? "Unknown";
			$IpInfo['timezone'] = $data['timezone'] ?? "Unknown";
			return $IpInfo;
		}
		
		// Option 5: Unlimited
		$Token = ""; // This website required an api token : findip.net
		$jsonData = file_get_contents('https://api.findip.net/'.$ip.'/?token='.$Token);
		$data = json_decode($jsonData, true);
		if (isset($data['country']['iso_code'])) {
			$IpInfo['country'] = $data['country']['iso_code'] ?? "Unknown";
			$IpInfo['city'] = $data['city']['names']['en'] ?? "Unknown";
			$IpInfo['loc'] = $data['location']['latitude'].','.$data['location']['longitude'];
			$IpInfo['org'] = $data['traits']['isp'].' - '.$data['traits']['organization'];
			$IpInfo['timezone'] = $data['location']['time_zone'] ?? "Unknown";
			return $IpInfo;
		}
		
		// Option 6: 60 Per minute
		$jsonData = file_get_contents('https://freeipapi.com/api/json/'.$ip);
		$data = json_decode($jsonData, true);
		if (isset($data['countryCode'])) {
			$IpInfo['country'] = $data['countryCode'] ?? "Unknown";
			$IpInfo['city'] = "Unknown";
			$IpInfo['loc'] = $data['latitude'].','.$data['longitude'];
			$IpInfo['org'] = "Unknown";
			$IpInfo['timezone'] = "Unknown";
			return $IpInfo;
		}
		
		return $IpInfo;
	}
?>
