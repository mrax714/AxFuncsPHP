<?php

function mailer(&$LS,$userID,$to,$subject,$body,$attachments=array()){
            $email = $LS->getUser('email', $userID);
            $name = $LS->getUser('name', $userID);
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
 //   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'seanax26';                     //SMTP username
    $mail->Password   = 'crack420';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($to, '');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo($email, $name);
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    =$body;

   // $mail->AltBody = 'This is the body in plain text foron-HTML mail clients';

    $mail->send();
   // echo 'Message has been sent';
} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}









	function humanTiming ($time)
{
    // to get the time since that moment
    $time = time() - $time;

    // time unit constants
    $timeUnits = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    // iterate over time contants to build a human 
    //$humanTiming;
    foreach ($timeUnits as $unit => $text)
    {
        if ($time < $unit)
            continue;
        $numberOfUnits = floor($time / $unit);
if(!isset($humanTiming)){
        // human readable token for current time unit
        $humanTiming = $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
}
        // compute remaining time for next loop iteration
        $time -= $unit*$numberOfUnits;
    }
    return $humanTiming;
}





function showHeader()
{
    global $LS;
    require_once 'partial/header.php';
}



function showFooter()
{
    global $LS,$time_start;
    require_once 'partial/footer.php';
}




function printHead($title = 'My Site')
{
    ?>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link href="/css/boogtstrap.min.css" rel="stylesheet">
<link href="https://axcloud.sytes.net/bootstrhap/sticky-footer/sticky-footer.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/jquery.hrouter.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

    
    <script src="js/avpp.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title><?php echo $title; ?></title>

    <meta name="page-path" content="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

    <style>
        .container{
            padding-bottom: 40px;
        }
    </style>
<?php
}







/*
function login() {
if($app!='home'){
$realm = 'Restricted area';

//user => password
$users = array('ax' => 'crack420', 'guest' => 'guest');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
           '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');

    die('Text to send if user hits Cancel button');
}


// analyze the PHP_AUTH_DIGEST variable
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($users[$data['username']]))
    die('Wrong Credentials!');


// generate the valid response
$A1 = md5($data['username'] . ':' . $realm . ':' . $users[$data['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$data['uri']);
$valid_response = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

if ($data['response'] != $valid_response)
    die('Wrong Credentials!');

// ok, valid username & password
echo 'You are logged in as: ' . $data['username'];


// function to parse the http auth header

}
}



function http_digest_parse($txt)
{
    // protect against missing data
    $needed_parts = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($needed_parts));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $m) {
        $data[$m[1]] = $m[3] ? $m[3] : $m[4];
        unset($needed_parts[$m[1]]);
    }

    return $needed_parts ? false : $data;
}


*/


function loadBalance($max=0.2){
$load = sys_getloadavg();
while($load[0] > 01.50) {
sleep(5);
    $load = sys_getloadavg();
echo $load[0];
}
}





function makeClickableLinks($s) {
 $s=preg_replace('~(^|[\s\.,;\n\(])([a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})~',
  '$1<a href="mailto:$2">$2</a>', $s);

$s=preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="$1" target="_blank">$1</a>', $s);

// PHONE NUMBERS
$s =  preg_replace_callback('~(^|[\s\.,;\n\(])(?<! )([0-9 \+\(\)]{9,})~', function($m) {
  return $m[1].'<a href="tel:'.preg_replace('~[^0-9\+]~', '', $m[2]).'">'.$m[2].'</a>';
}, $s);

return $s;
}




function saveJSON($l,$json)
{


  exec('ffprobe -v quiet -print_format json -show_format -show_streams '.escapeshellarg($l).'> '.escapeshellarg($json));


}



