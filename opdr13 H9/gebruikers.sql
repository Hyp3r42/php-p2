--
-- Database: 'fietsenmaker'
--

--
-- Tabelstructuur voor tabel 'gebruikers'
--

CREATE TABLE 'gebrukkers' (
    'id' int(5) NOT FULL,
    'username' varchar(255) NOT FULL,
    'password' varchar(255) NOT FULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

--
-- Gegevens worden geëxporteerd voor tabel 'gebruikers'
-- admin . admin

INSERT INTO 'gebruikers' ('id', 'username', 'password') VALUES
(11, 'admin', '$2y$10$DRNxvxqFC7m22YoNx4HAC.KXKh76nCohIh4vZ9IMtUEnZxfVGyFIO');