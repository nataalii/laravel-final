Quizz Website
---

### Tech Stack

-   [Laravel@9.x](https://laravel.com/docs/9.x) - back-end framework
-   [TailwinUI](https://tailwindui.com/) - for design

#

### Installation

1\. First of all you need to clone Coronatime repository from github:

```
git clone https://github.com/nnataali/laravel-final.git
```

2\. Next step requires you to run _composer install_ and _npm install_ in order to install all the dependencies.

```
composer install
```

```
npm install
```

3\. To create the symbolic link, you may use the storage:link Artisan command:
```
php artisan storage:link
```

##### Now, you should be good to go!

#

### Migration

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```sh
php artisan migrate --seed
```

````

#
### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
````

In order to run the dev script defined in the project’s package.json file use:

```sh
  npm run dev
```