function getJSON($json)
{
$j=file_get_contents($json);
$a=json_decode($j,true);
return $a;
}
function thumb($l)
{
global $opt,$page,$app;

	$ds=explode('/',$l);
	$path=$l;
        $size=byteConvert(filesize($l));
        $n=basename($l);
        $c=filter_filename($n);

        if($opt=='video'){

$json='json/'.$n.'.json';
if(!file_exists($json)){
saveJSON($l,$json);

}

$a=getJSON($json);
		$screenshot = 'scrs/'.md5($n).'.jpg';
		$abase='?app=play&path=';

$d=$t=$title='';
$title=ucwords(str_replace('-',' ',$n));


if(isset($a['format']['tags']['title'])){
$title=$a['format']['tags']['title'];
}
if(isset($a['format']['tags']['comment'])){
$comment=$a['format']['tags']['comment'];
}
if(isset($a['format']['duration'])){
$d=$a['format']['duration'];
$t=gmdate("H:i:s", $d);
}
  
        }
      		elseif($opt=='image')
        {
      		$screenshot=$l;
        	$abase='play.php?path=';

        }
      
        
        $type=strtoupper($ds[4]);      
        $kind=strtoupper($ds[5]);
       //
            list($w,$h)=@getimagesize($screenshot);  
        //    $l=basename($l);
        echo "<div class='mitem col_3 visible'>
        
        		<div class='col_12 center'>
        	<a target='_blank' href='$abase".urlencode($l)."'>
        			<img src='thumb.php?path=".urlencode($l)."' style='' class='full-width'>
        	</a>
        		</div>
         
        	<p class='title col_12'>
        	        	<a target='_blank' href='$abase".urlencode($l)."'>	$title </a>
        	</p>
        	<p class='stats col_12'>$t | ".$w."x".$h." | $size | $type | $kind</p>
<ul class=\"button-bar small\">        	
<li><a class='' href='dl.php?path=".urlencode($l)."'><i class='fas fa-download'></i></a></li> 	
<li><a target='_blank' href='file.php?path=".urlencode($l)."'><i class='fas fa-file'></i></a></li> 	
<li><a class=' orange' href='move.php?path=".urlencode($l)."&opt=$opt&app=$app&page=$page' onclick=\"return confirm('Are you sure you want to move this item to NSFW?');\"><i class='fas fa-ban'></i></a></li> 	
<li><a class=' red' href='del.php?path=".urlencode($l)."&opt=$opt&app=$app&page=$page' onclick=\"return confirm('Are you sure you want to delete this item?');\"><i class='fas fa-trash'></i></a></li> 	
</ul><pre>";
 //print_r($a);
         	echo "</pre></div>";
}




 // maximum execution time in seconds


