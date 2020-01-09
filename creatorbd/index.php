<?php
	$servername = "localhost";
	$username = "admin";
	$password = "zaO0pU4F2UeejVf";
	
	$conn = mysqli_connect($servername, $username, $password);
	
	if (!$conn)
	{
		die("connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfully!\n";
	
	//база данных
	$sql = "CREATE DATABASE autoservice";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Database autoservice created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #1 должность
	$dbname = "autoservice";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$sql = "CREATE TABLE positions(
		id_position SERIAL PRIMARY KEY,
		name_position text NOT NULL,
		classification_lvl integer)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table positions created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #2 тип услуги
	$sql = "CREATE TABLE type_services(
		id_type_service SERIAL PRIMARY KEY,
		name_type_service text NOT NULL,
		price_type_service integer NOT NULL,
		type_service_description text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table type_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #3 сотрудники
	$sql = "CREATE TABLE workers(
		id_worker SERIAL PRIMARY KEY,
		fio_worker text NOT NULL,
		position integer REFERENCES positions (id_position),
		phone_number_worker integer NOT NULL,
		worker_adress text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table workers created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #4 владелец
	$sql = "CREATE TABLE car_owners(
		driver_license integer UNIQUE,
		fio_owner text NOT NULL,
		phone_number_car_owner integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table car_owners created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #5 автомобиль
	$sql = "CREATE TABLE cars(
		num_car char(10) UNIQUE,
		car char(30),
		car_owner integer REFERENCES car_owners (driver_license))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table cars created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #6 сервисы
	$sql = "CREATE TABLE services(
		id_services SERIAL PRIMARY KEY,
		service_adress text,
		phone_number_service integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//таблица #7 обслуживающий сервис
	$sql = "CREATE TABLE maintenance_services(
		id_order SERIAL PRIMARY KEY,
		id_maintenance_service integer REFERENCES services (id_service),
		type_service integer REFERENCES type_services (id_type_service),
		serviced_car char(10) REFERENCES cars (num_car),
		availability_date timestamp,
		worker integer REFERENCES workers (id_worker))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table maintenance_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	/*
	//
	//       ТРИГГЕРЫ УДАЛЕНИЯ
	//
	
	//триггер #1 удаление владельца
	$sql = "CREATE TRIGGER remove_car_owners AFTER DELETE ON car_owners
			FOR EACH ROW BEGIN
			   DELETE FROM cars WHERE car_owner = OLD.driver_license;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_car_owners created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #2 удаление машины
	$sql = "CREATE TRIGGER remove_cars AFTER DELETE ON cars
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_services WHERE serviced_car = OLD.num_car;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_cars created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #3 удаление должности
	$sql = "CREATE TRIGGER remove_positions AFTER DELETE ON positions
			FOR EACH ROW BEGIN
			   DELETE FROM workers WHERE position = OLD.id_position;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_positions created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #4 удаление работника
	$sql = "CREATE TRIGGER remove_workers AFTER DELETE ON workers
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_services WHERE worker = OLD.id_worker;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_workers created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #5 удаление сервисов
	$sql = "CREATE TRIGGER remove_services AFTER DELETE ON services
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_services WHERE id_maintenance_service = OLD.id_services;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #6 удаление услуг
	$sql = "CREATE TRIGGER remove_type_services AFTER DELETE ON type_services
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_services WHERE type_service = OLD.id_type_service;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_type_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	//
	//       ТРИГГЕРЫ ИЗМЕНЕНИЯ
	//
	
	//триггер #1 изменение владельца
	$sql = "CREATE TRIGGER update_car_owners AFTER UPDATE ON car_owners
			FOR EACH ROW BEGIN
			   UPDATE cars SET car_owner = NEW.driver_license WHERE car_owner = OLD.driver_license;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_car_owners created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #2 изменение машины
	$sql = "CREATE TRIGGER update_cars AFTER UPDATE ON cars
			FOR EACH ROW BEGIN
			   UPDATE maintenance_services SET serviced_car = NEW.num_car WHERE serviced_car = OLD.num_car;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_cars created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #3 изменение должности
	$sql = "CREATE TRIGGER update_positions AFTER UPDATE ON positions
			FOR EACH ROW BEGIN
			   UPDATE workers SET position = NEW.id_position WHERE position = OLD.id_position;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_positions created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #4 изменение работника
	$sql = "CREATE TRIGGER update_workers AFTER UPDATE ON workers
			FOR EACH ROW BEGIN
			   UPDATE maintenance_services SET worker = NEW.id_worker WHERE worker = OLD.id_worker;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_workers created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #5 изменение сервисов
	$sql = "CREATE TRIGGER update_services AFTER UPDATE ON services
			FOR EACH ROW BEGIN
			   UPDATE maintenance_services SET id_maintenance_service = NEW.id_services WHERE id_maintenance_service = OLD.id_services;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//триггер #6 изменение услуг
	$sql = "CREATE TRIGGER update_type_services AFTER UPDATE ON type_services
			FOR EACH ROW BEGIN
			   UPDATE maintenance_services SET type_service = NEW.id_type_service WHERE type_service = OLD.id_type_service;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_type_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}*/
	
	//
	//      ИНДЕКСЫ
	//
	
	//индекс #1 выборка обслуживающего сервиса
	$sql = "CREATE INDEX index_maintenance_services ON maintenance_services(id_order, id_maintenance_service, type_service, serviced_car, availability_date, worker)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_maintenance_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//индекс #2 выборка владельца
	$sql = "CREATE INDEX index_car_owners ON car_owners(driver_license, phone_number_car_owner)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_car_owners created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//индекс #3 выборка машины
	$sql = "CREATE INDEX index_cars ON cars(num_car, car, car_owner)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_cars created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//индекс #4 выборка должности
	$sql = "CREATE INDEX index_positions ON positions(id_position, classification_lvl)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_positions created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	//индекс #5 выборка работника
	$sql = "CREATE INDEX index_workers ON workers(id_worker, position, phone_number_worker)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_workers created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	//индекс #6 выборка сервисов
	$sql = "CREATE INDEX index_services ON services(id_services, phone_number_service)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
	
	//индекс #7 выборка услуг
	$sql = "CREATE INDEX index_type_services ON type_services(id_type_service, price_type_service)";

	if (mysqli_query($conn, $sql))
	{
		echo "Index index_type_services created successfully!\n";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
	}
?>