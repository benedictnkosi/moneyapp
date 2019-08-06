'read file for a list of directory to monitor for changes

projectFolder = "C:\xampp\htdocs\moneyapp_doctrine\"
'filename with the folder paths to monitor
filename = "config.txt"

'only files that {last modiefied date}  - {today's date} <= {daysToUpload}. 
'to upload only todays changes set it to 0 and 1 for today and yesterdays changes 
daysToUpload = 1


Dim objShell
Set objShell = WScript.CreateObject ("WScript.shell")

'read all the folders to monitor from the config file
Set fso = CreateObject("Scripting.FileSystemObject")
Set f = fso.OpenTextFile(filename)
Do Until f.AtEndOfStream
	Dim strFilesToCopy
	strFolderpath = f.ReadLine
	
	'get all the files from the folder
	Set objFolder = fso.GetFolder(strFolderpath)
	Set colFiles = objFolder.Files
	
	'on ftp, to cd to directory you must use relative path eg  /src/controller/ . 
	'we are trying to get the relative path from the service_broker_doctrine folder (rootfoler)
	relativePathToCopyTo = Replace(strFolderpath,projectFolder,"")
	relativePathToCopyToArray=Split(relativePathToCopyTo,"\")
	formatedRelativePathToCopyTo = "/public_html/moneyapp/"
	For Each folderName In relativePathToCopyToArray
		formatedRelativePathToCopyTo = formatedRelativePathToCopyTo + folderName + "/"
	Next
	
	'go through each file and check if the lastchanged timestamp is less than the days specified by daysToUpload variable
	For Each objFile In colFiles
		Dim lastModified
		lastModified = CDate(objFile.DateLastModified)
		Dim lastModifiedDiff
		lastModifiedDiff = DateDiff("d",lastModified,Date)
		
		If lastModifiedDiff <=  daysToUpload Then
			'add this to the string for files to ftp
			If InStr(objFile.Path, "bootstrap.php") < 1 and InStr(objFile.Path, "parameters.yml") < 1 and InStr(objFile.Path, "application.php") < 1  Then
				strFilesToCopy = strFilesToCopy + objFile.Path + " "
			end if
		End If 
	Next
	
	'run the command to ftp everything in strFilesToCopy
	Return  = objShell.Run("cmd /c fileup " +  formatedRelativePathToCopyTo + " " + strFilesToCopy, 0, true)
	
	'this for outputing to screen a list of FTPd files
	strFilesToCopyOutput=Split(strFilesToCopy," ")
	WScript.Echo "Files Copied: "
	For Each strFilesToCopyOutputFile In strFilesToCopyOutput
		WScript.Echo strFilesToCopyOutputFile
	Next
	
	'reset strFilesToCopy and formatedRelativePathToCopyTo
	formatedRelativePathToCopyTo = ""
	strFilesToCopy = ""
	
Loop

f.Close