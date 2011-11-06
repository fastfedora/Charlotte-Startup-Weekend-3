CREATE TABLE tbl_sponsor (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    portal_id INTEGER NOT NULL,
    name VARCHAR(512) NOT NULL,
    url VARCHAR(2048) NOT NULL,
    status INTEGER NOT NULL,
    logo MEDIUMBLOB,
    logo_content_type VARCHAR(50) NOT NULL,

    FOREIGN KEY (portal_id) REFERENCES tbl_portal(id)
);
