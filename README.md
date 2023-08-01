

## nstall & Configure JWT Authentication Package

Execute the following command to install tymondesigns/jwt-auth, It is a third-party JWT package and allows user authentication using JSON Web Token in Laravel securely.

```composer require tymon/jwt-auth```

Above command installed the jwt-auth package in the vendor folder, now we have to go to config/app.php file and include the laravel service provider inside the providers array.

Also include the JWTAuth and JWTFactory facades inside the aliases array.
```
'providers' => [
    ....
    ....
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
],
'aliases' => [
    ....
    'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
    'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
    ....
],

```
```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
In the next step, we have to publish the package’s configuration, following command copy JWT Auth files from vendor folder to config/jwt.php file.

```
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```
## Set Up User Model
Define Tymon\JWTAuth\Contracts\JWTSubject contract before the User model. This method wants you to define the two methods:

getJWTIdentifier(): Get the identifier that will be stored in the subject claim of the JWT.
getJWTCustomClaims(): Return a key value array, containing any custom claims to be added to the JWT.
Open the app/Models/User.php file and replace the following code with the existing code.
```
       /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    } 
   

```
 ## Configure Auth guard
 config/auth.php file.
 ```
    <?php
return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
            'hash' => false,
        ],
    ],
 ```

