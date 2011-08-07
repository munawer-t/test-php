<? 
echo "Welcome to My Area - -- hey";
function do_post_request($url, $data, $optional_headers = null)
{
  $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url");
  }
  return $response;
}
$url="http://www.indianrail.gov.in/cgi_bin/inet_pnrstat_cgi.cgi";
$data=array('lccp_pnrno1'=>'433','lccp_pnrno2'=>'123123'>,'submitpnr'=>'Get Status','Submit2'=>'Clear');
$result=do_post_request($url, $data, $optional_headers = null);
print_r($result);
?>
