
# Laravel Courier Delivery

Project with the described possible architecture of Delivery creation. It supports the expand of existed logic.

Main logic of the application work can be found in:

API file courier.php: 
```http
  POST /api/couriers/create-delivery
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `recipient_id` | `int` | **Required**. Reference to the Recipient |
| `post_office_type` | `string` | **Required**. Type of the Post Office existed in applicetion |
| `package_type` | `string` | **Required**. Type of the Package |
| `package_width` | `number` | **Required**. Package width wit minimum value 0.5 and maximum 999.99 |
| `package_height` | `number` | **Required**. Package height wit minimum value 0.5 and maximum 999.99 |
| `package_length` | `number` | **Required**. Package length wit minimum value 0.5 and maximum 999.99 |
| `package_weight` | `number` | **Required**. Package weight wit minimum value 0.5 and maximum 999.99 |
| `package_address` | `string` | **Required**. Shipping Address|
| `delivery_address` | `string` | **Required**. Delivery Address|


Logic of Delivery creation and selection of the Post Office located:
```http
  DeliveryService | Services/Delivery/DeliveryService.php
```


##
# Architecture Scaling

Inside of application provided basic structure for the Delivery Service, it also can be expanded in a further developmen.
There is description of possible API's for delivery service such as:
```http
  Recipient API - routes/recipient.php - API for storing, updating, reciving the Recipients
```

```http
  Post Office API - routes/post-offices.php - API for storing, updating, reciving the Post Offices
```

Interface with the Description of basic logic of Post Office data sending:
```http
  Post Office Interface - Services/AbstractClasses/PostOffice.php
```

Code also provides the comments of each class and function.