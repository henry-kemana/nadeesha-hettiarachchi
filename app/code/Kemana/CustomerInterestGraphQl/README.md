# Mage2 Module Kemana CustomerInterestGraphQl

    ``kemana/module-customerinterestgraphql``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Customer Interest GraphQl Module

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Kemana`
 - Enable the module by running `php bin/magento module:enable Kemana_CustomerInterestGraphQl`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require kemana/module-customerinterestgraphql`
 - enable the module by running `php bin/magento module:enable Kemana_CustomerInterestGraphQl`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - GraphQl Endpoint
	- Interest


## EXAMPLE GRAPHQL QUERIES

- CustomerInterest GraphQl
  query {
  CustomerInterest(
  cusId : 6
  ){
  myInterest
  }
  }
- Customer Registration GraphQl
- mutation {
  createCustomer(
  input: {
  firstname: "Nadeesha"
  lastname: "Hettiarachchi"
  email: "nadeefit6@gmail.com"
  password: "test123@w"
  my_interest: "cycling"
  }
  ) {
  customer {
  id
  firstname
  lastname
  email
  }
  }
  }



