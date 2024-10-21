Aplication done on Windows

base: https://youtu.be/Kzcz-EVKBEQ?si=Seb2kx7KAR5OG1Xw

contruir imagem e rodar o container mysql : docker run -d -v C:\Users\mathe\Documents\Docker_estudo\aaaplicaov\aplicacao_teste\api\db\data:/var/lib/mysql --rm --name mysql-container-2 -e MYSQL_ROOT_PASSWORD=programadorabordo mysql:5.7
colocar arquivos do banco de dados ja existens no container : cat api/db/script.sql | docker exec -i mysql-container mysql -uroot -pprogramadorabordo 

contruir imagem do node: docker build -t node-image -f api/Dockerfile .   
rodar container:  docker run -d -v  C:\Users\mathe\Documents\Docker_estudo\aaaplicaov\aplicacao_teste\api\:/home/node/app -p 9001:9001 --link mysql-container   --rm --name node-container node-image

contruir imagem do php:  docker build -t php-image -f  api/website/Dockerfile . 
rodar container: docker run -d -v C:\Users\mathe\Documents\Docker_estudo\aaaplicaov\aplicacao_teste\api\website:/var/www/html -p 8888:80 --link node-container --rm --name php-container php-image
