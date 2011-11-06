CREATE TABLE tbl_client_user (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    access_point_id INTEGER NOT NULL,
    phone VARCHAR(20) NOT NULL,
    auth_code VARCHAR(20) NOT NULL,
    auth_token VARCHAR(512) NOT NULL,
    mac_address VARCHAR(100) NULL,
    redirurl VARCHAR(2048) NULL,
    create_time DATETIME NOT NULL
);
