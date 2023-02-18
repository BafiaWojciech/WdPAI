create table if not exists "user"
(
    user_id  serial
        primary key,
    username varchar(50)  not null
        unique,
    email    varchar(255) not null
        unique,
    password varchar(255) not null
);

alter table "user"
    owner to dbuser;

create table if not exists flashcard
(
    flashcard_id serial
        primary key,
    front        varchar(512),
    back         varchar(512),
    progress     integer,
    flag         integer,
    user_id      integer not null
        references "user"
);

alter table flashcard
    owner to dbuser;
