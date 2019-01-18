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
- Add a secret key(anything you want) to **LUMEN_AUTH_SECRET** in **.env** which used to build token 

```bash
LUMEN_AUTH_SECRET=YOUR_SECRET_KEY

eg. LUMEN_AUTH_SECRET=7852ef15dcdd3eaeb40sdfasdf459171556
```

- If your User model doesn't belong to **App\User** then add the following line on your **.env** file

```bash
USER_MODEL=YOUR_USER_MODEL_NAMESPACE

eg. USER_MODEL=App\Models\User
```

## Usage
- Add **lumenAuth** middleware to routes you want authentication

For example,

```php
$router->group(['middleware' => 'lumenAuth'],
    function () use ($router) {
        //your routes
    });
```
- To generate token for a user you use **LumenAuthFacade::getToken($user)** which return a token for given user instance.

For example,

```php
use Abdurrahmanriyad\LumenAuth\Facades\LumenAuthFacade;
.......

class AuthController extends Controller {

   public function login(Request $request) {
        //validate user and check user
        ........

        // Verify the password and generate the token
        if (Hash::check($userPassword, $user->password)) {
            return response()->json([
                'token' => LumenAuthFacade::getToken($user)
            ], 200);
        }

        ......... 
    }

}

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)