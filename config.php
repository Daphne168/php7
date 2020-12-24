<?php
// 以下四個值要依當時的開發環境而變動
define('DB_SERVERIP', 'db伺服器位置');         //db伺服器位置
define('DB_USERNAME', 'db使用者名稱');        //db使用者名稱
define('DB_PASSWORD', 'db使用者密碼');       //db使用者密碼
define('DB_DATABASE', 'db名稱');            //db名稱

define('SET_CHARACTER', 'set character set utf8mb4');   // utf8或big5或此列加註移除，有亂碼時，需要加這一串比較好

// 以下四個是可能發生錯誤時的處理
define('ERROR_CONNECT',   'Cannot connect server');  // 無法連接伺服器
define('ERROR_DATABASE',  'Cannot open database');  // 無法開啟資料庫
define('ERROR_CHARACTER', 'Character set error');  // 無法使用指定的校對字元集
define('ERROR_QUERY',     'Error in SQL Query');  // 無法執行資料庫查詢指令

// 以下是自定義的db_open函式的寫法
function db_open()
{
   $link = mysqli_connect(DB_SERVERIP, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(ERROR_CONNECT);
   if(defined('SET_CHARACTER')) mysqli_query($link, SET_CHARACTER) or die(ERROR_CHARACTER);
   return $link;
}

// 關閉db
function db_close($link)
{
   mysqli_close($link);
}

?>
