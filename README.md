# WPAPI Vagrant Varietal

This is a Vagrant configuration for rapidly spinning up a [WordPress REST API](https://github.com/wp-api/wp-api)-enabled WP instance within a local virtual machine. As the name indicates, this project was inspired by [VVV](https://github.com/varying-vagrant-vagrants/vvv/tree), but is a completely new VM configuration using [Ansible]() for provisioning (with a little help borrowed from the Roots team's [trellis](https://github.com/roots/trellis) WP environment management tools and [this blog post](https://lamosty.com/2015/04/automated-wordpress-installation-with-ansible/)).

## Installation Dependencies

In order to create the virtual machine, you must first install a few things:

- VirtualBox 5 or later
    + Download at https://www.virtualbox.org/ (All Platforms)
    + `brew install caskroom/cask/brew-cask && brew cask install virtualbox` via [homebrew](http://brew.sh/) (OSX)
- Vagrant 1.7.4 or later
    + Download at http://www.vagrantup.com/ (All Platforms)
    + `brew install caskroom/cask/brew-cask && brew cask install vagrant` via [homebrew](http://brew.sh/) (OSX)
- vagrant-hostsupdater plugin
    + Download at https://github.com/cogitatio/vagrant-hostsupdater (All Platforms)
    + or, `vagrant plugin install vagrant-hostsupdater`
- Ansible 1.9.4 or later
    + `pip install ansible` via [pip](http://pip.readthedocs.org/en/latest/installing.html) (All Platforms)
    + `brew install ansible` via [homebrew](http://brew.sh/) (OSX)
    + `apt-get install ansible` or `yum install ansible` (Linux)

## Getting Started

Run the following terminal command from within the repository folder:

```
vagrant up
```

This will create, provision and configure the server, then install a basic set of WordPress sample post data.

## Running Specific Playbooks

The provisioning of the machine is broken up into playbooks. The initial provisioning process will execute all playbooks necessary to set up the environment. To run a specific playbook at a later time, for example to execute the WordPress provisioning steps without re-running all of the server setup tasks as well, execute the following command directly from the root of the repository:

```sh
ansible-playbook -i deploy/vagrant deploy/wordpress.yml
```
