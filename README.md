# Service for finding performers for one-time tasks "TaskForce"

A project from the HTML Academy (layout), the functionality of which was implemented using the Laravel php framework

## Briefly about the functionality

The user (customer) creates a task and assigns his price for the completion, other users (performers) can respond and suggest their price. After studying each response, the customer chooses a performer for this task. They can discuss all the details and questions via messenger. At any time, the user can refuse to complete the task, but his rating will be lowered. In case of the successfull task completion, the customer closes the task and evaluates the quality of the performer's work, and the current rating of the performer will be affected positively or negatively.

## Features

- ability to create a task and assign a performer
- built-in messenger for each task (appears when a performer is assigned)
- notification system
- extensive filter of tasks and users
- each user has their own rating
- 4 types of task statuses - "Active", "Completed", "Canceled", "Expired"
- the ability to attach files to the task and download them from the server
- user settings, the ability to add additional data or disable notifications
- online status system for users
- the ability to add a user to favorites
- use of Yandex Maps on the page of those tasks where the address is specified

## Technologies

- Laravel 8
- MySQL
- VueJS
- html
- css
- js

## How to launch the project
1. Download OpenServer
2. Download project and extract the zip archive inside OpenServer's 'domains' folder
3. Launch OpenServer and the project

## Hosting

The service is hosted by Heroku</br>
http://taskforce-github.herokuapp.com/
