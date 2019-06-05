<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Requisitos:

    Xampp (PHP, MYSQL): https://www.apachefriends.org/pt_br/index.html
    
Iniciar xammp:

    linux:
    sudo /opt/lampp/manager-linux-x64.run
    
    windows:
    Iniciar via atalho criado na instalação

Configurar usuario e senha para phpmyadmin e banco de dados mysql

    linux:
    sudo /opt/lampp/lampp security
    
    windows:
    Via phpMyAdmin

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

**Configuração do banco MySQL**

Acessar o PHPMyAdmin com as credenciais fornecidas no arquivo ~\xampp\passwords.txt

http://localhost/phpmyadmin

Na aba Contas de Usuário selecionar "Add User Account"
Preencher Informações de login 
    User name: fatec
    Host name: localhost
    Palavra-passe: fatec
    Confirma: fatec
    Marcar todos os Privilégios Globais

Selecionar o botão "Executar" no canto inferior direito da página

Fazer login no PHPMyAdmin com o usuário "fatec" recém criado

Na aba Base de Dados, abaixo de Criar base de dados, inserir o nome "db_lanchonete" e clicar no botão "Criar"

**Criar migrations**

Realize merge da branch *create_migrations* com sua branch

    git merge create_migrations

Os arquivos da pasta ~/database e o arquivo .env estão atualizados com as tabelas e a conexão a ser configurada

Executar as migrations:

    php artisan migrate:install

    php artisan migrate    

Material de apoio: 

Documentação Laravel:
https://laravel.com/docs/5.5/migrations

Slide 4:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/88809/mod_resource/content/1/LabIV%20-%20Aula%2004%20-%202019.pdf

Slide 6:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/89471/mod_resource/content/1/LabIV%20-%20Aula%2006%20-%202019.pdf
