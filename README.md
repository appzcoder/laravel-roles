# Laravel Roles
Laravel 5 User Role Manager

The idea of this package came from laracast [laracasts/Users-and-Roles-in-Laravel](https://github.com/laracasts/Users-and-Roles-in-Laravel) and now it is built for laravel 5.

### Requirements
    Laravel >=5.1
    PHP >= 5.5.9 
    
## Installation

1. Run 
    ```
    composer require "appzcoder/laravel-roles":"dev-master"
    ```
    
2. Add service provider into **/config/app.php** file.
    ```php
    'providers' => [
        ...
    
        Appzcoder\LaravelRoles\LaravelRolesServiceProvider::class,
    ],
    ```

4. Publish migrations
    ```
    php artisan vendor:publish
    ```

4. Run migrate command
    ```
    php artisan migrate
    ```
    
5. Include **UserRoles** trait to your **user model** located at **/app/User.php**
    ```php
    use Appzcoder\LaravelRoles\Traits\UserRoles;
    
    class User extends Model implements AuthenticatableContract, CanResetPasswordContract
    {
        use Authenticatable, CanResetPassword, UserRoles;
    ```

## Usage

Use the routes as bellow.

```php
Route::get('/roles', function () {

    /* Create user if needed
    App\User::create([
    'name' => 'Sohel Amin',
    'email' => 'sohelamincse@gmail.com',
    'password' => bcrypt('123456'),
    ]);
     */

    $user = App\User::first();

    /* Create roles
    $role = new Appzcoder\LaravelRoles\Models\Role;
    $role->name = 'admin';
    $role->save();
     */

    /* Assign and remove role from user
    $role = Appzcoder\LaravelRoles\Models\Role::whereName('admin')->first();
    $user->assignRole($role);
    //$user->removeRole(2);
     */

    return $user->roles;
});

Route::get('/admin', ['middleware' => 'role:admin', 'uses' => 'AdminController@index']);
```

##Author

<a href="http://www.sohelamin.com">Sohel Amin</a>
