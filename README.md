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
Or, to run the WordPress provisioner _without_ executing the default DB/content reset:
```sh
ansible-playbook -i deploy/vagrant deploy/wordpress.yml --extra-vars "wp_empty_db=false"
```

## Using Development Builds

**NOTE:** By default wpapi-vagrant-varietal uses WP stable. The VM can also be configured to use the _nightly_ release WordPress. This allows client development to track against the latest & greatest, and also be tested against the stable releases.

### WP Stable vs Nightlies

To run the nightly WP build instead of the latest stable release, run the playbook without any extra variables or specify explicitly

```sh
ansible-playbook -i deploy/vagrant deploy/wordpress.yml --extra-vars "wp_nightly=true"
```

Conversely, to use WP Stable, run

```sh
ansible-playbook -i deploy/vagrant deploy/wordpress.yml --extra-vars "wp_nightly=false"
```


### All Development Everything

Run the WordPress playbook with multiple extra variables like so:

```sh
--extra-vars "wp_nightly=true"
```

### Stable Everything

```sh
--extra-vars "wp_nightly=false"
```

It is advisable to empty & re-provision the DB when switching WP versions to avoid migration issues.

## Administering the Site

The local WordPress install can be administered by logging in to WP-Admin at the link [http://wpapi.loc/wp/wp-admin](http://wpapi.loc/wp/wp-admin) with the username "apiuser" and the password "password".
