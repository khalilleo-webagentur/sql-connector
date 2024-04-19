### SQL Connector

The ability to transfer data from sql db to any project use doctine.

### Requirements

* PHP `^8.1`

### Installation

`composer require khalilleo-webagentur/sql-connector`

### Usage

```php
<?php

use Khalilleo\Connector\PdoConnect;
use Khalilleo\Connector\SqlOperation;

require 'vendor/autoload.php';

$connect = new PdoConnect('localhost', 'db_name', 'db_user', 'db_password');

$query = new SqlOperation($connect->pdo, 'user_table');

// SqlOperation::find(..)
// SqlOperation::findOneBy(..)
// SqlOperation::findBy(..)
// SqlOperation::findAll(..)
// SqlOperation::query(..)
// SqlOperation::save(..)
// SqlOperation::remove(..)

die(var_export($query->find(1), true)); // 1 => WHERE user_id = 1
```

### Copyright

This project is licensed under the [MIT](http://www.opensource.org/licenses/mit-license.php) License.