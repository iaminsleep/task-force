Set WshShell = CreateObject("WScript.Shell") 
WshShell.Run chr(34) & "C:\OpenServer\domains\TaskForce\update-task-status.bat" & Chr(34), 0
Set WshShell = Nothing