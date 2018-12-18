#!/bin/bash

# Set permalinks
vagrant ssh -c 'wp rewrite structure "/%year%/%monthnum%/%postname%"'

# Clear out dummy content
vagrant ssh -c '
wp post delete $(wp post list --format=ids) --force
wp post delete $(wp post list --format=ids --post_type=page) --force
'

# Create subscriber, author & editor users, for roles testing
vagrant ssh -c '
wp user create subscriber subscriber@wpapi.local --role=subscriber --user_pass=password --display_name=Subscriber
wp user create author author@wpapi.local --role=author --user_pass=password --display_name=Author
wp user create editor editor@wpapi.local --role=editor --user_pass=password --display_name=Editor
'
