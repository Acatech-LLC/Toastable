# Laravel Toastable Notifications Package


# Copyright
Inspired by [Jeffrey Way's Flash Package](https://github.com/laracasts/flash). Added following Jeffrey Ωmega's request.

## Installation


### You like text ?

First, pull in the package through Composer.

Run `composer require acatech/toastable`

And then, if using Laravel 5, include the service provider within `config/app.php`.

```php
'providers' => [
    Acatech\Toastable\ToastableServiceProvider::class,
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    'Toastable' => Acatech\Toastable\Toastable::class,
];
```

## Usage

Within your controllers, before you perform a redirect...

```php
public function store()
{
    Toastable::message('hello guys', 'http://your-awesome-link.com');

    return Redirect::home();
}
```

You may also do:

- `Toastable::info('Message', 'http://your-awesome-link.com')`
- `Toastable::success('Message', 'http://your-awesome-link.com')`
- `Toastable::error('Message', 'http://your-awesome-link.com')`
- `Toastable::warning('Message', 'http://your-awesome-link.com')`
- `Toastable::primary('Message', 'http://your-awesome-link.com')`
- `Toastable::primaryDark('Message', 'http://your-awesome-link.com')`
- `Toastable::muted('Message', 'http://your-awesome-link.com')`
- `Toastable::mutedDark('Message', 'http://your-awesome-link.com')`

Again, if using Laravel, this will set a few keys in the session:

- 'toastable_notification.message' - The message you're flashing
- 'toastable_notification.type' - A string that represents the type of notification (good for applying HTML class names)
- 'toastable_notification.link' - The URL to redirect to on click

Alternatively, again, if you're using Laravel, you may reference the `toastable()` helper function, instead of the facade. Here's an example:

```php
/**
 * Destroy the user's session (logout).
 *
 * @return Response
 */
public function destroy()
{
    Auth::logout();

    toastable()->success('You have been logged out.', 'http://your-awesome-link.com');

    return home();
}
```

Or, for a general information flash, just do: `toastable('Some message', 'http://your-awesome-link.com');`.

With this message flashed to the session, you may now display it in your view(s). Maybe something like:

```html
@if(Session::has('toastable_notification.message'))
<script id="toastable-template" type="text/template">
    <div class="toastable toastable--{{ Session::get('toastable_notification.type') }}">
        <i class="material-icons">speaker_notes</i>
        <a href="#" class="toastable__body" target="_blank"></a>
    </div>
</script>

<script>
    toastable("{{ Session::get('toastable_notification.message') }}", "{{ Session::get('toastable_notification.link') }}");
</script>
@endif
```

Because flash messages are so common, if you want, you may use (or modify) the views that are included with this package. Simply append to your layout view:

```html
@include('toastable::message')
```

> Note that this package has jQuery has dependency. It's also better to load toastable before your body close tag.

## Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<div class="container">

    <p>Welcome to my website...</p>
</div>

<script src="//code.jquery.com/jquery.js"></script>
@include('toastable::message')
</body>
</html>
```

If you need to modify the flash message partials, you can run:

```bash
php artisan vendor:publish
```

The two package views will now be located in the `app/views/packages/acatech/toastable/` directory.

```php
Toastable::message('Welcome aboard!', 'http://your-awesome-link.com');

return Redirect::home();
```

```php
Toastable::error('Sorry! Please try again.', 'http://your-awesome-link.com');

return Redirect::home();
```

## Nice rendering

For a nice rendering you may include these lines in your head:

```html
<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>
```

and override the following sections of the default toastable view:

```html
<style type="text/css">
.toastable {
    font-family: "Source Sans Pro", Arial, sans-serif;
    padding: 11px 30px;
    border-radius: 4px;
    font-weight: 400;
    position: fixed;
    bottom: 20px;
    right: 20px;
    font-size: 16px;
    color: #fff;
}
</style>

<script id="toastable-template" type="text/template">
    <div class="toastable toastable--{{ Session::get('toastable_notification.type') }}">
        <i class="material-icons">speaker_notes</i>
        <a href="#" class="toastable__body" target="_blank"></a>
    </div>
</script>
```

