<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Requisitos:

    Xammp (PHP, MYSQL): https://www.apachefriends.org/pt_br/index.html
    
Iniciar xammp:

    linux:
    sudo /opt/lampp/manager-linux-x64.run
    
    windows:
    Iniciar via atalho criado na instalação

Configurar usuario e senha para phpmyadmin e banco de dados mysql

    sudo /opt/lampp/lampp security

Após a instalação  necessário dicionar as ferramentas do xamp no path para uso do php e mysql via terminal

    linux:
    $ cd ~ & echo "export PATH=$PATH:/opt/lampp/bin" >> .bashrc

    windows (adicionar no Path em Variaveis do Sistema):
    ;C:\xampp\mysql\bin;C:\xampp\php;
    
Dashboard do Xampp e acesso ao Phpmyadmin

    http://localhost/

Instalação de dependências (no diretorio do projeto):

    $ php composer.phar install

Geração da key para o projeto (no diretorio do projeto):

    linux:
    $ mv .env.example .env & php artisan key:generate
    
    windows:
    $ ren .env.example .env && php artisan key:generate

Execução (no diretorio do projeto):

    $ php artisan serve --host=localhost

Slide para criação das migration e banco de dados:

Slide 4:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/88809/mod_resource/content/1/LabIV%20-%20Aula%2004%20-%202019.pdf

Slide 6:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/89471/mod_resource/content/1/LabIV%20-%20Aula%2006%20-%202019.pdf
