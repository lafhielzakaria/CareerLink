create database CareerLink;

use CareerLink;

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    password VARCHAR(255),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles (id)
);

CREATE TABLE candidates (
    user_id INT PRIMARY KEY,
    skills TEXT,
    salary_expectation DECIMAL(10, 2),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE recruiters (
    user_id INT PRIMARY KEY,
    company_name VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users (id)
);

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
);

create table category (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    title varchar(50),
    FOREIGN key (user_id) REFERENCES users (id)
);

create table tags (
    id int PRIMARY KEY AUTO_INCREMENT,
    category_id int,
    title varchar(50),
    FOREIGN key (category_id) REFERENCES category (id)
);

create table user_skills (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    skill_id int,
    FOREIGN key (skill_id) REFERENCES tags (id)
);

create table job_offre (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    title varchar(50),
    description varchar(255),
    FOREIGN key (user_id) REFERENCES recruiters (user_id),
    deleted_at TIMESTAMP NULL DEFAULT NULL
);

create table job_offre_recommended (
    id int PRIMARY key AUTO_INCREMENT,
    job_offre_id int,
    tag_id int,
    FOREIGN key (job_offre_id) REFERENCES job_offre (id),
    FOREIGN key (tag_id) REFERENCES tags (id)
);

create table condidate_apply (
    id int PRIMARY KEY AUTO_INCREMENT,
    user_id int,
    job_offre_id int,
    FOREIGN key (user_id) REFERENCES users (id),
    FOREIGN key (job_offre_id) REFERENCES job_offre (id)
);