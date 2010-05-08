<?
$mediadir = "/media/android/"; 
$weblink = "http://mysite.com/media";

header("Content-type: text/xml\n\n");

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <rss version=\"2.0\">
     <channel>
      <title>My media</title>
      <link>$weblink</link>
    ";

$d = dir($mediadir); 
while($entry = $d->read()) { 
 if ($entry!= "." && $entry!= ".." && eregi(".mp4",$entry)) { 
  $filesize = filesize($entry);
  $filedate = date ("D, F d Y H:i:s", filemtime($entry));
  echo "
      <item>
       <title>$entry</title>
       <enclosure url=\"$weblink/$entry\" length=\"$filesize\" type=\"video/mpeg\" />
       <pubDate>$filedate</pubDate>
      </item>
    ";
 } 
} 
$d->close(); 

echo "
     </channel>
    </rss>";

?>
