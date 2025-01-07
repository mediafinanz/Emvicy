#!/bin/bash

MODULENAME="$(basename "$(pwd)")";
sHere=`pwd`;
sAppRoot=`realpath "../../"`;
sModuleDir=`realpath "../../modules/"`;
xGit=`type -p git`;
xPhp=`type -p php`;

#------------------------------------------------------------
# read .env
. ../../.env;

#------------------------------------------------------------
# maintenance

echo -e "\ninstalling...";
cd "$sAppRoot";

# maintenance file
#/usr/bin/touch 'maintenance';

#------------------------------------------------------------
# public files
cd "$sHere";
. _publish.sh

#------------------------------------------------------------
# install modules via git

echo "install modules via git...";
cd "$sModuleDir";

# Paginator
$xGit clone --branch 2.x \
https://github.com/emvicy/Paginator.git \
Paginator;

#------------------------------------------------------------
# done

cd "$sAppRoot";

# clear cache
$xPhp emvicy cc;

# datatypes
$xPhp emvicy dt;

cd "$sHere";
echo -e "installing complete.\n\n";
