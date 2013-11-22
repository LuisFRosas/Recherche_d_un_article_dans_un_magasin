# 
# Base de données: `mlahlou`
# 
USE `????`;

#
# Structure de la table `article`
#
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id_article` varchar(5) NOT NULL default '',
  `designation` varchar(100) NOT NULL default '',
  `prix` decimal(8,2) NOT NULL default '0.00',
  `categorie` enum('vidéo','photo','informatique','divers') NOT NULL default 'divers',
  PRIMARY KEY  (`id_article`),
  UNIQUE KEY `id_article` (`id_article`)
) TYPE=MyISAM DEFAULT CHARSET=utf8;

#
# Contenu de la table `article`
#

INSERT INTO `article` VALUES ('CS330', 'Caméscope Sony DCR-PC330', '1629.00', 'vidéo');
INSERT INTO `article` VALUES ('NIK55', 'Nikon F55+zoom 28/80', '269.00', 'photo');
INSERT INTO `article` VALUES ('NIK80', 'Nikon F80', '479.00', 'photo');
INSERT INTO `article` VALUES ('SOXMP', 'PC Portable Sony Z1-XMP', '2399.00', 'informatique');
INSERT INTO `article` VALUES ('HP497', 'PC Bureau HP497 écran TFT', '1500.00', 'informatique');
INSERT INTO `article` VALUES ('DVD75', 'DVD vierge par 3', '17.50', 'divers');
INSERT INTO `article` VALUES ('CAS07', 'Cassette DV60 par 5', '26.90', 'divers');
INSERT INTO `article` VALUES ('DEL30', 'Portable Dell X300', '1715.00', 'informatique');
INSERT INTO `article` VALUES ('CP100', 'Caméscope Panasonic SV-AV 100', '1490.00', 'vidéo');
INSERT INTO `article` VALUES ('SAX15', 'Portable Samsung X15 XVM', '1999.00', 'informatique');
INSERT INTO `article` VALUES ('CA300', 'Canon EOS 3000V zoom 28/80', '329.00', 'photo');
