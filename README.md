# Guia de Instalação e Configuração (Windows)

Este é um projeto baseado em Laravel 11, PHP 8.2, Node.js 22, Livewire 3, Tailwind CSS, e Flowbite. Siga os passos abaixo para configurar e rodar o projeto localmente no Windows.

## Requisitos

Antes de começar, certifique-se de que você tenha as seguintes dependências instaladas:

- [PHP 8.2](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Node.js 22](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [Git](https://git-scm.com/)

Se você não tiver o PHP e o Composer configurados globalmente, pode ser útil usar o [XAMPP](https://www.apachefriends.org/pt_br/index.html) para configurar um ambiente PHP local de maneira mais simples no Windows.

## Passos para Instalação

### 1. Clonar o Repositório
Clone o repositório em seu diretório local:

git clone https://github.com/DevMboo/app-brands
cd seu-diretorio/app-brands

### 2. Instalar as Dependências do PHP
Instale as dependências do PHP usando o Composer. Abra o terminal no diretório do projeto e execute:
Execute no terminal: composer install

### 3. Configurar o Ambiente
Copie o arquivo .env.example para .env, (Deixei dentro dentro do arquivo, o mesmo .env que utilizei na criação do projeto)
Em seguida, gere a chave da aplicação Laravel:
Execute no terminal: php artisan key:generate

### 4. Instalar as Dependências do Node.js
Execute no terminal: npm install

### 5. Rodar as Migrações
Execute as migrações para configurar as tabelas do banco de dados:
Execute no terminal: php artisan migrate

### 6. Execute a seeder
Crie o usuário teste via seeder 
Execute no terminal: php artisan db:seed

### 7. Configurar o Vite
O projeto utiliza o Vite para empacotar e compilar os assets. Para rodar o Vite em modo de desenvolvimento, use o seguinte comando:
npm run dev

### 8. Inicie o Servidor Local
Você pode rodar o servidor Laravel localmente usando o Artisan:
php artisan serve

Tecnologias Utilizadas
Laravel 11: Framework PHP para backend.
PHP 8.2: Versão do PHP utilizada.
Node.js 22: Ambiente JavaScript para rodar o Vite e outras ferramentas de desenvolvimento.
Vite: Bundler de front-end rápido.
Livewire 3: Framework para criação de componentes dinâmicos no Laravel.
Tailwind CSS: Framework CSS para construção de interfaces responsivas.
Flowbite: Biblioteca de componentes UI baseada em Tailwind CSS.

Comandos Úteis
Rodar o servidor Laravel: php artisan serve
Rodar o Vite em desenvolvimento: npm run dev
Compilar assets para produção: npm run build
Rodar o Queue Listener: php artisan queue:listen --tries=1
Problemas Conhecidos

Caso você enfrente problemas ao rodar o projeto, verifique:
As dependências do PHP e do Node.js estão instaladas corretamente.
O arquivo .env está configurado com as credenciais corretas do banco de dados.
Se estiver tendo problemas com o Vite no Windows, tente rodar o comando npm run dev no prompt de comando ou PowerShell em vez do Git Bash, pois pode haver questões de compatibilidade.
