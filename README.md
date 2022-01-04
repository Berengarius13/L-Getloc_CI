# CodeIgniter 

##### Controllers => Welcome.php

1. We will change it's name and add PHP files as global variable.  

   ```
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
   				'created_at' => date('Y-m-d H:i:s'), // Notice we add this value here
   				'created_ip_address' => ip_address(), // Notice we have called another function
   												// This function is in helper.php
   			);
   			$res = $this->Md_database->insertData(RESULT_INFO, $data['info']); // We use this to add
   																				it to database
                    // WE have defined this function in models => MD_database.php                                                               
   
   			$jdata = json_encode($data);
   
   			$f = fopen('result.txt', 'w+');
   			fwrite($f, $jdata);
   			fclose($f);
   		}
   	}
   ```

   

2. We will change "welcome_message" with location of " Views => welcome_message(rename it)"

***

###### Views => welcome_message.php

We will add index.html files all content here. 

***

##### To add resources

We will create a assets folder in application. We will add all the necessary files here. 

***

##### To link resource 

example let's say we have to link application/assets/css/main.css. 

<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>assets/css/main.css">

> <?= site_url(); ?>assets/                                We will add this in front of all links. 

> url("../images/googlelogo_color_116x41dp.png")                       We will add this to link pic in main.css

***

##### config => autoload.php

> $autoload['libraries'] = array('database');     //  we need to add this path
>
> $autoload['helper'] = array('url', 'file', 'form', 'download', 'common_helper'); // We need to add this these are built in. 
>
> $autoload['model'] = array('Md_database'); // We will make changes like this here.
>
> ​				// Notice we have defined this in models => Md_database.php

***

##### config => config.php 

```php
$config['base_url'] = '';
is replaced with 
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . @$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
$config['base_url'] = $base_url
// This is standard
```

> $config['index_page'] = '';

***

#### config => constants.php

> defined('RESULT_INFO')    or define('RESULT_INFO', 'result_info'); 

We will add this line 

***

#### config => database.php

>   'hostname' => 'localhost',
>
>   'username' => 'root',
>
>   'password' => '',
>
>   'database' => 'location_software', // name of location software 
>
> // We will change this, we just add database access information

***

***

#### phpMyAdmin

1. We will create a database with a name "location_software"
2.  We will create different rows in it. 

| #    | Name                                                         | Type         | Collation          | Null | Default | Extra          |
| ---- | ------------------------------------------------------------ | ------------ | ------------------ | ---- | ------- | -------------- |
| 1    | id                                        ![Primary](http://localhost/phpmyadmin/themes/dot.gif) | int(11)      |                    | No   | *None*  | AUTO_INCREMENT |
| 2    | lat                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 3    | lon                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 4    | acc                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 5    | alt                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 6    | dir                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 7    | spd                                                          | varchar(50)  | utf8mb4_general_ci | Yes  | *NULL*  |                |
| 8    | created_at                                                   | date         |                    | Yes  | *NULL*  |                |
| 9    | created_ip_address                                           | varchar(100) | utf8mb4_general_ci | Yes  | *NULL*  |                |

3. We will create the Name of row as columns and store variables there.

***

#### config => routes.php

we will add (remember we have defined global php functions)

```
$route['result-php'] = 'Location/load_result';
$route['error-php'] = 'Location/load_error';
$route['info-php'] = 'Location/load_info';
```



##### views => locatoin_view.php

> here for where we used to give /php/error.php 
> WE WILL REPLACE THAT WITH 

```
url: "<?= site_url('error-php'); ?>",
url: "<?= site_url('result-php'); ?>",
url: "<?= site_url('result-php'); ?>",
```

***

#### helpers => common_helper.php

We have created this new file, it's contents are

```
<?php ob_start();
if (!function_exists("ip_address")) {
    function ip_address()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP']; // Getting HTTP Client IP Address
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']; // Getting HTTPX FORWARDED FOR Address
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED']; // Getting HTTPX FORWARDED Address
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR']; // Getting HTTP FORWARDED FOR Address
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED']; // Getting HTTP FORWARDED Address
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR']; // Getting REMOTE ADDR Address
        else
            $ipaddress = 'UNKNOWN'; // Getting UNKNOWN Address
        return $ipaddress;
    }
}
```

***

#### models => Md_database.php 

we have created this new file, we will add contents here

```
<?php

class Md_database extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //          date_default_timezone_set('Asia/kabul');
        date_default_timezone_set('Asia/Kolkata');
    }

    //function for inserting data into database
    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        // Why die here?
        die;
        $this->db->trans_complete();
        return $this->db->insert_id();
    }
}
We have used sql here to store data in database
```

***

#### We need to create .htaccess file 

// We are basically redirecting to the controller  

```
<IfModule mod_rewrite.c>
RewriteEngine On
#RewriteBase /JB042/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php [L]
</IfModule>
```

fill this inside

***

* Good rule of thumb is to keep controllers plural and models singular 
* In controllers we will set the 

```
class Location extends CI_Controller {}
// WE will set this class 
```

* What we are doing here is to set site.com/{this}/{that}
* So we are basically setting this and that properly. 
* We create a views then set its controller and routes

***

#### Dashboard

* To create dashboard we first set routes for when we search "link/admin" and "admin/logout"
* We create controller named "Admin" and we will define relevant PHP functions in the path
* We will create views folder for admin.

> We have used @ when an undefined variable error came "Message: Undefined index: "
>
> or by switching from development to production mode

* Find 'href' and 'src=' and replace with "src="<?php echo base_url();?>assets/admin/"

```php
 <?php// verify the user login infosession_start();/*Some predefined variables in PHP are "superglobals", which means that they are always accessible, regardless of scope - and you can access them from any function, class or file without having to do anything special.*/$_SESSION['username'] = "harry";$_SESSION['favCat'] = "Books";echo "we have saved your session";?>    // Later we will access it in other file as<?php  session_start();     echo "welcome". $_SESSION['username'];?>    // Later we will log out by<?php   session_start();    session_unset();    session_destroy();?>        // use isset($_SESSION['username']) to check wether session is set or not otherwise give error please log in to coninue     phpphp
```

***

#### IMPORTANT

Usually in PHP we will divide page in sections
