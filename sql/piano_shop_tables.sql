CREATE TABLE brands (
    brand_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) CHARACTER SET utf8 collate utf8_general_ci NOT NULL
) ENGINE=INNODB;
CREATE TABLE types (
    type_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
)ENGINE=INNODB;
CREATE TABLE admins (
    admin_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(130) NOT NULL,
    password varchar(130) NOT NULL
)ENGINE=INNODB;
CREATE TABLE pianos (
    piano_id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(25) CHARACTER SET utf8 collate utf8_general_ci NOT NULL,
    name VARCHAR(75) CHARACTER SET utf8 collate utf8_general_ci NOT NULL,
    description TEXT  CHARACTER SET utf8 collate utf8_general_ci NOT NULL,
    in_stock BOOLEAN NOT NULL DEFAULT FALSE,
    brand_id TINYINT,
    type_id TINYINT,
    img_url VARCHAR(100) NOT NULL,
    video_url VARCHAR(100) NOT NULL,
    FOREIGN KEY (brand_id)
        REFERENCES brands (brand_id)
        ON UPDATE RESTRICT ON DELETE CASCADE,
    FOREIGN KEY (type_id)
        REFERENCES types (type_id)
        ON UPDATE RESTRICT ON DELETE CASCADE

)ENGINE=INNODB;
-- insert brands, types and admin
INSERT INTO types VALUES
           (NULL, 'upright'),
           (NULL,'grand piano');
INSERT INTO brands VALUES
           (NULL, 'bösendorfer'),
           (NULL, 'kawai'),
           (NULL, 'bechstein'),
           (NULL, 'steinway'),
           (NULL, 'yamaha'),
           (NULL, 'fazioli')
;
-- insert a piano for testing only
INSERT INTO pianos VALUES
            (NULL, 'bos_03', 'kawai upright grand',
              'This is the upright piano of your dreams...', TRUE, 2, 1,
               'img.jpg', 'https://video.com');
-- insert admin
INSERT INTO admins VALUES
            (NULL, 'pianoadmin', 'pianoadmin');
-- example of retrieving the brand FROM the pianos.brand_id
SELECT brands.name AS 'brand name' FROM pianos JOIN brands WHERE brands.brand_id = pianos.brand_id and pianos.piano_id=1;
-- get all the data FROM pianos
-- pianos.piano_id, pianos.name, pianos.model,
SELECT
  pianos.piano_id,pianos.name, pianos.model, pianos.description, pianos.img_url,pianos.video_url,
  brands.name AS 'brand name',
  types.name AS 'piano type'
 FROM pianos
  LEFT JOIN brands ON brands.brand_id = pianos.brand_id
  LEFT JOIN types ON types.type_id=pianos.piano_id
  ;
-- get all upright pianos
SELECT
  pianos.piano_id,pianos.name, pianos.model, pianos.description, pianos.img_url,pianos.video_url,
  brands.name AS 'brand name',
  types.name AS 'piano type'
 FROM pianos
  LEFT JOIN brands ON brands.brand_id = pianos.brand_id
  LEFT JOIN types ON types.type_id=pianos.piano_id
  WHERE pianos.type_id = 1
  ;
-- get all grand pianos
SELECT
  pianos.piano_id,pianos.name, pianos.model, pianos.description, pianos.img_url,pianos.video_url,
  brands.name AS 'brand name',
  types.name AS 'piano type'
 FROM pianos
  LEFT JOIN brands ON brands.brand_id = pianos.brand_id
  LEFT JOIN types ON pianos.piano_id=types.type_id
  WHERE pianos.type_id = 2
  ;
-- select by brand
SELECT
  brands.name AS 'brand name',
  pianos.piano_id,pianos.name, pianos.model, pianos.description, pianos.img_url,pianos.video_url,
  types.name AS 'piano type'
 FROM pianos
  LEFT JOIN brands ON brands.brand_id = pianos.brand_id
  LEFT JOIN types ON pianos.piano_id=types.type_id
  WHERE pianos.brand_id = 2
  ;
-- UPDATE, read again
UPDATE pianos SET WHERE piano_id = 1, name = 'nombre',
        model = 'modelo',
        description = 'description nueva',
        img_url = 'nueva url',
        video_url = 'nueva url'
        ;
-- DELETE
DELETE FROM pianos WHERE piano_id = 3;
