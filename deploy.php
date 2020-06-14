<?php
namespace Deployer;

require 'recipe/common.php';
require 'vendor/chasewoith/recipes/magento/magento.php';
require 'vendor/chasewoith/recipes/tugboat/tugboat.php';
require 'vendor/chasewoith/recipes/slack/slack.php';

// Application and Project name
set('application', 'workspace');
set('project', 'new');
set('default_timeout', 3600);

// Project repository
set('repository', 'https://github.com/bryanlittlefield/TUGBOAT.git');

// Allocate tty for git clone. Default value is true.
set('git_tty', true); 

// Allow stats to be sent to deployer. Default value is false.
set('allow_anonymous_stats', false);

// Hosts
inventory('hosts.yml');

// If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
