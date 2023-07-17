<?php 

//2023 - Şeref Can Mertdoğan. Please give attribution if you're using my file uploader. I would be very happy.

//Error reporting on/off
//error_reporting(E_ALL); //Uncomment that first if you want error reporting.
ini_set('display_errors', 0); //Change it from 0 to 1 if you want error reporting.

//Here is the user defined settings.
$allowedExtensions = ['zip','rar','7z','img','webp','jpg','jpeg','gif','png','AppImage','pdf','mp3','mp4','tar.xz','bmp','iso','dmg']; //Allowed File extensions
$bannedExtensions = ['php','php3','js','xml','00','sh']; //Banned file extensions
$mainurl = "https://webdeindir.com"; //You need to write the url which this uploader being hosted. If you host in https//yabadabadoohappyhosts.com , then you need to write that domain to there.
$uploadDirectory = 'testDir/';
$maxFileSize = 1048576000; //Maximum file size calculated in bytes. Default is 100mb. But please, make sure that it is not bigger than your php.ini max file upload setting.







//If you don't know what you're doing, DO NOT TOUCH ANYTHING BELOW THIS LINE!!!!!
//If you touch, it will break the website.

$fileeex = "filetoupload"; // - Variable for file download form in index.php
$pobierz = "index.php";  // - Variable for form download action
$slavemaster = "file.php";  // - Variable for redirecting 
?>