#!/bin/bash
# Designed to be run from the top level of the repo as `./deply/restart-services.sh`
ansible-playbook -i deploy/vagrant deploy/restart-services.yml
