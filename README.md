# Fullstack Test

## Installation
1. Copy `.env.example` to `.env` and provide credentials
2. Copy `.env.example` to `.env.testing` and provide credentials
3. Run:

`composer install`

`php artisan key:generate`

`php artisan migrate --seed`

`npm install`

`npm run prod`/`npm run watch`

## Architecture

- Frontend - React app which fetches the game result.
- Backend - written in Laravel.

# Task description

We want you to have fun doing this test so we've chosen a subject matter that is a little unusual, but should be more fun that other tests you may have done.
###Frontend
Build an application to select random people or starships and render their details to see
who would win based on a common attribute. i.e. people have mass and starships have crew. A person with greater mass wins, a starship with more crew wins.
The app should render the attributes from the resource in a simple web page that allows you to 'play' the game.
Once two cards are displayed the app should declare one of the cards a winner based on the higher common attribute.
Having displayed the winning card, the user should be able to play again using an action button that repeats the same request.

#####Bonus points!
These are not required, just adds to your portfolio in an interview:

1 - Score counter. If there are two players, left and right, show how many times each side has won.

2 - Option to select which resource to play against

###Backend
Build RESTful API with CRUD operations for people or starships. SWAPI (​https://swapi.dev/documentation)​ can be some inspiration how data can look like. Use PHP.
Bonus points!
##### These are not required, just adds to your portfolio in an interview:

1 - Instead of hardcoded data use database e.g. MongoDB or Postgres 

2 - Pagination

3 - OpenAPI/Swagger

What we're looking for
We're interested in your code style and also best practice.
Please include tests. This is important as this is how we work day-to-day.
This is not a design test but a code test so focus on the PHP, JavaScript etc. and not the aesthetic.
If you are comfortable with the design side of CSS/SCSS, then great, crack on. But we're
looking for your PHP, JavaScript ability first and foremost so if time is ticking make sure you focus on that.
