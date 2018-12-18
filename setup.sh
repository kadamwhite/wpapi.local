#!/bin/bash

# Set permalinks
vagrant ssh -c 'wp rewrite structure "/%year%/%monthnum%/%postname%"'

# Activate basic-auth plugin
vagrant ssh -c 'wp plugin activate basic-auth'
