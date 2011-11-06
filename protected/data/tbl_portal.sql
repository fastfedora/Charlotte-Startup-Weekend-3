CREATE TABLE tbl_portal (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER NOT NULL,
    title VARCHAR(128) NOT NULL,
    background MEDIUMBLOB,
    auth_message VARCHAR(140) NULL,
    landing_url VARCHAR(2048) NULL,

    FOREIGN KEY (user_id) REFERENCES tbl_user(id)
);
