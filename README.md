<h1>Mail API Consumer</h1>

## Motivation

A simple application that will send transactional emails when a user is created or a password reset


## Running application
In order to use this application along with the Mail Api, you'll need to use docker-compose.

First do not forget to set a valid mailer, in this case used for the application to send verification mails.
    
    MAIL_MAILER=
    MAIL_HOST=
    MAIL_PORT=
    MAIL_USERNAME=
    MAIL_PASSWORD=

Set the 'From' sender in order to be used by the application to send verification mails or to contact the mail-api

    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=

First setup the mail-api with:
docker-compose up

Then setup this project using the same command:
docker-compose up
