#!/bin/bash
File_Name="/home/$(whoami)/Desktop/log_dump.csv" 
#location of the file that is to be saved
[ -f $File_Name ] && rm $File_Name

find  /var/log -name '*.log' -type f  | while read line;
	do
	FILESIZEINGB=$(ls -lah "$line" | awk '{print $5}') 
  	echo "${line##*/}, $FILESIZEINGB"  >> $File_Name
done
