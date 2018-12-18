#!/bin/bash

# Set permalinks
vagrant ssh -c 'wp rewrite structure "/%year%/%monthnum%/%postname%"'

# Activate basic-auth plugin
vagrant ssh -c 'wp plugin activate basic-auth'

# Clear out dummy content ("hello world" post, "sample page", and "privacy policy")
vagrant ssh -c '
wp post delete 1 --force
wp post delete 2 --force
wp post delete 2 --force
'

# Create subscriber, author & editor users, for roles testing
vagrant ssh -c '
wp user create subscriber subscriber@wpapi.local --role=subscriber --user_pass=password --display_name=Subscriber
wp user create author author@wpapi.local --role=author --user_pass=password --display_name=Author
wp user create editor editor@wpapi.local --role=editor --user_pass=password --display_name=Editor
'
