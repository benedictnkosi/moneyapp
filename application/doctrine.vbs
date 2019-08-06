Dim ProjectDir
Dim cmdString
Dim result

'update as per your local directories
Dim WshShell
Set WshShell = WScript.CreateObject("WScript.Shell")
ProjectDir   = WshShell.CurrentDirectory

Set objShell = Nothing


'. open all entities created "C:\xampp\htdocs\soccer\src\appbundle\Entity" with notepad++. 
'Replace
'“namespace AppBundle\Entity;” with “//namespace AppBundle\Entity;”
'“AppBundle\Entity\” with “”

Const ForReading = 1
Const ForWriting = 2

Set objFSO = CreateObject("Scripting.FileSystemObject")

objStartFolder = ProjectDir + "\src\Appbundle\Entity"

Set objFolder = objFSO.GetFolder(objStartFolder)

Set colFiles = objFolder.Files
For Each objFile in colFiles
    'Wscript.Echo objFile.Name
    Dim Filename
    Filename = objFile.Name
    
    Set objFile = objFSO.OpenTextFile(objStartFolder + "\" + Filename, ForReading)

	strText = objFile.ReadAll
	objFile.Close
	
	strNewText = Replace(strText, "namespace AppBundle\Entity;", "")
	strNewText = Replace(strNewText, "AppBundle\Entity\", "")
	
	Set objFile = objFSO.OpenTextFile(objStartFolder + "\" + Filename, ForWriting)
	objFile.WriteLine strNewText
	objFile.Close
Next

Wscript.Echo "remove namespace from entity files complete"

'. open all xml config files created "C:\xampp\htdocs\soccer\config\xml" with notepad++. 
'Replace
 '“AppBundle\Entity\” with “”


Set objFSO = CreateObject("Scripting.FileSystemObject")

objStartFolder = ProjectDir + "\src\AppBundle\Resources\config\doctrine"

Set objFolder = objFSO.GetFolder(objStartFolder)

Set colFiles = objFolder.Files
For Each objFile in colFiles
    'Wscript.Echo objFile.Name
    Filename = objFile.Name
    
    Set objFile = objFSO.OpenTextFile(objStartFolder + "\" + Filename, ForReading)

	strText = objFile.ReadAll
	objFile.Close
	
	strNewText = Replace(strText, "AppBundle\Entity\", "")
	
	Set objFile = objFSO.OpenTextFile(objStartFolder + "\" + Filename, ForWriting)
	objFile.WriteLine strNewText
	objFile.Close
Next

Wscript.Echo "remove namespace from config files complete"