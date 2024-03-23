# Project Name
WALLET API

## Installation
To get started with the project, follow these steps:

Copy .env.example file to .env and update DB credentials:
```cp .env.example .env```

Build the Docker images:
```docker-compose build```

Start the Docker containers:
```docker-compose up -d```

Execute in Wallet-App container:
```docker exec -it wallet-app bash```

Run the database migrations:
```php artisan migrate```

If error, unable to copy files over, go to the project folder:
``` docker cp . wallet-app:/var/www; docker exec wallet-app chown -R www-data:www-data /var/www/storage; docker exec wallet-app  chmod -R 775 /var/www/storage ```

## Feature
Customers
- Create
  - Create customer will create the respective wallet
- View
- Update
- Delete
  - Delete customer will delete the respective wallet

Wallet
- Topup
  - To topup the balance
- Pay
  - To deduct the balance from the wallet

## POSTMAN to test API
```
{
	"info": {
		"_postman_id": "87aeb2d4-9f72-4e29-ad47-bc4eac9a4f19",
		"name": "Wallet",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "12212979"
	},
	"item": [
		{
			"name": "Get Customer List",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://localhost:8080/api/customers",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"customers"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Customer",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "first_name",
							"value": "First",
							"type": "text"
						},
						{
							"key": "last_name",
							"value": "Last",
							"type": "text"
						},
						{
							"key": "full_address",
							"value": "Full Address",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "http://localhost:8080/api/customers",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"customers"
					]
				}
			},
			"response": []
		},
		{
			"name": "Update Customer",
			"request": {
				"method": "PUT",
				"header": [],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "first_name",
							"value": "Updated First",
							"type": "text"
						},
						{
							"key": "last_name",
							"value": "Updated Last",
							"type": "text"
						},
						{
							"key": "full_address",
							"value": "Updated Address",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "http://localhost:8080/api/customers/1",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"customers",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Show Customer",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "http://localhost:8080/api/customers/1",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"customers",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Delete Customer",
			"request": {
				"method": "DELETE",
				"header": [],
				"url": {
					"raw": "http://localhost:8080/api/customers/1",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"customers",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Top up",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "amount",
							"value": "100",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "http://localhost:8080/api/wallets/topup/1",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"wallets",
						"topup",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Pay",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "urlencoded",
					"urlencoded": [
						{
							"key": "amount",
							"value": "12.9",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "http://localhost:8080/api/wallets/pay/1",
					"protocol": "http",
					"host": [
						"localhost"
					],
					"port": "8080",
					"path": [
						"api",
						"wallets",
						"pay",
						"1"
					]
				}
			},
			"response": []
		}
	]
}
```
