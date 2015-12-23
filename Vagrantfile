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
    'wpapi.loc',      # Latest stable WP release
    'wpapi-trunk.loc' # WordPress development trunk
  ]

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

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

  # the php5-fpm init script is triggered during startup before vagrant mounts
  # the shared folder. as a result, php5-fpm can't start. this ensures it will
  # always be started after that event.
  # config.vm.provision :shell, :inline => "sudo service php5-fpm start || true", run: "always"
end
