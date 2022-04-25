## Steps to reproduce
 
    ```shell
    composer install
    ```
    
    ```shell
    npm install && npm run dev
    ```

    ```shell
    cp .env.example .env
    ```

    ```shell
    php artisan migrate
    ```

        ```shell
    php artisan db:seed
    ```
---
## Update exchange rates from API

        ```shell
    php artisan schedule:work
    ```

