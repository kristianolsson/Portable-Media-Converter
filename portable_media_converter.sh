#!/bin/sh

DIR="/media/android/"

for f in `find $DIR \( -iname '*.avi' -o -iname '*.mkv' \)`
do
  if [ ! -e "$f.mp4" ]
  then
#    echo "$f reday to convert"
    HandBrakeCLI -i $f -o $f.tmp --preset="iPhone & iPod Touch"
    mv $f.tmp $f.mp4
  fi
done

