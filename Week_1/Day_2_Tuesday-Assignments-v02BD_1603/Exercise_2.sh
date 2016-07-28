#!/bin/bash

Harddisk=""
Threashold_Disk=90
Threashold_Ram=85
Memory_usage=$( free -m| grep  Mem | awk '{ print int($3/$2*100) }')
grep_path="^/"

for line in $(df -h | awk '{ print $6 "_:_" $5 }' | grep $grep_path )
 do
	part=$(echo "$line" | awk -F"_:_" '{ print $1 }')
	part_usage=$(echo "$line" | awk -F"_:_" '{ print $2 }' | cut -d'%' -f1 )
	#the below if statment is used to compare all types of numbers even float
	if (( $(echo "$part_usage > $Threashold_Disk" | bc -l) ));
 	 then
		Harddisk="ALARM: Disk $part is at $part_usage%"
		echo $Harddisk
	fi
done 

if (( $(echo "$Memory_usage > $Threashold_Ram" | bc -l) ));
 then
 	echo "ALARM: Virtual Memory is at $Memory_usage"  
 else
 	Memory_usage=""
fi

if [ -z "${Memory_usage// }" ]&&[ -z "${Harddisk// }" ];
 then
	echo "Everything is OK"
fi
