
---

# 📌 Guia de Instalação e Configuração (Windows)  

Este projeto utiliza **Laravel 11, PHP 8.2, Node.js 22, Livewire 3, Tailwind CSS e Flowbite**. Siga os passos abaixo para configurar e rodar o projeto localmente no Windows.  

## 📌 Requisitos  

Antes de começar, certifique-se de que você tenha as seguintes dependências instaladas:  

- 📌 [PHP 8.2](https://www.php.net/)  
- 📌 [Composer](https://getcomposer.org/)  
- 📌 [Node.js 22](https://nodejs.org/)  
- 📌 [NPM](https://www.npmjs.com/)  
- 📌 [Git](https://git-scm.com/)  

Se você não tiver **PHP** e **Composer** configurados globalmente, pode ser útil usar o [XAMPP](https://www.apachefriends.org/pt_br/index.html) para configurar um ambiente PHP local de maneira mais simples no Windows.  

---

## 📌 Passos para Instalação  

### 🚀 1. Clonar o Repositório  

```sh
git clone https://github.com/DevMboo/app-brands  
cd app-brands  
```

### 🚀 2. Instalar as Dependências do PHP  

Instale as dependências do Laravel com o **Composer**:  

```sh
composer install  
```

### 🚀 3. Configurar o Ambiente  

Copie o arquivo **`.env.example`** para **`.env`**:  

```sh
cp .env.example .env  
```

Em seguida, gere a chave da aplicação:  

```sh
php artisan key:generate  
```

### 🚀 4. Instalar as Dependências do Node.js  

```sh
npm install  
```

### 🚀 5. Rodar as Migrações  

Execute as migrações para configurar as tabelas do banco de dados:  

```sh
php artisan migrate  
```

### 🚀 6. Executar a Seeder  

Crie o usuário de teste via **seeder**:  

```sh
php artisan db:seed  
```

### 🚀 7. Configurar o Vite  

O projeto utiliza **Vite** para empacotar e compilar os assets. Para rodá-lo em modo de desenvolvimento, execute:  

```sh
npm run dev  
```

### 🚀 8. Iniciar o Servidor Local  

```sh
php artisan serve  
```

---

## 📌 Tecnologias Utilizadas  

- **Laravel 11** – Framework PHP para backend.  
- **PHP 8.2** – Versão do PHP utilizada.  
- **Node.js 22** – Ambiente JavaScript para rodar o **Vite** e outras ferramentas.  
- **Vite** – Bundler de front-end rápido.  
- **Livewire 3** – Framework para criação de componentes dinâmicos no Laravel.  
- **Tailwind CSS** – Framework CSS para interfaces responsivas.  
- **Flowbite** – Biblioteca de componentes UI baseada em Tailwind CSS.  

---

## 📌 Comandos Úteis  

| Comando | Descrição |  
|---------|-------------|  
| `php artisan serve` | Inicia o servidor Laravel |  
| `npm run dev` | Roda o **Vite** em modo de desenvolvimento |  
| `npm run build` | Compila os assets para produção |  
| `php artisan queue:listen --tries=1` | Inicia o **Queue Listener** |  

---

## 📌 Problemas Conhecidos  

Caso enfrente dificuldades, verifique:  

- Se todas as dependências do **PHP** e **Node.js** estão instaladas corretamente.  
- Se o arquivo **`.env`** está configurado com as credenciais corretas do banco de dados.  
- Se estiver com problemas no **Vite** no Windows, tente rodar o comando `npm run dev` no **Prompt de Comando** ou **PowerShell**, em vez do **Git Bash**, pois pode haver incompatibilidades.  

Se precisar de mais ajustes, é só avisar! 🚀
