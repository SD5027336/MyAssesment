@ECHO OFF
SET BROWSER=iexplore.exe
SET BROWSER=firefox.exe
SET BROWSER=chrome.exe
SET WAIT_TIME=2
START %BROWSER% -new-tab "http://localhost/Visitor/"
@ping 127.0.0.1 -n %WAIT_TIME% -w 1000 > nul
pause
