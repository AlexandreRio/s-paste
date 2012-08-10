#!/bin/bash
#
# Minimalistic pastebin tool, uploads file and return a link.
# The server part can be found here:
# https://github.com/AlexandreRio/s-paste
#
# /!\ Don't forget to edit the url /!\
#############################################################
#         By Alexandre Rio / Orbital
# http://alexrio.fr/	https://twitter.com/Rio_Alexandre
#############################################################
#
#    See LICENSE file for copyright and license details
#
#############################################################

help="Usage: \n- ./spaste [you can write an URL here]\n- ./riopaste -f
file/path/here"
url="alexrio.fr/p/"

if [ $# -eq 2 ] && [ $1 = '-f' ]
then
   curl -d "data=`cat $2`" $url
elif [ $# -eq 1 ] && [ $1 = '--help' ]
then
   echo -e $help
elif [ $# -eq 1 ]
then
   curl -d "data=$1" $url
else
   echo -e $help
fi
