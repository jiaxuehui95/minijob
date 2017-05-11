SET CLIENT_ENCODING TO 'LATIN1';

--
-- Structure de la table region
--

DROP TABLE region CASCADE;

CREATE TABLE region (
  region_id smallint NOT NULL,
  region_nom varchar(30) NOT NULL,
  PRIMARY KEY (region_id)
);

--
-- Contenu de la table region
--

INSERT INTO region (region_id, region_nom) VALUES
  (1, 'GUADELOUPE'),
  (2, 'MARTINIQUE'),
  (3, 'GUYANE'),
  (4, 'LA RÉUNION'),
  (11, 'ILE-DE-FRANCE'),
  (21, 'CHAMPAGNE-ARDENNE'),
  (22, 'PICARDIE'),
  (23, 'HAUTE-NORMANDIE'),
  (24, 'CENTRE'),
  (25, 'BASSE-NORMANDIE'),
  (26, 'BOURGOGNE'),
  (31, 'NORD-PAS-DE-CALAIS'),
  (41, 'LORRAINE'),
  (42, 'ALSACE'),
  (43, 'FRANCHE-COMTÉ'),
  (52, 'PAYS DE LA LOIRE'),
  (53, 'BRETAGNE'),
  (54, 'POITOU-CHARENTES'),
  (72, 'AQUITAINE'),
  (73, 'MIDI-PYRÉNÉES'),
  (74, 'LIMOUSIN'),
  (82, 'RHÔNE-ALPES'),
  (83, 'AUVERGNE'),
  (91, 'LANGUEDOC-ROUSSILLON'),
  (93, 'PROVENCE-ALPES-CÔTE D''AZUR'),
  (94, 'CORSE');


--
-- Structure de la table departement
--


DROP TABLE departement CASCADE;

CREATE TABLE departement (
  departement_id varchar(3) NOT NULL,
  departement_nom varchar(30) NOT NULL,
  region_id integer NOT NULL,
  PRIMARY KEY (departement_id),
  FOREIGN KEY (region_id) REFERENCES region(region_id) ON DELETE CASCADE
);

--
-- Contenu de la table departement
--

