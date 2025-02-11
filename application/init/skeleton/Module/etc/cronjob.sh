#!/bin/bash

#=======================================================================================================================
# read env file
. ../../../.env;

# calling from dir
sCalledFrom=`/usr/bin/pwd`;
# absolute path to this file itself
sHereDir=$(dirname -- "$0");
sHereDirAbs=`realpath "$sHereDir"`;
sBaseDirAbs=`realpath "$sHereDir/../../../"`;
# this file's name
sThisFile=$(basename "$0");
# php binary
xPhp=`type -p php`;
#=======================================================================================================================

cd "$sBaseDirAbs";

# @see etc/config/{module}/config/_cron.php
# @see etc/config/{module}/config/_queue.php
$xPhp emvicy cron:run > /dev/null 2>/dev/null & echo $!
