### Synopsis

ping [-c *count*] [-i *interval*]  *destination*

### Options

-c *count*: Stop after sending *count* ECHO_REQUEST packets (default is 3).

-i *interval*: Wait *interval* seconds between sending each packet (default is 1 second).

### Examples

Access to raw sockets on UNIX like systems requires root access.

 ```shell
  sudo php ping.php google.com
 ```
 
 ```shell
  sudo php ping.php -c 10 -i 2 google.com
