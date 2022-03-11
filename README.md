
# trabalho_final_bd_2021.2
Trabalho Final - Banco de Dados I - 2021/2

Nomes
- Ademario Santana
- Álvaro de C. Alves
- Felipe de Jesus A. da Conceição
- Livia B. Fonseca
- Luiz Rodrigo L. Rodrigues

## Instalação no linux (Ubuntu 18.04)
### Parte 1: apache
Necessário para hostear o site
```sh
sudo apt update
sudo apt install apache2
```
Depois, é importante ativar o apache:
```sh
sudo systemctl start apache2.service
```
Para ver se o apache HTTP está instalado, basta pesquisar pelo [localhost](http://locahost) no navegador
### Parte 2: mysql
Depois, é necessária a instalação do mysql
```sh
sudo apt install mysql-server
```
Depois disso, rode o comando abaixo e siga as instruções que serão fornecidas para instalar e configurar uma senha para usuário root do mysql
```sh
sudo mysql_secure_installation
```
reinicie o servidor mysql:
```sh
sudo systemctl restart mysql
```
Logue no mysql com:
```
sudo mysql -u root -p
```
Crie um usuário e uma senha no myqsl para o projeto:
```
CREATE USER 'cakephp'@'localhost' IDENTIFIED BY 'Cake#123';
GRANT ALL PRIVILEGES ON *.* TO 'cakephp'@'localhost';
FLUSH PRIVILEGES;
```
Saia do mysql digitando quit e clicando em enter. Importe o arquivo para criação das tabelas e população dos dados com o seguinte comando:
```
mysql -u cakephp -p cake_cms < arqs_trab/sql/sql_bd_vinhos_completo.sql
```
### Parte 3: php
Adicione os repositórios
```sh
sudo apt-get install software-properties-common
sudo add-apt-repository ppa:ondrej/php
```
Todos esses módulos são necessários:
```sh
sudo apt install php7.2 libapache2-mod-php7.2 php7.2-common php7.2-gmp php7.2-curl php7.2-intl php7.2-mbstring php7.2-xmlrpc php7.2-mysql php7.2-gd php7.2-imap php7.2-ldap php-cas php7.2-bcmath php7.2-xml php7.2-cli php7.2-zip php7.2-sqlite3
```
Se estiver com uma versão anterior ou superior, basta substituir todos os "7.2"s pela versão preferível.

Para testar se tudo está funcionando, modifique (se houver) ou crie o arquivo index.php
```sh
sudo nano /var/www/html/index.php #localização dos repositório dos sites no linux
```
Digite o seguinte código:
```php
<?php phpinfo(); ?>
```
E veja se está funcionando no [localhost](http://localhost/index.php)

### Parte 3: cakephp
Se os passos acima foram feitos com sucesso, agora é necessário instalar e configurar o Cake PHP.
Mas antes, no arquivo site_vinhos/config/app_local.php, coloquem o login e senha do usuário do banco de dados.
O root é aceito:
![Login e senha no app_local.php](https://user-images.githubusercontent.com/32593546/157821864-b5d96ea2-022a-446b-a068-679f9b54e9a7.png)

Precisamos agora instalar o [composer](http://localhost/index.php), ele é apenas necessário para construir a estrutura de arquivos.
É necessário entrar no site e pegar o código atualizado lá. Quando o composer estiver instalado, execute o comando:
```sh
php composer.phar create-project --prefer-dist cakephp/app:^3.9 diretorio/bem/legal
```
Agora a parte mais importante, depois de clonar o repositório, substitua os arquivos do 'diretorio/bem/legal' pelos arquivos do repositório:
```sh
cp -r ./site_vinhos/* diretorio/bem/legal # o src/ do site_vinhos deve ser o mesmo do src/ do diretorio legal
```
Isso fara com que os arquivos essenciais do cake rodem os arquivos essenciais do site.
Depois disso, basta executar o servidor com o arquivo cake. Dentro da pasta do repositório:
```sh
./bin/cake server
```
O site será então iniciado, e poderá ser acessado com o endereço https://localhost:8765
