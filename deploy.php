<?php
namespace Deployer;

localhost()
    ->set('deploy_path', '~/.');    

$dependencies = 
    array(
        'sublime-text' => 'subl',
        'docker' => 'docker',
        'docker-compose' => 'docker-compose' 
    );

set('dependencies',$dependencies);
set('user',get_current_user());

// Tasks

desc('Setup some shit');
task('setup', [
    'setup:shit',
    // 'setup:prepare',
    // 'setup:lock',
    // 'setup:release',
    // 'setup:update_code',
    // 'setup:shared',
    // 'setup:writable',
    // 'setup:vendors',
    // 'setup:clear_paths',
    // 'setup:symlink',
    // 'setup:unlock',
    // 'cleanup',
    // 'success'
]);

task('setup:shit', function () {
    writeln('
        / *
      * \
       _/
    ~"(__)"~
  ~" (____) ”~
~"  (______)  ”~
 Let us set some
    SHIT up!
    ');
});

task('setup:dependency:list', function () {
    $dependencies = get('dependencies');
    foreach ($dependencies as $dName => $dValue) {
        # Loop through dependencies list
        writeln($dName.' - '.$dValue);
    }
});

task('test', function() {
    if (run('docker-compose -v')){
        writeln('trued');
    } else { writeln('falsed');}
});

task('setup:dependency:install-sublime-text', function() {
    run('sudo apt update');
    run('sudo apt install sublime-text');
});

task('setup:dependency:install-docker', function() {
    run('sudo apt update');
    run('sudo apt install apt-transport-https ca-certificates curl gnupg2 software-properties-common');
    run('curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -');
    run('sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/debian $(lsb_release -cs) stable"');
    run('sudo apt update');
    run('apt-cache policy docker-ce');
    run('sudo apt install docker-ce');
    run('sudo systemctl status docker');
    run('sudo usermod -aG docker ${{user}}');
    run('su - ${{user}}');
});

task('setup:dependency:install-docker-compose', function() {
    run('sudo apt update');
    run('sudo curl -L https://github.com/docker/compose/releases/download/1.22.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose');
    run('sudo chmod +x /usr/local/bin/docker-compose');
    run('docker-compose --version');
});

task('setup:dependency:check', function () {
    $dependencies = get('dependencies');
    foreach ($dependencies as $dName => $dValue) {
        # Loop through dependencies and check if exists

        if(test($dValue) || run($dValue.' -v')){
            writeln($dName.' - Installed');
        }
        else {
            writeln($dName.' - Not Installed');
            if (askConfirmation('would you like to intsall '.$dName.'?')) {
                // run installaltion step for $dName
                invoke('setup:dependency:install-'.$dName);
            }
        }
    }
});