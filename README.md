# Arcadia Sketch
This is a rough idea for a web app that tracks which arcade games pay the most tickets. Built using [Laravel 8](https://laravel.com/) and [tailwindcss](https://tailwindcss.com/).

Once the database is seeded base info for Round 1 in Concord, CA will be available on the homepage. You need to create an account and login but you can use a fake email address. The dashboard has the controls to add new arcades, arcade locations, games, and games at arcade locations.

On the homepage you can select a game from a table. Then in a sidebar you can record a ticket payout for the game. The button "Claim Round 1 Notebook Payouts" will add base scores from each game that I recorded while playing at the arcade.

#### Start To Finish Record
You enter how many tickets you started with, how many you ended with, and how many times you swiped. It tells how many you made and how many per swipe. You can then submit that to db as single swipes. If you mark as jackpot all items will be marked as jackpot.

#### Record Play
Tickets won can be entered as a comma seperated list. If you mark as jackpot all items will be marked as jackpot.

## Local Install Project
Copy the .env.example and update to match your project prefernce
```
composer install
php artisan key:generate
npm install
npm run dev
php artisan migrate:fresh --seed
php artisan serve
```
