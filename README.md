### Installation

`composer install`


### Database
`php artisan migrate`
`php artisan db:seed --class '\App\Ship\Seeders\DatabaseSeeder'`

Seeds will create couple of test groups.

### Routes:
GET: api/customer - list all customers
GET: api/customer/{customer_id} - show specific customer
GET: api/customer/all/{customer_id} - show specific customer with customer groups
POST: api/customer - create customer with parameters in body
```
{
	"firstname": "testname",
	"surname": "testsurname",
	"email": "test@gmail.com",
	"phone": "+420999888777",
	"groups": [1, 2]
}
```
PATCH: api/customer/{customer_id} - update specificcustomer with parameters in body
DELETE: api/customer/{customer_id} - delete specific customer
