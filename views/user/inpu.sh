#!/bin/bash

read -p "yahya s7i7 : " yahya
echo $yahya

counter=1

while [ $counter -le 5 ]
do
    if [ "$yahya" = 'hola' ]
    then
        echo "fuck wiam"
    else
    echo $counter
        ((counter++))  # Increment counter
    fi
done
