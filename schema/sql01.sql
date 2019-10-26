CREATE TABLE issues (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description VARCHAR(255),
priority ENUM('Low', 'Medium', 'High') DEFAULT 0 NOT NULL,
closed BOOLEAN NOT NULL DEFAULT 0,
updated_at TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
created_at TIMESTAMP NOT NULL);