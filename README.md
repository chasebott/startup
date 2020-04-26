# startup - workspace
Startup instructions for automated builds.
_This is a template. Workspaces rely on private repositories. Make sure to update hosts.yml to map remote hosts._

## Requirements
- Startup an OS (see branches)
- PHP
- Deployer
- Composer
- Git

### Installation
```
git clone https://github.com/chasebott/startup.git -b workspace
composer install
```

### Configuration
hosts.yml should be the only file you'll need to add/configure to point to to private hosts/repos
```
workspace.domain.com:
    hostname: workspace.domain.com
    user: user
    container_user: dev
    port: ###
    identityFile: path/to/key
    stage: stage
    keep_releases: 2
    deploy_path: path/to/{{project}}
    # Tugboat repository is public. Swap out for private {{boat}} repos for specific env files.
    repository: https://vcs.com/organization/boat.git
    name: stage
container.domain.com:
    hostname: container.domain.com
    user: dev
    port: ###
    identityFile: path/to/key
    stage: container
    # Add parameters as needed. Examples: roles, deploy_mode
    roles: demo
    keep_releases: 2
    deploy_path: /var/www/html
    deploy_mode: developer
    repository: https://vcs.com/organization/application.git
    name: container
```

### Use
_This branch requires access to private repositories. Those repositories contain further instruction._

Deployer: https://deployer.org/docs/getting-started.html
