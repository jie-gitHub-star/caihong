项目目录结构类似tp5.0；

；1、克隆下项目后，放到网站根目录下

；2、导入sql数据库文件

；3、修改根目录下databases.php文件，是pdo来的

 `<?php`

`define('HOST', '127.0.0.1');`
`define('USER', 'root');`
`define('PASS', '');`
`define('DB', 'project01');`
`define('DSN',sprintf('mysql:host=%s;dbname=%s;charset=utf8;port=3306',HOST,DB));`
`define('DEBUG', false);`



;4、然后按照剧情，这个时候应该可以正常跑起来了；win系统下是如此，但在服务器上，却是报了个找不到类的错误。道行太浅，解决不了