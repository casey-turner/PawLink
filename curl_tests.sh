#!/bin/bash
echo 'WEB SERVICE REQUEST TESTS'

curl "http://pawlink.caseyturner.com.au/?controller=search&action=get_walkers"
echo ''
curl --data "useremail=g.thompson@example.com&password=asdfasdf" http://pawlink.caseyturner.com.au/?controller=users&action=login
echo ''
curl --data "firstname=asdf&lastname=asdf&useremail=g.thompson@example.com&phone=0425771221&address=asdf&suburb=asdf&state=asw&postcode=4151&password=asdfasdf&confirmpassword=asdfasdf" http://pawlink.caseyturner.com.au/?controller=users&action=register
echo ''
