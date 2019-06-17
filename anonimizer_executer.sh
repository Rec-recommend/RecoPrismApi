#!/bin/bash
cd /var/www/recoprism/lib/
source ./venv/bin/activate
printf `python3 /var/www/recoprism/lib/python.py $1`
