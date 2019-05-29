#!/bin/bash
LIGHTRED='\033[1;31m'
LIGHTGREEN='\033[1;32m'
LIGHTCYAN='\033[1;36m'
LIGHTGRAY='\033[0;37m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
LIGHTPURPLE='\033[1;35m'
GREEN='\033[0;32m'


NC='\033[0m'

USER=`cat .env | grep "DB_USERNAME" |awk -F '=' {'print $2'}`
PASS=`cat .env | grep "DB_PASSWORD" |awk -F '=' {'print $2'}`
clean(){
    count=0
    DB_NAMES=`mysql -u $USER -p$PASS -e "show databases" 2>/dev/null | grep "tn_"`
    count=`echo $DB_NAMES | wc | awk {'print $2'}`
    if (( $count < 1 ))
    then
        printf "    ${LIGHTPURPLE} - No databases found\n" 
        return 
    fi
    for DB_NAME in $DB_NAMES ; 
    do 
        # printf "    ${LIGHTRED}Deleting ${LIGHTCYAN}$DB_NAME${NC}"
        sql_cmd="DROP DATABASE $DB_NAME"
        mysql -u $USER -p$PASS -e "$sql_cmd" 2>/dev/null
            # printf "${LIGHTGREEN} -> Deleted${NC}"
        # if [ $? -eq 0 ]
        # then 
        # fi
    done

    return 0
}
format(){
    printf "    ${LIGHTPURPLE} => [ %-10s || %-2s ]: ${LIGHTGREEN}%-10s\n" "$1 " "$2" "$3" 
}

help(){
    format "--help" "-h" "Displays available commands"
    format "--clean" "-c" "Deletes all tenant dbs that has the tn_ prefix"
    format "--samurai" "-s" "Deletes all tn_dbs migrate and seed"
}

invalid(){
    printf "    ${RED}!! INVALID PARAMATERS ${NC} ${GREEN} -h for help\n"
}

samurai_format(){
    printf "    ${LIGHTPURPLE} %-10s" "$1"  
}
success(){
    printf "${LIGHTPURPLE}=> ${LIGHTGREEN}Done\n"  
}
samurai(){
    samurai_format "Cleaning"
    clean 
    success
    samurai_format "Migration"
    php artisan migrate:fresh | 0>/dev/null
    success
    samurai_format "Seeding"
    php artisan db:seed | 0>/dev/null
    success
}
if [ -z $1 ]
then 
    invalid
elif [ $1 == '--help' ] || [ $1 == '-h' ] 
then 
    help
elif [ $1 == '--samurai' ] || [ $1 == '-s' ] 
then 
    samurai
    exit 0
elif [ $1 == '--clean'  ] || [ $1 == '-c' ]
then
    clean
    exit 0
else
    invalid
    exit 1
fi

