#!/bin/bash
#echo "Hello World"
app/console cache:clear
chmod -R 777 app/cache
echo "Cache cleared"

