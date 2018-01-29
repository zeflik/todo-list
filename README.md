# Todo list app

**Sample application, which demonstrates basic Microservice architecture using Spring Boot, Mysql and Docker.** 

## Functional components

Project was created using three independent components - restful microservice, database and web client. 

### Todo service
- Restful service created with Spring Boot with Spring MVC, Spring Data.

##### Endpoints
Method	    | Path	  | Description        | Consumes
----------- | ----------- | -------------------|------------- 
GET	    | /todo	  | Get all todo items |
GET	    | /todo/{id}  | Get todo item by id|
PUT	    | /todo/{id}  | Update todo item   |json
DELETE      | /todo/{id}  | Delete todo item   |

### Mysql database
- MariaDB container - https://hub.docker.com/_/mariadb/

### Web client
- PHP pseudo code with basic functionality

## How to run this project

**Before you start**
- Install Docker and Docker Compose.

### 1. Clone

`git clone https://github.com/zeflik/todo-list`

### 2. Build 

- via local gradle:

  `gradle -p ./todo-list/spring-boot-restful-service build`

- by the gradle docker container (https://hub.docker.com/_/gradle/):

  `docker run --rm -v "$PWD"/todo-list/spring-boot-restful-service/:/home/gradle/project -w /home/gradle/project -u root gradle gradle build`

### 3. Run

`docker-compose -f ./todo-list/docker-compose.yml up`

### 4. Play

- web client 

  http://localhost:5000

- restful service

  http://localhost:8080/todo

### 5. Clean

Remove containers

`docker-compose -f ./todo-list/docker-compose.yml down`

**Thanks for reading this**

