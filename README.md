# wpapi.local

This is a Vagrant configuration for rapidly spinning up a WordPress site within a local virtual machine. It uses [Chassis](http://docs.chassis.io/en/) with the [chassis-wxr extension](https://github.com/kadamwhite/chassis-wxr) to seed that that WordPress site with the ["theme unit test" sample data](https://codex.wordpress.org/Theme_Unit_Test?utm_source=twitterfeed). By providing a simple configuration that caan be used to create a predictable site, this local virtual machine serves as the integration testing target for the [`wpapi`](https://github.com/wp-api/node-wpapi) isomorphic JavaScript cient library for the WordPress REST API.

Previously, this virtual machine configuration was a fork of Varying Vagrant Vagrants adjusted to use Ansible for provisioning. Chassis uses puppet for provisioning, so none of those Ansible configurations are still in use and this VM does not expose all capabilities of the prior version.

## Installation

Pull down Chassis, then clone this repository as the `content` folder within your Chassis root.

```bash
# Clone Chassis
git clone --recursive https://github.com/Chassis/Chassis wpapi.local

cd wpapi.local
git clone --recursive git@github.com:kadamwhite/wpapi.local.git content
```

Then, start the VM:

```bash
vagrant up
```

Finally, run this command to set "pretty permalinks" to enable the `wp-json/` route:

```bash
vagrant ssh -c "wp rewrite structure '/%year%/%monthnum%/%postname%'"
```

You should now be able to visit the WordPress site at [wpapi.local](http://wpapi.local), and the integration tests on the `node-wpapi` repo should now pass when run.

You may log into the virtual machine with the credentials `admin` / `password`.
