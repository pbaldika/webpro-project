/*
CREATE TABLE "admin"
(
    "id" int(11) NOT NULL,
    "username" varchar(100) DEFAULT NULL,
    "password" varchar(100) DEFAULT NULL,
    "updation_date" timestamp NULL DEFAULT NULL
)

CREATE TABLE "packages"
(
    "htl_id" int(11) NOT NULL,
    "pkg_id" int(11) NOT NULL,
    "pkg_name" varchar(200) DEFAULT NULL,
    "pkg_type" varchar(150) DEFAULT NULL,
    "pkg_price" int(11) DEFAULT NULL,
    "pkg_features" varchar(255) DEFAULT NULL,
    "pkg_details" mediumtext DEFAULT NULL,
    "pkg_image" varchar(100) DEFAULT NULL,
    "creation_date" timestamp NULL DEFAULT current_timestamp(),
    "updation_date" timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
)

CREATE TABLE "booking"
(
    "booking_id" int(11) NOT NULL,
    "pkg_id" int(11) DEFAULT NULL,
    "user_email" varchar(100) DEFAULT NULL,
    "in_date" varchar(100) DEFAULT NULL,
    "out_date" varchar(100) DEFAULT NULL,
    "booking_date" timestamp NULL DEFAULT current_timestamp(),
    "status" int(11) DEFAULT NULL,
    "updation_date" timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() 
)
*/

CREATE TABLE "hotels"
(
    "htl_id" int(11) NOT NULL,
    "htl_name" varchar(200) DEFAULT NULL,
    "htl_location" varchar(100) DEFAULT NULL,
    "htl_image" varchar(100) DEFAULT NULL,
    "creation_date" timestamp NULL DEFAULT current_timestamp(),
    "updation_date" timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
)

INSERT INTO "hotels" ("htl_id", "htl_name", "htl_location", "htl_image", "creation_date", "updation_date") VALUES
(1, "Central Hotel KLIA", "KLIA Terminal 2", "portfolio-2.jpg", "2021-07-09 06:03:00", NULL),
(2, "Central Hotel Sepang", "Sepang", "portfolio-3.jpg", "2021-07-09 06:03:00", NULL);

