## Model 

* There would be a login system in dashboard for admin. 
* There would be for 4 options 
* One in which we will view the cumulative report of a particular IP address
  * A map will be provided here. 
  * A drop down menu will be provided for IP address and we will be able to search and find the IP here too. 

* In other 3 we will plainly view the tables 
  * Searching and sorting capabilities would be provided with ability to delete the specific rows. 
* A "Mark as important"  option will be provided to store cumulative information of particular IP address.  
* Option to get location by IP address. 



Given below are three table we will implement in admin panel.

###### ***device info***

| ID                                         | INT     |
| ------------------------------------------ | ------- |
| Platform []                                | varchar |
| Browser                                    | varchar |
| Cores []                                   | varchar |
| RAM []                                     | varchar |
| Vendor []                                  | varchar |
| Render []                                  | varchar |
| HT []                                      | varchar |
| OS                                         | varchar |
| Created_at                                 | Date    |
| Created_IP_address // Least time in router | varchar |
| MAC and IMEI                               |         |

###### ***result_info*** 

| ID                 | INT     |
| ------------------ | ------- |
| Lat                | varchar |
| Lon                | varchar |
| Alt                | varchar |
| Dir                | varchar |
| Sped               | varchar |
| Created_at         | Date    |
| Created_ip_address | varchar |

###### ***error_info*** 

| ID                 | INT     |
| ------------------ | ------- |
| Denied             | varchar |
| Unavailable        | varchar |
| Timeout            | varchar |
| Unknown            | varchar |
| Support            | varchar |
| Created_at         | Date    |
| Created_ip_address | varchar |



1. OSI layer study. 

* Work on duplicate cases, when trying to delete an empty table and 







