
## Task Requirement Description:
- Create a single page application that uses the database provided (SQLite 3) to list and
categorize country phone numbers.
Phone numbers should be categorized by country, state (valid or not valid), country code and
number.
- The page should render a list of all phone numbers available in the DB. It should be possible to
filter by country and state with server-side rendering Pagination.

```
 customers: id, name, phone
```

- country codes stored with the phone ex.  .

```
 (212) 6007989253
```

- provided with task the valid regex for each country code ex

```
Cameroon | Country code = +237 | regex = \(237\)\ ?[2368]\d{7,8} $
````

## Task Workflow Description
* First Validate given parameters using `FormValidation` then `CustomersController` passes the request to `CustomerService` which responsible to handle customers business logic.

* Retrieving the customers using `customerRepository` which responsible for database layer and return all customers and apply country filter over the database layer if country code query parameter provided.

* Now for unfiltered customers the state and country should be added to the customer object and for the filtered ones it already has the country but the state still needed this can be achieved by applying the provided regex to each customer separately.

* Using abstract factory design pattern each customer could have the country and state to achieve this all the countries was created seperated over classes and use `CountryFactory` to create a country object passed on phone number.

* Now each customer has the state and country attributes and the country filter applied the last step is to filter customers by state if state query parameter provided.

* Replacing the database never been easier by depending on one interface and bind the right repository, using this approch replacing sqlite with mysql for example is easy need only to crate new repository `MysqlCustomerRepository` for example which implements `CustomerInterface` and ask `AppServiceProvided` to bind
  `MysqlCustomerRepository` instead of `SqliteCustomerRepository`.

## How to run
1. Clone the project.
2. Run `composer install`.
3. Set up .env (copy .env.example file to .env)
4. Run `php -S localhost:8000 -t public`

## API's
1. GET `/api/customers/` : index all customers in database with computed attribute state.
* Could filter by country by adding query param country={countryCode} .
* Could filter by state by adding query param state={true} .

## Used technologies
1. Framework Lumen 9
2. PHP 8.0
3. sqlite3
4. Vue.js 
