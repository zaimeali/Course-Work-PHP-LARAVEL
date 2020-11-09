1) old() is like a helper which return the old value
2) csrf is also a middleware
3) middleware can be used to filter the request before or after
4) Factory : php artisan make:factory CommentFactory --model=Comment


### Course Material
1) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0002-routes-views.md
2) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0005-database.md
3) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0006-migrations.md
4) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0009-models-eloquent.md
5) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0010-resource-controllers.md
6) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0011-views-collections-dates.md
7) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0012-form-saving.md
8) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0024-deleting.md
9) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0026-assets.md
10) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0028-testing.md
11) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0036-one-to-one.md
12) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0039-one-to-many.md
13) https://github.com/piotr-jura-udemy/laravel-cheat-sheet/blob/master/docs/0051-auth-component.md


### VSCode Shortcuts
1) ctrl + `  use to open terminal
2) ctrl + b  use to toggle sidebar
3) ctrl + p  use to search items in all files in a workspace

### Resources
1) https://code.visualstudio.com/shortcuts/keyboard-shortcuts-windows.pdf
2) https://github.com/tonsky/FiraCode/wiki/VS-Code-Instructions

### System 
1) netstat -ano  => for check which process is using which port 

### Commands
1) php artisan make:request StorePost    => to make custom request
2) add fillable bcz to make which field should be allowed to be modified
3) also we have look into mass assignment, and rules and authorized in StorePost Request

### Helper Function
1) old() method use to pass old values if the value is not passed the validation => use in a view files

### UIs
1) npm i
2) npm run dev  or   npm run watch
3) composer require laravel/ui
4) php artisan ui bootstrap

### Testing
1) For testing: vendor\bin\phpunit
2) After making changes in phpunit.xml and config/database.php
3) php artisan config:clear
4) php artisan make:test HomeTest

### Eloquent Model
#### One-to-One
1) php artisan make:model Author -m
2) php artisan make:model Profile -m
3) create function author() in Profile Model with belongsTo()
4) create function profile() in Author Model with hasOne()
5) Add author_id in profile migration file 
    $table->unsignedBigInteger('author_id')->unique();
    $table->foreign('author_id')
        ->references('id')
        ->on('authors');
6) php artisan tinker
7) $author = new Author()
8) $author->save()
9) $profile = new Profile()
10) $author->profile()
11) $profile->author()
12) $author->profile()->save($profile)  // it will save the author_id in profile
13) Another Method
14) $profile = new Profile()
15) $author = Author::create()
16) $profile->author()->associate($author)->save()
17) Another Method
18) $profile = new Profile()
19) $author = Author::create()
20) $profile->author_id = $author->id
21) $profile->save()
22) $author = Author::find(1)
23) $author
24) Lazy Loading bcz it will load the default things at the time not load the relationship
25) $author->profile    // to view the relationship 
26) $author // Lazy Loading
27) To load with the relationships
28) $author = Author::with('profile')->whereKey(1)  // Query Builder
29) $author = Author::with('profile')->whereKey(1)->first() // will load the collection

### One-to-Many
1) BlogPost::all()
2) $bp = BlogPost::find(2)
3) $comment = new Comment()
4) $comment->content = 'Nice Comment'
5) $bp->comments()->save($comment) // one method
6) $bp
7) $bp->comments
8) $bp
9) $comment = new Comment()
10) $comment->content = "Nice Content"
11) $comment->blogPost()->associate($bp)->save() // second method
12) $comment = new Comment()
13) $comment->content = 'third comment'
14) $comment->blog_post_id = 2
15) $comment->save() // third method
16) to save many comments
17) $comment1 = new Comment()
18) $comment1->content = 'Nice Content'
19) $comment2 = new Comment()
20) $comment2->content = 'Second Content'
21) $bp->comments()->saveMany([$comment1, $comment2])
22) $post = BlogPost::with('comments')->get() // will show all the posts with it's comments // it is eager loading

## Querying
1) use Illuminate\Support\Facades\DB;
2) DB::connection()->enableQueryLog();

1) Getting the Blog Post who has comments only
2) BlogPost::has('comments')->get()
3) $post = BlogPost::has('comments', '>=', 2)->get()  // conditional query
4) $post = BlogPost::whereHas('comments', function ($query) { $query->where('content', 'like', '%abc%'); })

#### if don't have 
1) BlogPost::doesntHave('comments')->get()

#### Count
1) BlogPost::withCount('comments')->get()

## Factory
1) in Laravel 8, factory helper is removed
2) Comment::factory()->create(['blog_post_id' => 7])   // use like this
3) $author = Author::factory()->has(Profile::factory())->create() // to first create author then create profile means using afterCreating function of Laravel Factory
4) $author->profile // to view author profile
5) BlogPost::with('comments')->findOrFail(2)


## Changes in Laravel 7 and 8
1) https://www.udemy.com/course/laravel-beginner-fundamentals/learn/lecture/18653996#content
2) composer require laravel/jetstream   // for laravel 8 for authentication
3) php artisan jetstream:install inertia
4) php artisan jetstream:install livewire
5) npm install && npm run dev
6) php artisan migrate

## Guard Component
1) Each guard component has a driver and a user provider
2) Driver can be either session or token
3) User Provider driver has Eloquent and Database
4) Token is used for API 
5) User Provider decides where and how the users should be fetched
6) Eloquent => User Model
7) Database => User dB
8) In config/Auth.php => guard is defined there in which api and web is defined.

## Database Seeding
1) php artisan make:migration add_user_to_blog_posts_table
2) php artisan migrate:refresh   // it'll rollback all the migrations and then up the migration again
3) php artisan db:seed
4) after changes made in DatabaseSeeder file 
5) then run php artisan db:seed
6) php artisan migrate:refresh --seed  // it'll re up the db and run the seed file