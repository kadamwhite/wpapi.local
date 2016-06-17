# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  # Base box is Ubuntu LTS "Trusty Tahr"
  config.vm.box = 'ubuntu/trusty64'

  # Accessing "localhost:8181" will access port 80 on the guest machine.
  # config.vm.network "forwarded_port", guest: 80, host: 8181

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # Ideally, this IP should be unique on your machine, so the entry added to
  # /etc/hosts won't conflict with that of another project.
  config.vm.network "private_network", ip: "192.168.34.56"

  # Automatically add an entry to /etc/hosts for this Vagrant box (requires
  # sudo). This should match the site.fqdn setting in the ansible config.
  # N.B. this requires the vagrant-hostsupdater plugin, see the README
  config.hostsupdater.aliases = [
    'wpapi.loc' # Latest stable WP release
  ]

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"
  config.vm.synced_folder "content", "/mnt/www/content", owner: 'www-data', group: 'www-data'

  # A specific name looks much better than "default" in ansible output.
  config.vm.define 'vagrant'

  # Use Ansible to provision the VM. Instead of the following code, the
  # Vagrant box may be provisioned manually with ansible-playbook, but
  # adding this code saves the trouble of having to run ansible-playbook
  # manually after "vagrant up".
  config.vm.provision 'ansible' do |ansible|
    # Run initial provisioning playbook
    ansible.playbook = 'deploy/provision.yml'
  end

  # ref https://github.com/mitchellh/vagrant/issues/1673
  config.ssh.shell = "bash -c 'BASH_ENV=/etc/profile exec bash'"

  # Run the restart-services playbook on _every_ `vagrant up`
  config.vm.provision 'ansible', run: 'always' do |ansible|
    ansible.playbook = 'deploy/restart-services.yml'
  end
end
