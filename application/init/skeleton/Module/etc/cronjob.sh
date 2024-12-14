#!/bin/bash

#=======================================================================================================================
# read env file
. ../../../.env;

# calling from dir
sCalledFrom=`/usr/bin/pwd`;
# absolute path to this file itself
sHereDir=$(dirname -- "$0");
sHereDirAbs=`realpath "$sHereDir"`;
sPublicDirAbs=`realpath "$sHereDir/../../../public"`;
# this file's name
sThisFile=$(basename "$0");
# php binary
xPhp=`type -p php`;
#=======================================================================================================================

cd "$sPublicDirAbs";

# für alle aufgerufenen Jobs
# @see etc/config/{module}/config/_cron.php
$xPhp index.php '/cron/run' > /dev/null 2>/dev/null & echo $!
