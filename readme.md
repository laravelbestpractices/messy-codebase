# Messy Codebase

This is a Laravel application that is intentionally written to violate each known best practices.

### Features


### Feature #1
```
Feature: Display Thumbnails
  In order to show photos
  Visitors should be able to
  see a list of thumbnails to vote

  Scenario: Visit Home Page
    Given Im on home page
    Then I should see a list of thumbnails
```

### Feature #2
```
Feature: Voting
  In order to get votes
  Visitors should be able to
  click a button to vote

  Scenario: Upvote
    Given Im on home page
    And I like a certain photo
    When I press the upvote button
    Then It should increase the votes for that thumbnail

  Scenario: Downvote
    Given Im on home page
    And I dislike a certain photo
    When I press the downvote button
    Then It should decrease the votes for that thumbnail
```


### Local environment via Docker


For developing locally, it is recommended to have docker-compose in order to setup all the software required. Just to go the project's root folder and type:

```
docker-compose up -d
```

then you can login to the workspace

for MacOS/Linux
```
docker exec -it reverseproxy-admin_workspace_1 /bin/bash
```
for Windows
```
winpty docker exec -it reverseproxy-admin_workspace_1 bash
```

all the required tools is present inside this container for you to use. Otherwise, feel free to install all the requirements as mentioned above.



### Installation

Copy the .env.example file

```
cp .env.example .env
```

install the dependencies
```
composer install
```

generate app key
```
php artisan key:generate
```

