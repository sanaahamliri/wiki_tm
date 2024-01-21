
CREATE DATABASE 'wiki';

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(255) NOT NULL
)


CREATE TABLE `tag` (
  `idTag` int(11) NOT NULL,
  `nomTag` varchar(255) NOT NULL
)


CREATE TABLE `utilisateur` (
  `idUser` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2
)

CREATE TABLE `wiki` (
  `idWiki` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` longtext NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `da_te` date DEFAULT curdate()
)

CREATE TABLE `wikitag` (
  `idWikiTag` int(11) NOT NULL,
  `idWiki` int(11) NOT NULL,
  `idTag` int(11) NOT NULL
)

ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

ALTER TABLE `tag`
  ADD PRIMARY KEY (`idTag`);

ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `wiki`
  ADD PRIMARY KEY (`idWiki`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `wiki_ibfk_1` (`idCategorie`);

ALTER TABLE `wikitag`
  ADD PRIMARY KEY (`idWikiTag`),
  ADD KEY `wikitag_ibfk_1` (`idWiki`),
  ADD KEY `wikitag_ibfk_2` (`idTag`);

ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `tag`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `utilisateur`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

ALTER TABLE `wiki`
  MODIFY `idWiki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;


ALTER TABLE `wikitag`
  MODIFY `idWikiTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`idUser`);

ALTER TABLE `wikitag`
  ADD CONSTRAINT `wikitag_ibfk_1` FOREIGN KEY (`idWiki`) REFERENCES `wiki` (`idWiki`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wikitag_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tag` (`idTag`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