function dl(){

    // folder to save downloaded files to. must end with slash
    $destination_folder = 'downloads/';

    $url = $_POST['url'];
    $newfname = $destination_folder . basename($url);

    $file = fopen ($url, "rb");
    if ($file) {
      $newf = fopen ($newfname, "wb");

      if ($newf)
      while(!feof($file)) {
        fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
      }
    }

    if ($file) {
      fclose($file);
    }

    if ($newf) {
      fclose($newf);
    }

}
function downloadUrlToFile($url, $outFileName)
{   
    if(is_file($url)) {
        copy($url, $outFileName); 
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}


function downloadFile($url, $path)
{
    $newfname = $path;
    $file = fopen ($url, 'rb');
    if ($file) {
        $newf = fopen ($newfname, 'wb');
        if ($newf) {
            while(!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
    }
    if ($file) {
        fclose($file);
    }
    if ($newf) {
        fclose($newf);
    }
}

function getBigURL($url,$filename)
{
	$limit=1024*200;
echo	$end=curl_get_file_size($url);
	$fp = fopen($filename, 'a');
	$go=true;
	$i=0;
	while($go)
	{
		$step=$i*$limit;
		$stop=$step+$limit;

	
		
	$cookie_string = 'time:'.time();
	$useragent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0';
	$timeout = 10020;

	$ch = curl_init(); 
	curl_setopt ($ch, CURLOPT_URL,$url);  
	curl_setopt ($ch, CURLOPT_RANGE, $step.'-'.$stop);
//	curl_setopt ($ch, CURLOPT_RETURNHE, 1);   
	curl_setopt ($ch, CURLOPT_HEADER, true );   
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);      
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt ($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt ($ch, CURLOPT_REFERER, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt ($ch, CURLOPT_COOKIE, $cookie_string);     
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);  
	curl_setopt ($ch, CURLOPT_FILE, $fp);

	$output = curl_exec($ch);  
	fwrite($fp,$output);
	curl_close($ch); 
	$i++;
echo "<li>$step - $stop</li>";
		if(@filesize($filename)>=$end){$go=false;}
	}
	fclose($fp);

//	file_put_contents($filename,$output);
}





/**
 * Returns the size of a file without downloading it, or -1 if the file
 * size could not be determined.
 *
 * @param $url - The location of the remote file to download. Cannot
 * be null or empty.
 *
 * @return The size of the file referenced by $url, or -1 if the size
 * could not be determined.
 */
function curl_get_file_size( $url ) {
  // Assume failure.
  $result = -1;

  $ch = curl_init( $url );

  // Issue a HEAD request and follow any redirects.
  curl_setopt( $ch, CURLOPT_NOBODY, true );
  curl_setopt( $ch, CURLOPT_HEADER, true );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
  //curl_setopt( $ch, CURLOPT_USERAGENT, get_user_agent_string() );
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt ($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt ($ch, CURLOPT_REFERER, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt ($ch, CURLOPT_COOKIE, $cookie_string);     
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);  
  $data = curl_exec( $ch );
  curl_close( $ch );

  if( $data ) {
    $content_length = "unknown";
    $status = "unknown";

    if( preg_match( "/^HTTP\/1\.[01] (\d\d\d)/", $data, $matches ) ) {
      $status = (int)$matches[1];
    }

    if( preg_match( "/Content-Length: (\d+)/", $data, $matches ) ) {
      $content_length = (int)$matches[1];
    }

    // http://en.wikipedia.org/wiki/List_of_HTTP_status_codes
    if( $status == 200 || ($status > 300 && $status <= 308) ) {
      $result = $content_length;
    }
  }

  return $result;
}








function curl_get_contents_partial($url, $limit) {
  $writefn = function($ch, $chunk) use ($limit, &$datadump) { 
    static $data = '';

    $len = strlen($data) + strlen($chunk);
    if ($len >= $limit) {
      $data .= substr($chunk, 0, $limit - strlen($data));
      $datadump = $data;
      return -1;
    }
    $data .= $chunk;
    return strlen($chunk);
  };

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt ($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt ($ch, CURLOPT_REFERER, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt ($ch, CURLOPT_COOKIE, $cookie_string);     
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  

  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
  //curl_setopt($ch, CURLOPT_RANGE, '0-1000'); //not honored by many sites, maybe just remove it altogether.
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
  curl_setopt($ch, CURLOPT_WRITEFUNCTION, $writefn);
  $data = curl_exec($ch);
  curl_close($ch);
  return $datadump;
}


function getURL($url,$filename)
{

	$cookie_string = 'time:'.time();
	$useragent = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0';
	$timeout = 120;

	$ch = curl_init(); 
	curl_setopt ($ch, CURLOPT_URL,$url);  
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);      
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt ($ch, CURLOPT_MAXREDIRS, 5);
	curl_setopt ($ch, CURLOPT_REFERER, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt ($ch, CURLOPT_COOKIE, $cookie_string);     
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);  
	$output = curl_exec($ch);  
	curl_close($ch); 
	file_put_contents($filename,$output);
}


function ext($p)
{
	$f=basename($p);
	$e2=explode('?',$f);
	$e=explode('.',$e2[0]);
	$ext=end($e);
	return strtolower($ext);

}



function name($p)
{
	$f=basename($p);
	$e2=explode('?',$f);
	$e=explode('.',$e2[0]);
	$ext=end($e);
	return str_replace('.'.$ext,'',$e2[0]);

}


function videoScreen($video,$screenshot,$ss=1,$tw=320,$th=180 , $q=0)
{
	// shell command [highly simplified, please don't run it plain on your script!]
	shell_exec("ffmpeg -i ".escapeshellarg($video)." -an -ss $ss -q $q -crf $q -vframes 1 -y ".escapeshellarg($screenshot)." 2>&1");    

	if(getimagesize($thumbnail))
	{
		return true;
	}
		else
	{
		return false;
	}
}


function cropThumb($screenshot,$thumbnail,$tw=320,$th=180,$quality=100)
{
	try 
	{
		/* Read the image */
		$im = new imagick( $screenshot );
		$im->setImageCompressionQuality($quality);
		/* create the thumbnail */
		$im->cropThumbnailImage( $tw, $th );
		/* Write to a file */
		$im->writeImage( $thumbnail );
	}
	//catch exception
	catch(Exception $e) 
	{
		// echo 'Message: ' .$e->getMessage();
	}
}


function imageEnhance($screenshot,$quality=100)
{
	try 
	{
		/* Read the image */
		$im = new imagick( $screenshot );
		$im->setImageCompressionQuality(100);
		/* Write to a file */
		$im->writeImage( $screenshot );
	}
	//catch exception
	catch(Exception $e) 
	{
	echo 'Message: ' .$e->getMessage();
	}
}

function serveFile($path,$secs=86400)
{

	if(file_exists($path))
	{
		$seconds_to_cache = $secs;
		$fmtime = date ("r", filemtime ($path));
		$mime = mime_content_type($path);
		header('Content-Type: '.$mime);
		$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
		header("Expires: $ts");
		header("Pragma: cache");
		header("Cache-Control: max-age=$seconds_to_cache");
		header("Last-Modified: " . $fmtime);
		header("X-Sendfile: $path");
		header('Content-Disposition: inline; filename="'.basename($n).'"');
	}
		else
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		http_response_code(404);
		$ts = gmdate("D, d M Y H:i:s") . " GMT";
		header("Expires: $ts");
		header("Last-Modified: $ts");
		header("Pragma: no-cache");
		header("Cache-Control: no-cache, must-revalidate");
	}
}

function displayThumb($path,$secs=86400)
{
	if(file_exists($path))
	{
		$seconds_to_cache = $secs;
		$fmtime = date ("r", filemtime ($path));
		header("Expires: $ts");
		header("Pragma: cache");
		header("Cache-Control: max-age=$seconds_to_cache");
		header("Last-Modified: " . $fmtime);
	}
		else
	{
		$path='404.jpg';
		$seconds_to_cache=0;
		$fmtime = date ("r", time());
		header('HTTP/1.0 404 Not Found', true, 404);
		http_response_code(404);
	}

	header('Content-Type: image/jpeg');
	$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
	header("X-Sendfile: $path");
}


function byteConvert($bytes)
{
    if ($bytes == 0)
        return "0.00 B";

    $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    $e = floor(log($bytes, 1024));

    return round($bytes/pow(1024, $e), 2).$s[$e];
}





function remove_emoji($string) {

    // Match Emoticons
    $regex_emoticons = '/[\x{1F600}-\x{1F64F}]/u';
    $clear_string = preg_replace($regex_emoticons, '', $string);

    // Match Miscellaneous Symbols and Pictographs
    $regex_symbols = '/[\x{1F300}-\x{1F5FF}]/u';
    $clear_string = preg_replace($regex_symbols, '', $clear_string);

    // Match Transport And Map Symbols
    $regex_transport = '/[\x{1F680}-\x{1F6FF}]/u';
    $clear_string = preg_replace($regex_transport, '', $clear_string);

    // Match Miscellaneous Symbols
    $regex_misc = '/[\x{2600}-\x{26FF}]/u';
    $clear_string = preg_replace($regex_misc, '', $clear_string);

    // Match Dingbats
    $regex_dingbats = '/[\x{2700}-\x{27BF}]/u';
    $clear_string = preg_replace($regex_dingbats, '', $clear_string);

    return $clear_string;
}


function beautify_filename($filename) {
    // reduce consecutive characters
    $filename = preg_replace(array(
        // "file   name.zip" becomes "file-name.zip"
        '/ +/',
        // "file___name.zip" becomes "file-name.zip"
        '/_+/',
        // "file---name.zip" becomes "file-name.zip"
        '/-+/'
    ), '-', $filename);
    $filename = preg_replace(array(
        // "file--.--.-.--name.zip" becomes "file.name.zip"
        '/-*\.-*/',
        // "file...name..zip" becomes "file.name.zip"
        '/\.{2,}/'
    ), '.', $filename);
    // lowercase for windows/unix interoperability http://support.microsoft.com/kb/100625
    $filename = mb_strtolower($filename, mb_detect_encoding($filename));
    // ".file-name.-" becomes "file-name"
    $filename = trim($filename, '.-');
    return $filename;
}




function filter_filename($filename, $beautify=true) {
$filename=str_replace('%','-',$filename);
$filename=remove_emoji($filename);
$ext=ext($filename);
if($ext=='part'){$filename=str_replace('.part','',$filename);}
       // sanitize filename
    $filename = preg_replace(
        '~
        [<>:"/\\|?*]|            # file system reserved https://en.wikipedia.org/wiki/Filename#Reserved_characters_and_words
        [\x00-\x1F]|             # control characters http://msdn.microsoft.com/en-us/library/windows/desktop/aa365247%28v=vs.85%29.aspx
        [\x7F\xA0\xAD]|          # non-printing characters DEL, NO-BREAK SPACE, SOFT HYPHEN
        [#\[\]@!$&\'()+,;=]|     # URI reserved https://tools.ietf.org/html/rfc3986#section-2.2
        [{}^\~`]                 # URL unsafe characters https://www.ietf.org/rfc/rfc1738.txt
        ~x',
        '-', $filename);
    // avoids ".", ".." or ".hiddenFiles"
    $filename = ltrim($filename, '.-');
    // optional beautification
    if ($beautify) $filename = beautify_filename($filename);
    // maximize filename length to 255 bytes http://serverfault.com/a/9548/44086
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = mb_strcut(pathinfo($filename, PATHINFO_FILENAME), 0, 255 - ($ext ? strlen($ext) + 1 : 0), mb_detect_encoding($filename)) . ($ext ? '.' . $ext : '');
    return $filename;
}




