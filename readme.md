#laravel-emailer

laravel-emailer add a way to 

## Installation 
1) To install laravel-ongkir, add the following line to composer.json. Then run composer update:
```
"bronanza/laravel-emailer": "dev-master"
```
2) Add the following code to the AppServiceProvider.php

```
public function register()
{
    $this->app->singleton(
        'Bronanza\Emailer\Contracts\Emailer',
        'Bronanza\Emailer\LaravelEmailer'
    );
}
```
## Usage
1) Make a class that contain the confifuration for the email

```
<?php
namespace App\Http\Controllers;

use Illuminate\Mail\Message;
use Bronanza\Emailer\Contracts\Email;
use App\User;

class UserEmail implements Email
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // View that will be used for the email
    public function template()
    {
        return 'email.email-test';
    }

    // Data that will be used in the view
    public function templateData()
    {
        return [
            'user' => $this->user,
        ];
    }

    public function setup()
    {
        return function (Message $message) {
            $customerSupport = [
                'email' => 'apeng@example.com',
                'name' => 'apeng'
            ];

            $subject = 'Test Sending Email';

            return $message
                ->from($customerSupport['email'], $customerSupport['name'])
                ->to($this->user->email, $this->user->first_name)
                ->bcc($customerSupport['email'])
                ->subject($subject);
        };
    }
}
```

2) 

```
<?php

namespace App\Http\Controllers;

use App;
use App\User;
use App\Http\Controllers\Controller;
use Bronanza\Emailer\Contracts\Emailer;
use App\Http\Http\Controller\UserEmail;

class SendEmail
{

    protected $emailer;
    /** 
    *    instantite the emailer interface
    **/
    public function __construct(Emailer $emailer)
    {
        $this->emailer = $emailer;
    }


    public function index()
    {
        // Create a new Email object that contains the configuration
        $email = App::make('App\Http\Controllers\UserEmail');
        // Send the email
        $this->emailer->send($email);
    }
}
```
