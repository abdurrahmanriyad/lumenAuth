# lumenAuth

LumenAuth is a simple authentication package for lumen. This enables user to get rid of primary hassle to setup token based authentication in lumen. 

## Installation

- Install LumenAuth with composer:

```bash
composer require abdurrahmanriyad/lumenauth
```
- Add the following line on **bootstrap/app.php** file

```php
$app->register(\Abdurrahmanriyad\LumenAuth\LumenAuthServiceProvider::class);
```

- If your User model doesn't belong to **App\User** then add the following line on your **.env** file

```bash
USER_MODEL=YOUR_USER_MODEL_NAMESPACE

eg. USER_MODEL=App\Models\User
```

## Usage
Add **lumenAuth** middleware to routes you want authentication

For example,

```php
$router->group(['middleware' => 'lumenAuth'],
    function () use ($router) {
        //your routes
    });
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)