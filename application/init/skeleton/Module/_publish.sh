#!/bin/bash

MODULENAME="$(basename "$(pwd)")";
xCp=`type -p cp`;

#------------------------------------------------------------

/bin/echo "copying public Data...";

# copy
$xCp -r ./etc/_INSTALL/public/*			../../public/

/bin/echo -e "...done!\n\n";