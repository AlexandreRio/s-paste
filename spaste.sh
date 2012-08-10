#!/bin/bash
#

help="Usage: \n- ./riopaste [you can write an URL here]\n- ./riopaste -f
file/path/here"

if [ $# -eq 2 ] && [ $1 = '-f' ]
then
   curl -d "data=`cat $2`" alexrio.fr/p/
elif [ $# -eq 1 ] && [ $1 = '--help' ]
then
   echo -e $help
elif [ $# -eq 1 ]
then
   curl -d "data=$1" alexrio.fr/p/
else
   echo -e $help
fi
