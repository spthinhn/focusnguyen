<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\View\View;
use Cake\View\Helper\HtmlHelper;
use Cake\Event\Event;
use Cake\Routing\Router;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class ActionController extends AppController
{
	public function checkurlCSV($forum, $url)
	{
		$result = false;
		$html = $this->get_dataa($forum);
		$number = strpos($html, $url);

		if ($number == 0) {
		 	$result = false;
		}else {
		 	$result = true;
		}
		return $result;
	}

	public function getDataFile()
	{
		if($_POST['action'] == "start") {
			$kq = array();
			$filename = $_POST['filename'];
			$number = $_POST['number'];
			$file = WWW_ROOT.'/files/csv/'.$filename;
			$content = file_get_contents($file);
			$arrContent = explode("\n", $content);
			$arrContent[$number] = str_replace('"','', $arrContent[$number]);
			$format = explode(",",$arrContent[$number]);
			$forum = preg_replace('/\s+/','', $format[1]);
			$url = preg_replace('/\s+/','', $format[2]);
			$result = $this->checkurlCSV($forum, $url);
			if ($result) {
				$this->createfileCSV($filename, $arrContent[$number], "success");
			} else {
				$this->createfileCSV($filename, $arrContent[$number], "wrong");
			}
			$kq['result'] = $result;
			$kq['stt'] = $number;
			$kq['forum'] = $forum;
			$kq['url'] = $url;
			echo json_encode($kq);

		} else if($_POST['action'] == "pause") {
			echo "pause";
		}
	}

	public function checkFormatFileCSV()
	{
		$result = array();
		if (!empty($_POST['filename'])) {
			$filename = $_POST['filename'];
			$file = WWW_ROOT.'/files/csv/'.$filename;
			$content = file_get_contents($file);
			$arrContent = explode("\n", $content);
			$arrContent[0] = str_replace('"','', $arrContent[0]);
			$format = explode(",",$arrContent[0]);
			if (trim($format[0]) === "STT" && trim($format[1]) === "FORUM" && trim($format[2]) === "URL" ) {
				$result['flag'] = true;
				$this->createfileCSV($filename, $arrContent[0], "success");
				$this->createfileCSV($filename, $arrContent[0], "wrong");
				$result['length'] = count($arrContent)-1;
			} else {
				unlink($file);
				$result['flag'] = false;
			}
		}
		echo json_encode($result);
		exit;
	}

	public function get_dataa($url) 
	{
	  $ch = curl_init();
	  $timeout = 10;
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
	  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	  $data = curl_exec($ch);
	  curl_close($ch);
	  return $data;
	}

	public function createfileCSV($filename, $data, $prefix)
	{
		$dir = WWW_ROOT.'/files/csv/export/';
		$md5 = md5($prefix."_".$filename);
		$file = fopen($dir.$md5.".csv","a");
	  	fputcsv($file,explode(',',$data));
		fclose($file);
	}

	public function downloadfileCSV($prefix, $filename)
	{
	
			$md5 = md5($prefix."_".$filename);
			$file = WWW_ROOT.'/files/csv/export/'.$md5.'.csv';
			if (file_exists($file)) {
			    header('Content-Description: File Transfer');
			    header('Content-Type: application/octet-stream');
			    header('Content-Disposition: attachment; filename="'.$prefix.'.csv"');
			    header('Expires: 0');
			    header('Cache-Control: must-revalidate');
			    header('Pragma: public');
			    header('Content-Length: ' . filesize($file));
			    readfile($file);
			}
			exit();
	
	}

}