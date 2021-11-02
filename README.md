# Where's my stuff

<img src="misc/fizzybubblech.gif">


A program to keep track of your stuff!

## Possible use cases:

Perfect to run on a home network, maybe you got a raspberry pi lying around or just some old computer.
If you want to be able to run it on a local network, you have to start it with `php -S 0.0.0.0:port_of_your_choice`
and then look up your local ip adress and type that in to your phone and it should appear!


## OBS!!!

If you are planning to run this "public", you really shouldn't. There is nothing that protects anything
from anything, there also is nothing stopping whomever to remove something. But if you fix that then
no problem, perhaps making so that if the request comes from your home local ip it allows, and if not it
doesn't allow?

You don't want to do anything yourself?
well, we'll see in the future what happens. Don't hold your breath though...

# Installation

1. Open your terminal
2. Go to the projects root directory.
3. Run the command './setup.sh'
4. After setup is done, and you chose to not run but changed your mind, run './start.sh'
5. Open browser of choice and type in the url.
6. Enjoy!

# How to use

* Add Location by typing in the name and clicking add.
* When a location exists, you can add items to that location by choosing it in the dropdown and then typing in the item name.
* To show where items are, simply click the search button with no input to list them all.
* When you have found your item and its location you can click on the see more button.
* Now you should've got a bit more info about the item, and buttons to update the amount or delete the item from the location.

<img src="misc/screenshot.jpg">

# Code Review

Code review written by [Emma Hansson](https://github.com/h-emma).

1. `Overall` - The naiming of the files and folders makes it easy to understand what the data in them will execute.
2. `components/api/classpath.php:1-3 ` - Could be good to specify in a comment that explains where the path goes.
3. `components/classes/class-curd.php` - It’s easy to understand what the functions do when you have been written comments above them.
4. `components/app.php` - Missing <label> for all <input>. The labels are necessary to make the site more accessible.
5. `style.css:28` - It’s good that you keep your code DRY and that you placed several elements/classes with the same styling together.
6. `components/api/addLocation.php:9` - The error messages are only visible in the console and not in the interface. You might consider to print the output directly to the interface for user feedback.

# Testers

Tested by the following people:

1. Jane Doe
2. John Doe
