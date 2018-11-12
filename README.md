# Local set up

* Up docker container
```bash
cd laradock
docker-compose up -d nginx mysql redis beanstalkd mailhog
```

* ssh into mysql(db) to create new database(by default `homestead` db will be created)

    ```bash
    docker exec -it laradock_mysql_1 /bin/bash
    mysql -uroot -proot -hmysql
    ```

    > Create new database `learnlaravel`

    ```bash
    CREATE DATABASE `learnlaravel` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
    ```

    > [TODO] Re-create `root` user to fix authentication problem (#2)

    ```bash
    DROP USER IF EXISTS root;
    CREATE USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
    GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;
    FLUSH PRIVILEGES;
