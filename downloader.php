<!DOCTYPE HTML>
<html>
<head>
<title>Instagram Video Downloader</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Instagram Video Downloader | Insta Video Download | Instagram Video Download | Video Downloader From Instagram" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
    
   
    
    <style>
embed{
max-width: 100%;
width: 400px;
padding-top: 20px;
}
.footer {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	background-color: lightgrey;
	color: navy;
	text-align: center;
}
#foot{
   color:maroon;
   text-decoration:underline; 
}
</style>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
if (!isset($_GET["url"])){
    ?>
<div class="container">
     <h1>Instagram Video Downloader</h1>
    <form>
			<div class="input-group mb-3">
				<input type="text" name="url" class="form-control" placeholder="Video Url" aria-label="Username" aria-describedby="basic-addon1">
			</div>
			<input type="submit" value="Get Video" class="btn btn-primary">
			<br><br><small class="text-muted"> &copy; Badal Kumar</small>
		</form>
		</div>

<div class="footer">
Created By <a href="https://www.instagram.com/badalkumar_/" id="foot">Badal Kumar</a>
</div>
<?php
die();
}
$html = file_get_contents_curl($_GET["url"]);

//parsing begins here:

echo '<div class="container"><br><a href="index.php" class="btn btn-primary">BACK</a><br><br>';
$doc = new DOMDocument();
@$doc->loadHTML($html);
$metas = $doc->getElementsByTagName('meta');
for ($i = 0; $i < $metas->length; $i++)
{
    $meta = $metas->item($i);
       $src = $meta->getAttribute('content');
if (strpos($src, 'cdninstagram') !== false) {
$src=str_replace("http:", "https:", $src);

echo "<embed src=\"$src\"><br><a href='$src'>Direct Link</a></embed><br>";

}
echo '<div class="footer">
Created By <a href="https://www.instagram.com/badalkumar_/" id="foot">Badal Kumar</a>
</div>';
}
?>