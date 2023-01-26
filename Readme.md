# Readme
This repository is used to connect to the Enelogic webservice which
can be accessed on https://enelogic.com/api/

This client currently offers the following 

- Buildings
- Datapoints
- Devices
- MeasuringPoints
- Organizations

## Installation
composer install jjtbsomhorst/enelogic

## How to use
To use this repository you need to have

- a valid username/password for Enelogic
- Register an application within Enelogic using this guide:
  https://enelogic.docs.apiary.io/#
- Store the oauth token on a place the client can reach it
- Create a new Instance of the Client:

```
$client = new EnelogicClient(
  PersistanceInterface,
  $enelogicAppId,
  $enelogicSecret);

// get all buildings

$buildings = $client->buildings()->list();

// get a single building

$building = $client->buildings()->single($id);


