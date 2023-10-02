# PHP-GetIpInfo
Simple PHP code snippet to get an IP info from several sources and options

# Usage
```php
$ip = "8.8.8.8"; // An IP Address

$IpInfo = GetUserIPInfo($ip); // Call the function
$country = $IpInfo['country'] ?? "Unknown";
$city = $IpInfo['city'] ?? "Unknown";
$loc = $IpInfo['loc'] ?? "Unknown";
$org = $IpInfo['org'] ?? "Unknown";
$timezone = $IpInfo['timezone'] ?? "Unknown";

echo $country; // US
echo $city; // Los Angeles
echo $loc; // 34.0522342,-118.2436849
echo $org; // Google LLC
echo $timezone; // America/Los_Angeles
```
