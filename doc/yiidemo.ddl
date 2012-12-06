CREATE TABLE tbl_author (
  id     int(10) NOT NULL AUTO_INCREMENT, 
  uname  varchar(50), 
  avatar varchar(255), 
  PRIMARY KEY (id)) CHARACTER SET UTF8;
CREATE TABLE tbl_comment (
  id        int(10) NOT NULL AUTO_INCREMENT, 
  postid    int(10) NOT NULL, 
  title     varchar(100), 
  content   varchar(200), 
  createdat int(10), 
  PRIMARY KEY (id)) CHARACTER SET UTF8;
CREATE TABLE tbl_post (
  id        int(10) NOT NULL AUTO_INCREMENT, 
  uid       int(10) NOT NULL, 
  title     varchar(100), 
  content   longtext, 
  createdat int(10), 
  PRIMARY KEY (id)) CHARACTER SET UTF8;
ALTER TABLE tbl_post ADD INDEX FKtbl_post679727 (uid), ADD CONSTRAINT FKtbl_post679727 FOREIGN KEY (uid) REFERENCES tbl_author (id);
ALTER TABLE tbl_comment ADD INDEX FKtbl_commen921410 (postid), ADD CONSTRAINT FKtbl_commen921410 FOREIGN KEY (postid) REFERENCES tbl_post (id);

