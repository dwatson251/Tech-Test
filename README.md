## Daniel Watsons Implementation

This is my solution; a scalable, custom MVC.

Using ideas from MVC's like Laravel and Zend, I created a custom MVC with autoloading and custom controller and model support as well as very basic validation, which can be expanded very easily.

I feel that this was the more effective ways to complete this task, as by developing a small MVC framework I am able to completely seperate the concerns of the application, as well as making it scalable.

## Instructions for use
I didn't go in to too much detail with deployments, so you'll need to set up the environment manually. Luckily, you'll just need to edit the DB information within [config.php](app/config.php) and create a new table called "user" (Which matches the Model name) with the following rows:

- id (int | Primary Key | Auto Increment)
- firstname (VARCHAR (255))
- lastname (VARCHAR (255))
- job_role (VARCHAR (255))

Then navigate, within the application to <domain.app>/public/users

# 9xb Technical Test

## Introduction

Welcome to the 9xb Technical Test for Web and Applications Developers. This test has been developed to be simple and straightforward, and give you the ability to show what you're capable of within the technologies listed in this brief.

Take as long as you feel is required to complete the test, but please keep a note of how long you've spent and include it with the deliverables described at the bottom of this readme.

## Requirements

The requirement of this test is to develop a server-side solution to perform CRUD operations (Create, Read, Update and Delete) on the list displayed in the supplied [markup](form.html).

The list should be limited to 10 records in total, and a maximum of 4 records assigned per "Job Role".

For data storage, the solution should use a MySQL database, with a schema that you deem most appropriate.

You don't need to go beyond the above requirements, however feel free to add any additional functionality that you feel will enhance the solution that you produce.

## Technical Requirements

The requirements of the solution are that the following technologies are utilised:

* PHP
* MySQL
* Capable of running in a Apache/Linux environment
* Version Control, preferably Subversion or Git

## Considerations

Use best practice for all the code you develop for the solution. We have interest in the following areas:

* Model/View/Controller (MVC) architecture
* Simplicity & readability
* Scalability
* Security
* Performance
* Normalisation in data storage

## Markup

The markup to be used for the solution is within [form.html](form.html).

## Deliverables

* Instructions on how to run your solution
* A description of development choices made and why
* How long the solution took to implement
* Revision history from the VCS. If using Subversion, use [`svnadmin dump`](http://svnbook.red-bean.com/en/1.7/svn.ref.svnadmin.c.dump.html). If using Git, create a [`git bundle`](https://git-scm.com/docs/git-bundle).