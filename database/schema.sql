
---------------------------
---------------------------
---- HELPER FUNCTIONS -----
---------------------------
---------------------------

/**
 * Generate a good enough random string for stub data
 * Do not use for any security purpose
 * @see http://www.simononsoftware.com/random-string-in-postgresql/
 * @param int Size of the desired string
 * @return string A "random" string
 */
CREATE OR REPLACE FUNCTION random_string(int)
RETURNS text
AS $$ 
  SELECT array_to_string(
    ARRAY (
      SELECT substring(
        '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ' FROM (random() *26)::int FOR 1)
      FROM generate_series(1, $1) ), '' ) 
$$ LANGUAGE sql;


---------------------------
---------------------------
------- APP SCHEMA --------
---------------------------
---------------------------

DROP TABLE IF EXISTS test;

create table test(
    id serial primary key,
    whatever varchar not null
);

DROP TABLE client CASCADE;

CREATE TABLE client (
  id_client SERIAL,
  nom varchar(255) default NULL,
  username varchar(255) default NULL,
  password varchar(20) NOT NULL,
  prenom varchar(255) default NULL,
  telephone varchar(100) default NULL,
  naissance date,
  email varchar(255) default NULL,
  adresse varchar(255) default NULL,
  postal varchar(10) default NULL,
  ville varchar(255),
  pays varchar(100) default NULL,
  desciption TEXT default NULL,
  niveau integer default 0,
  token varchar(100) default NULL,
  status integer default 0,
  image varchar(100) default NULL,
  PRIMARY KEY (id_client)
);


DROP TABLE demande CASCADE;

CREATE TABLE demande (
  id_demande SERIAL,
  d_client integer NOT NULL,
  q_type varchar(10) default NULL,
  title varchar(100) default NULL,
  place varchar(100) default NULL,
  status integer default 0,
  start_time timestamp (0)without time zone,
  deadline  date,
  texte varchar(255) default NULL,
  PRIMARY KEY (id_demande),
  FOREIGN KEY (d_client) references client(id_client) on delete cascade 
);


DROP TABLE application CASCADE;

CREATE TABLE application (
  id_app SERIAL,
  a_client integer NOT NULL ,
  id_demande integer NOT NULL ,
  texte TEXT default NULL,
  PRIMARY KEY (id_app),
  FOREIGN KEY (a_client) references client(id_client) on delete cascade ,
  FOREIGN KEY (id_demande) references demande(id_demande) on delete cascade 
);

DROP TABLE IF EXISTS qualification;

CREATE TABLE qualification (
  id_qualification SERIAL,
  id_client integer NOT NULL ,
  q_type varchar(10),
  description varchar(255),
  UNIQUE (q_type, description) ,
  PRIMARY KEY (id_qualification),
  FOREIGN KEY (id_client) references client(id_client) on delete cascade 
);



DROP TABLE IF EXISTS commande;

/*
CREATE TABLE commande (
  id_commande SERIAL,
  id_app integer NOT NULL,
  id_demande integer NOT NULL,
  q_type varchar(10) default NULL,
  status integer default 0,
  start_time timestamp (0)without time zone,
  deadline  date,
  texte TEXT default NULL,
  UNIQUE (id_demande), 
  PRIMARY KEY (id_commande),
  FOREIGN KEY (id_demande) references demande(id_demande) MATCH SIMPLE
ON UPDATE NO ACTION ON DELETE CASCADE , 
  FOREIGN KEY (id_app) references application(id_app) MATCH SIMPLE
ON UPDATE NO ACTION ON DELETE CASCADE 
);
*/



DROP TABLE IF EXISTS commande2;

CREATE TABLE commande2 (
  id_commande2 SERIAL,
  a_client integer NOT NULL,
  id_demande integer NOT NULL,
  UNIQUE (id_demande), 
  PRIMARY KEY (id_commande2),
  FOREIGN KEY (id_demande) references demande(id_demande) on delete cascade 
);
---------------------------
---------------------------
-------- APP DATA ---------
---------------------------
---------------------------

-- insert 100 random strings of length 20
insert into test (whatever) 
    select random_string(20)
    from generate_series(1, 100)
;

SET datestyle = "SQL", "DMY";

INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES ('Randolph','Bianca','gerogj','Julie','03 00 04 57 70','25/10/2005','laoreet.posuere.enim@turpisNullaaliquet.edu','Appartement 999-2965 Lorem Rd.','1336','Wilmington','Somalia','posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero.',72,'',0,''); 
INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES ('Puckett','Liberty','lekghzmkg','Vernon','01 72 64 87 22','3/09/2003','iaculis.enim.sit@amet.org','CP 715, 8911 Semper Route','618005','Hampstead','Sudan','nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean eget metus. In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna. Sed eu eros. Nam consequat dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros turpis non enim. Mauris quis turpis vitae purus gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero est, congue a, aliquet vel, vulputate eu, odio. Phasellus at augue id ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi pede, nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce fermentum fermentum arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet diam eu dolor',82,'',0,'');
INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES ('Page','Basia','fezfojzg','Kirestin','02 80 74 97 25','12/07/2002','Aliquam.gravida@placeratvelitQuisque.net','CP 234, 8532 Lobortis Rd.','69502','Patarrá','Mexico','vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor quis, tristique ac, eleifend vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tincidunt, neque vitae semper egestas, urna justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magna. Phasellus dolor elit, pellentesque a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis massa. Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis',61,'',0,'');
INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES ('Fitzgerald','Piper','peioehiofgh','Joel','01 53 44 41 89','26/01/1996','molestie@Lorem.ca','629-2384 Faucibus Av.','87521','Vieste','Somalia','est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo',96,'',0,'');
INSERT INTO client (nom,username,password,prenom,telephone,naissance,email,adresse,postal,ville,pays,desciption,niveau,token,status,image) VALUES ('LI','dinghaoli666','ldh5398938','Dinghao','01 53 44 41 89','07/01/1995','dinghaoli666@gmail.com','629-2384 Faucibus Av.','87521','Vieste','Somalia','est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus ut, nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor, est ac mattis semper, dui lectus rutrum urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nulla ante, iaculis nec, eleifend non, dapibus rutrum, justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed turpis nec mauris blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut eros non enim commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit, pretium et, rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo',96,'',2,'');

INSERT INTO qualification(id_client,q_type,description) VALUES (1,'sport','1号技能1：像丁丁一样强');
INSERT INTO qualification(id_client,q_type,description) VALUES (1,'jeu','1号技能2：仅次于丁丁');
INSERT INTO qualification(id_client,q_type,description) VALUES (2,'jeu','2号技能1：仅次于芮德');
INSERT INTO qualification(id_client,q_type,description) VALUES (2,'sport','2号技能2：丁丁是偶像');
INSERT INTO qualification(id_client,q_type,description) VALUES (3,'cuisine','3号技能1：可以试吃');

/*SET datestyle = default;*/

INSERT INTO demande(d_client,q_type,status,start_time,deadline,texte) VALUES (1,'sport',0,'2017-04-10 20:38:40', '10/04/2017','1号client申请1 求大腿');
INSERT INTO demande(d_client,q_type,status,start_time,deadline,texte) VALUES (2,'sport',0,'2017-04-11 20:38:40', '11/04/2017','2号client申请2 求大腿');
INSERT INTO demande(d_client,q_type,status,start_time,deadline,texte) VALUES (2,'jeu',0,'2017-04-12 20:38:40', '12/04/2017','2号client申请3 找小腿');
INSERT INTO demande(d_client,q_type,status,start_time,deadline,texte) VALUES (3,'jeu',0,'2017-04-13 20:38:40', '13/04/2017','3号client申请4 找小腿');

INSERT INTO application(a_client,id_demande,texte) VALUES (1, 3, '1 client对3 demande的application');
INSERT INTO application(a_client,id_demande,texte) VALUES (1, 2, '1 client对2 demande的application');
INSERT INTO application(a_client,id_demande,texte) VALUES (4, 2, '4 client对2 demande的application');
INSERT INTO application(a_client,id_demande,texte) VALUES (2, 1, '2 client对1 demande的application');
INSERT INTO application(a_client,id_demande,texte) VALUES (3, 1, '3 client对1 demande的application');

/*INSERT INTO commande(id_app,id_demande,q_type,status,start_time,deadline,texte) VALUES (1,3,'jeu',0,'2017-04-10 20:38:40', '2017-4-8','1号app对3号demande,即1号对2号玩家' );
INSERT INTO commande(id_app,id_demande,q_type,status,start_time,deadline,texte) VALUES (3,1,'sport',1,'2017-04-10 20:38:40', '2017-4-9','3号app对1号demande,即2号对1号玩家' );
*/

INSERT INTO commande2(a_client,id_demande)VALUES(1,3);
INSERT INTO commande2(a_client,id_demande)VALUES(1,4);
INSERT INTO commande2(a_client,id_demande)VALUES(3,1);