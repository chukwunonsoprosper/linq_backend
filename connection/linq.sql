
CREATE TABLE `linqdata` (
  `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `sessionId` varchar(255) NOT NULL,
  `linqName` varchar(255) NOT NULL,
  `linqUrl` varchar(255) NOT NULL,
  `newLinq` varchar(255) NOT NULL
) ;


CREATE TABLE `linqupdate` (
  `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `lingUpdate` varchar(10000) NOT NULL
) ;
