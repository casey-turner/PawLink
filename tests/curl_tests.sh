#!/bin/bash
echo 'WEB SERVICE REQUEST TESTS'

curl "http://pawlink.caseyturner.com.au/?controller=search&action=get_walkers"
echo ''
curl -X POST -d "useremail=test@example.com&password=test123&method=ajax" "http://pawlink.caseyturner.com.au/?controller=users&action=login"
echo ''
curl -X POST -d  "firstname=asdf&lastname=asdf&useremail=g.thompson@example.com&phone=0425771221&address=asdf&suburb=asdf&state=asw&postcode=4151&password=asdfasdf&confirmpassword=asdfasdf&method=ajax" "http://pawlink.caseyturner.com.au/?controller=users&action=register"
echo ''