INSERT INTO departement (departement_id, departement_nom, region_id) VALUES
  ('01', 'AIN', 82),
  ('02', 'AISNE', 22),
  ('03', 'ALLIER', 83),
  ('04', 'ALPES-DE-HAUTE-PROVENCE', 93),
  ('05', 'HAUTES-ALPES', 93),
  ('06', 'ALPES-MARITIMES', 93),
  ('07', 'ARDÈCHE', 82),
  ('08', 'ARDENNES', 21),
  ('09', 'ARIÈGE', 73),
  ('10', 'AUBE', 21),
  ('11', 'AUDE', 91),
  ('12', 'AVEYRON', 73),
  ('13', 'BOUCHES-DU-RH?NE', 93),
  ('14', 'CALVADOS', 25),
  ('15', 'CANTAL', 83),
  ('16', 'CHARENTE', 54),
  ('17', 'CHARENTE-MARITIME', 54),
  ('18', 'CHER', 24),
  ('19', 'CORRÈZE', 74),
  ('2A', 'CORSE-DU-SUD', 94),
  ('2B', 'HAUTE-CORSE', 94),
  ('21', 'CÔTE-D''OR', 26),
  ('22', 'CÔTES-D''ARMOR', 53),
  ('23', 'CREUSE', 74),
  ('24', 'DORDOGNE', 72),
  ('25', 'DOUBS', 43),
  ('26', 'DRÔME', 82),
  ('27', 'EURE', 23),
  ('28', 'EURE-ET-LOIR', 24),
  ('29', 'FINISTÈRE', 53),
  ('30', 'GARD', 91),
  ('31', 'HAUTE-GARONNE', 73),
  ('32', 'GERS', 73),
  ('33', 'GIRONDE', 72),
  ('34', 'HÉRAULT', 91),
  ('35', 'ILLE-ET-VILAINE', 53),
  ('36', 'INDRE', 24),
  ('37', 'INDRE-ET-LOIRE', 24),
  ('38', 'ISÈRE', 82),
  ('39', 'JURA', 43),
  ('40', 'LANDES', 72),
  ('41', 'LOIR-ET-CHER', 24),
  ('42', 'LOIRE', 82),
  ('43', 'HAUTE-LOIRE', 83),
  ('44', 'LOIRE-ATLANTIQUE', 52),
  ('45', 'LOIRET', 24),
  ('46', 'LOT', 73),
  ('47', 'LOT-ET-GARONNE', 72),
  ('48', 'LOZÈRE', 91),
  ('49', 'MAINE-ET-LOIRE', 52),
  ('50', 'MANCHE', 25),
  ('51', 'MARNE', 21),
  ('52', 'HAUTE-MARNE', 21),
  ('53', 'MAYENNE', 52),
  ('54', 'MEURTHE-ET-MOSELLE', 41),
  ('55', 'MEUSE', 41),
  ('56', 'MORBIHAN', 53),
  ('57', 'MOSELLE', 41),
  ('58', 'NIÈVRE', 26),
  ('59', 'NORD', 31),
  ('60', 'OISE', 22),
  ('61', 'ORNE', 25),
  ('62', 'PAS-DE-CALAIS', 31),
  ('63', 'PUY-DE-DÔME', 83),
  ('64', 'PYRÉNÉES-ATLANTIQUES', 72),
  ('65', 'HAUTES-PYRÉNÉES', 73),
  ('66', 'PYRÉNÉES-ORIENTALES', 91),
  ('67', 'BAS-RHIN', 42),
  ('68', 'HAUT-RHIN', 42),
  ('69', 'RHÔNE', 82),
  ('70', 'HAUTE-SAÔNE', 43),
  ('71', 'SAÔNE-ET-LOIRE', 26),
  ('72', 'SARTHE', 52),
  ('73', 'SAVOIE', 82),
  ('74', 'HAUTE-SAVOIE', 82),
  ('75', 'PARIS', 11),
  ('76', 'SEINE-MARITIME', 23),
  ('77', 'SEINE-ET-MARNE', 11),
  ('78', 'YVELINES', 11),
  ('79', 'DEUX-SÈVRES', 54),
  ('80', 'SOMME', 22),
  ('81', 'TARN', 73),
  ('82', 'TARN-ET-GARONNE', 73),
  ('83', 'VAR', 93),
  ('84', 'VAUCLUSE', 93),
  ('85', 'VENDÉE', 52),
  ('86', 'VIENNE', 54),
  ('87', 'HAUTE-VIENNE', 74),
  ('88', 'VOSGES', 41),
  ('89', 'YONNE', 26),
  ('90', 'TERRITOIRE DE BELFORT', 43),
  ('91', 'ESSONNE', 11),
  ('92', 'HAUTS-DE-SEINE', 11),
  ('93', 'SEINE-SAINT-DENIS', 11),
  ('94', 'VAL-DE-MARNE', 11),
  ('95', 'VAL-D''OISE', 11),
  ('971', 'GUADELOUPE', 1),
  ('972', 'MARTINIQUE', 2),
  ('973', 'GUYANE', 3),
  ('974', 'LA RÉUNION', 4);
  
  
-- --------------------------------------------------------

--
-- Structure de la table ville
--

DROP TABLE ville CASCADE;

CREATE TABLE IF NOT EXISTS ville (
  ville_id varchar(5) NOT NULL,
  code_postal integer NOT NULL,
  ville_nom varchar(40) NOT NULL,
  departement_id varchar(3) NOT NULL,
  PRIMARY KEY (ville_id),
  FOREIGN KEY (departement_id) REFERENCES departement(departement_id) ON DELETE CASCADE
);
