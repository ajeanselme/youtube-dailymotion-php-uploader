# youtube-dailymotion-php-uploader


**A simple web interface made in php to upload videos to Youtube and Dailymotion.**

*Disclaimer: this project has been made in a short time to answer my needs in a personal project. It's not optimized and no support will be provided.*



## Setup

- Download the Google php api (be sure to have the Service/Youtube.php as specified in the conf)
- Download the Dailymotion sdk
- Setup the paths in config.php
- Fill your API keys in the config.php
- Get your Google OAuth ID here https://console.developers.google.com/
- Find your Dailymotion API keys in your settings.

- Setup your database access in DB.class.php and create your table with the SQL request.

- Don't forget to create 2 folders, videos/ and miniatures/ as they will temporary store the uploaded files. And remember to give access to everything to your www user, each. freaking. time. 

You can now access index.php, go through the process, and debug your errors in the apache logs. Enjoy.
