@echo off
title Criador Universal de Projetos Laravel
cls

:: Solicita nome do projeto
set /p projectName=Digite o nome do projeto Laravel: 
echo Criando projeto Laravel chamado "%projectName%"...
echo.

:: Verifica se Composer está instalado
where composer >nul 2>nul
IF %ERRORLEVEL% NEQ 0 (
    echo [ERRO] Composer nao encontrado. Instale o Composer primeiro.
    pause
    exit /b
)

:: Cria o projeto Laravel em subpasta
composer create-project laravel/laravel %projectName%

:: Aguarda até o arquivo artisan estar disponível (indicando fim da criação)
:waitfolder
if not exist "%projectName%\artisan" (
    timeout /t 1 /nobreak >nul
    goto waitfolder
)

:: Entra na pasta do projeto
cd %projectName%

:: Agora, todos os comandos serão executados dentro da pasta do projeto
:: Pergunta se deseja instalar Breeze
set /p usarBreeze=Deseja instalar Laravel Breeze para autenticacao simples? (s/n): 

IF /I "%usarBreeze%"=="s" (
    composer require laravel/breeze --dev
    php artisan breeze:install
    npm install
    npm run dev
)

:: Pergunta quantos models criar
set /p qtdModels=Quantos models deseja criar (com migration e controller)? 

set /a count=1

:criarModel
IF %count% LEQ %qtdModels% (
    set /p modelName=Digite o nome do model #%count%: 
    php artisan make:model %modelName% -mcr
    set /a count+=1
    goto criarModel
)

echo.
echo Projeto Laravel "%projectName%" criado com sucesso!
echo ----------------------------------------------
echo Proximos passos:
echo 1. Edite o arquivo .env com seus dados do banco de dados.
echo 2. Edite as migrations em database\migrations\
echo 3. Execute: php artisan migrate
echo 4. Implemente relacionamentos entre os models se necessario.
echo.
pause