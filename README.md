<div align="center">
  <h1>Contract Testing with Pact</h1>
</div>
<br>


# Description

This repository aims to exemplify, in a simple and practical way, the execution of contract tests with
Pact using different languages for each application. 


# Flow

The flow used is as simple as possible to carry out the communication of the provider and consumer tests.
It is far from ideal for use in software productions!
If you want a complete flow for your application, I recommend
[Nirvana for contract test](https://github.com/PauloGoncalvesBH/nirvana-teste-de-contrato) which makes use of CI for verification steps.

<img src=".github/fluxo-pact-broker.png" width="500px" height="400px"/>

## Pact Broker
The [Pact Broker](docker-compose.yml) is responsible for the communication between the systems, ensuring the execution of the tests
On both sides. Thus, the consumer sends the contract containing the information he expects to receive on a given route.
and the provider downloads this contract, executes it locally, checking if the data is being sent as expected and returns
test results for the Pact Broker.

### Prerequisites
- [Docker](https://docs.docker.com/get-docker/)
- [Docker-compose](https://docs.docker.com/compose/install/)

### Run Pact Broker
 ```
docker-compose up
 ```

## Consumer
O [consumer](./consumer) it is the application that consumes the API, it is responsible for making data requests to the provider.

#### Prerequisites
- Docker

### Install
 ```
 make build
 ```
### Run terminal in docker
 ```
 make run-it
 ```
### Run tests
 ```
 npm run test:consumer
 ```
### Publish the contract
 ```
 npm run pact:publish
 ```

## Provider
The [provider](./provider) is the application that promotes the API, is responsible for sending the data requested by the consumer.

#### Prerequisites
- PHP
- composer
 
### Up the application
 ```
 php -S localhost:8000
 ```

### Run tests
 ```
vendor/bin/phpunit
 ```
