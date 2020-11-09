Gorilla Contact Form
================

Introduction
------------
This module gives you a signup form at https://domain.com/signup.  It requires magento 2.3 as 
I used dbschema.xml for creating the table in the DB.  The table name is gorilla_contact.

Installation:
---------------
1. Run ./bin/magento setup:upgrade
2. Run ./bin/magento setup:di:compile

Usage:
---------------
1. Go to the signup form and submit some email addresses.
2. Run ./bin/magento gorilla:export:contacts; to export contacts to the /var/export/ directory.  
   The filename created will have the following format: contacts-YYYY-mm-dd--HH-mm-ss.csv
   
