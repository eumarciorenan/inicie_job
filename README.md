## SOBRE MIM
Eu sou Márcio Renan e estou concorrendo a esta vaga de emprego.<br>
Me dedico muito a aprender, e estou em constante aprendizado, sou muito focado em meus objetivos, gosto de trabalhar em equipe, gosto de aprender com as pessoas que tenham mais conhecimentos que eu.<br>
Espero uma oportunidade para fazer parte da equipe!


## SOBRE
Esta aplicação foi feita utilizando PHP 7.4 e LARAVEL 7.

## PRÉ-REQUISITOS
1 - COMPOSER<br>
2 - NODE<br>
3 - PHP 7.4<br>
4 - MYSQL 5.7<br>

## INSTALANDO O PROJETO ##
1 - Utilize o comando "composer install"<br>
2 - Utilize o comando "npm install" caso tenha dependências<br>
3 - Utilize o comando "npm run dev" caso tenha dependências<br>
4 - Utilize "php artisan migrate:fresh --seed"<br>
5 - Utilize "php artisan key:generate"<br>
6 - Caso exista um diretório chamado "storage" dentro de "public", remova .<br>
7 - Utilize o comando "php artisan storage:link" caso o passo 6 tenha sido executado.<br>
8 - Utilize o comando "php artisan serve" para rodar a aplicação.<br>

## COMO RODAR O PROJETO COM DOCKER ##

Os aquivos do docker estão dentro da pasta "phpdocker" e o arquivo "docker-compose" esta na raiz do projeto.<br>
Edite o "docker-compose", com as informações de banco de dados desejado para depois seguir os passos abaixo

1 - Acesse a pasta do projeto e rode "docker-compose up"
2 - Abrindo o terminal no container "docker exec -it ProjetoName_webserver_1 /bin/sh"
3 - Em outra ABA do terminal rode "docker exec -it ProjetoName_php-fpm_1 composer install"
4 - Em outra ABA do terminal rode "docker exec -it ProjetoName_php-fpm_1 php artisan migrate --seed"
5 - A URL do Sistema será: http://localhost:8000/
6 - A URL do PhpMyAdmin será: http://localhost:9000/

## COMMAND GIT  ##
## or create a new repository on the command line  ##
1 - echo "# SEICMR" >> README.md
2 - git init
3 - git add README.md
4 - git commit -m "first commit"
5 - git branch -M main
6 - git remote add origin 
7 - git push -u origin main
## or push an existing repository from the command line  ##
1 - git remote add origin 
2 - git branch -M main
3 - git push -u origin main

## ALTERNATIVA PARA RODAR MIGRATIONS E COMPOSER INSTALL ##
1 - docker exec -it PeojetoName_php-fpm_1 /bin/sh
2 - Rodar qualquer comando do ARTISAN ou COMPOSER.

## Comandos para Liberar a Gravação (erro de file_put_contents)
1 - sudo chown -R seuUsuario:seuUsuario *
2 - sudo chmod -R 777 storage/
