<?php
/*megrations diro fuh ay script fuh alter table ola creat table , add column ,modify column */
 /*l7wayj limakhshomx ykono : insert oul update  */
$sql = "  
create table users (
    id int PRIMARY KEY,
    first_name varchar (50),
    last_name varchar (50),
    password varchar (50)
);
create table role(
    id int PRIMARY KEY,
    user_id int PRIMARY key,
    user_role varchar (50),
    FOREIGN key (user_id) REFERENCES users (id)
);
create table category(
    id int PRIMARY KEY,
    user_id varchar(50),
    title varchar (50),
    FOREIGN key (user_id) REFERENCES users(id)
    
);
create table tags(
    id int PRIMARY KEY,
    category_id int,
    title varchar (50),
    FOREIGN key (category_id) REFERENCES category (id)
);
create table user_skills (
    id int PRIMARY KEY,
    user_id int,
    skill_id int,
    FOREIGN key(skill_id) REFERENCES tags(id) 
);
create table job_offre(
    id int PRIMARY KEY,
    user_id int,
    title varchar (50),
    description varchar (100000),
    FOREIGN key (user_id) REFERENCES users (id)
);
create table job_offre_recommended (
    id int PRIMARY key,
    job_offre_id int,
    tag_id int,
    FOREIGN key (job_offre_id) REFERENCES job_offre (id),
    FOREIGN key (tag_id) REFERENCES tags(id)
);
   create table condidate_apply(
    id int PRIMARY KEY,
     user_id int,
    job_offre_id int,
    FOREIGN key (user_id) REFERENCES users (id),
    FOREIGN key (job_offre_id) REFERENCES  job_offre(id)
)";