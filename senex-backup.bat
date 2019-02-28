set jahr=%date:~-4%
set monat=%date:~-7,2%
set tag=%date:~-10,2%

cd c:\laragon\bin\mysql\mysql-5.7.19-winx64\bin
mysqldump -u root  senex > c:\Dropbox\Senex-Solution\Datenbank-Backup_%jahr%-%monat%-%tag%.sql

robocopy c:\laragon\www\senex-solutions\public\Fahrtenauflistungen\ c:\Dropbox\Senex-Solution\Fahrtenauflistungen\ /mir
robocopy c:\laragon\www\senex-solutions\public\Rechnungen\ c:\Dropbox\Senex-Solution\Rechnungen\ /mir
robocopy c:\laragon\www\senex-solutions\public\Gutschriften\ c:\Dropbox\Senex-Solution\Gutschriften\ /mir
robocopy c:\laragon\www\senex-solutions\public\uploads\ c:\Dropbox\Senex-Solution\uploads\ /mir
