<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

Requisitos:

    Xampp (PHP, MYSQL): https://www.apachefriends.org/pt_br/index.html
    
Iniciar xammp:

    **linux:**
    sudo /opt/lampp/manager-linux-x64.run
    
    **windows:**
    ~\xampp\xampp_start.exe    
      e iniciar o serviço do MySQL
    ~\xampp\xampp_control.exe 

Configurar usuario e senha para phpmyadmin e banco de dados mysql

    **linux:**
    sudo /opt/lampp/lampp security
    
    **windows:**
    Acessar o PHPMyAdmin com as credenciais fornecidas no arquivo ~\xampp\passwords.txt
    
        http://localhost/phpmyadmin
    
    Na aba *Contas de Usuário* selecionar *Add User Account*
    
    Preencher Informações de login 
        User name: fatec
        Host name: localhost
        Palavra-passe: fatec
        Confirma: fatec
    Marcar todos os Privilégios Globais
    Clicar em *Executar* no canto inferior direito da página

Após a instalação  necessário dicionar as ferramentas do xamp no path para uso do php e mysql via terminal

    **linux:**
    $ cd ~ & echo "export PATH=$PATH:/opt/lampp/bin" >> .bashrc

    **windows**
    Adicionar no Path em Variaveis do Sistema:
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

Criar database do projeto:

    Fazer login no PHPMyAdmin com o usuário "fatec"
    
    Na aba *Base de Dados* (abaixo de *Criar base de dados*) inserir o nome "db_lanchonete" e clicar no botão "Criar"

Criar branch individual:

    $ git checkout -b <nome da branch> develop

Criar migrations:

    $ php artisan migrate:install


    $ php artisan migrate    

    

Material de apoio: 

Documentação Laravel:
https://laravel.com/docs/5.5/migrations

Slide 4:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/88809/mod_resource/content/1/LabIV%20-%20Aula%2004%20-%202019.pdf

Slide 6:

http://fatecsjc-prd.azurewebsites.net/moodle/pluginfile.php/89471/mod_resource/content/1/LabIV%20-%20Aula%2006%20-%202019.pdf
