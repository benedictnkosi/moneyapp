@echo off
echo whyaguyl>> ftpcmd.dat
echo jq24HEk9fz3^>> ftpcmd.dat
echo bin>> ftpcmd.dat
echo cd %1>>ftpcmd.dat
SHIFT


:TOP

IF (%1) == () GOTO END
ECHO %1
echo put %1>> ftpcmd.dat

SHIFT
GOTO TOP

:END


echo quit>> ftpcmd.dat
ftp -n -s:ftpcmd.dat ftp.whyage65.co.za
del ftpcmd.dat