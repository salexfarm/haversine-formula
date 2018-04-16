<?php

// Declare as an XML document

header("Content-type: text/xml");

$username="a9488764_bbk";
$password="";
$database="a9488764_informatics";

// Function to create XML

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<', '&lt; ',$htmlStr);
$xmlStr=str_replace('>', '&gt; ',$xmlStr);
$xmlStr=str_replace(' " ', '&quot; ',$xmlStr);
$xmlStr=str_replace(" ' ", '&#39; ',$xmlStr);
$xmlStr=str_replace("&", '&amp; ', $xmlStr);
return $xmlStr;
}

$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
   die("Not connected : " . mysql_error());
}

// Pull data from table shops

$query = sprintf("SELECT * FROM informatics");
$result = mysql_query($query);
if (!$result) {
   die("Invalid query: " . mysql_error());
}

// Start XML file, echo parent node

echo "<markers>\n";

// Iterate through the rows, printing XML nodes for each

while ($row = @mysql_fetch_assoc($result)){
// Add to XML Document Node
echo '<marker ';
echo 'name="' . parseToXML($row['name']) . '" ';
echo 'address="' . parseToXML($row['address']) . '" ';
echo 'lat="' . $row['lat'] . '" ';
echo 'lng="' . $row['lngt'] . '" ';
echo 'distance="' . $row['distance'] . '" ';
echo "/>\n";
}

// End XML file

echo "</markers>\n";