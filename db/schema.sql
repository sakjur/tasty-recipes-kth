/*
 * Contains the schema for the Tasty Recipes site in ID1354
 * 
 * Copyright 2014 Emil Tullstedt <emiltu@kth.se>
 */

CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE users
(
    id          serial PRIMARY KEY,
    username    varchar(100) UNIQUE NOT NULL,
    email       varchar(255),
    password    text
);

CREATE TABLE sessions
(
    id          serial PRIMARY KEY,
    user_id     integer NOT NULL,
    session     text NOT NULL,
    datetime    timestamp with time zone DEFAULT now(),
    active      boolean DEFAULT TRUE,
    CONSTRAINT sessions_fk1 FOREIGN KEY (user_id)
        REFERENCES users (id)
);

CREATE TABLE recipes
(
    id          serial PRIMARY KEY,
    slug        varchar(100) UNIQUE NOT NULL 
);

CREATE TABLE comments
(
    id              serial PRIMARY KEY,
    user_id         integer,
    recipe_id       integer NOT NULL,
    comment         text NOT NULL,
    time_created    timestamp with time zone,
    CONSTRAINT comment_fk1 FOREIGN KEY (user_id)
        REFERENCES users (id),
    CONSTRAINT comment_fk2 FOREIGN KEY (recipe_id)
        REFERENCES recipes (id)
);

INSERT INTO recipes(slug) VALUES ('meatballs');
INSERT INTO recipes(slug) VALUES ('pancakes');

CREATE VIEW comments_by_recipes AS
    SELECT username, email, comment, time_created
    FROM users, comments, recipes
    WHERE comments.recipe_id = recipes.id;

/* Copied from http://www.hagander.net/talks/Secure%20password%20storage.pdf */
CREATE OR REPLACE FUNCTION login(_username text, _pwd text, 
    OUT _session_key text)
    RETURNS text 
AS $$
DECLARE
    _userid integer;
BEGIN
    _session_key := (SELECT crypt(_username || current_timestamp,
        gen_salt('bf'))  FROM users
            WHERE users.username = _username
            AND password = crypt(_pwd, users.password));
    _userid := (SELECT id FROM users WHERE username = _username);
    INSERT INTO sessions (user_id, session) VALUES (_userid, _session_key);
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION add_user(INOUT _userid text, _pwd text, 
    INOUT _email text)
    RETURNS record
AS $$
BEGIN
    INSERT INTO users(username, password, email)
        VALUES (_userid, crypt(_pwd, gen_salt('bf')), _email);
END;
$$ LANGUAGE plpgsql;
