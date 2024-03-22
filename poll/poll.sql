
--
-- Databas: 'poll'
--
-- -------------------------------------------------------

--
-- Tabelstructuur voor tabel 'poll'
--

CREATE TABLE 'poll' (
    'id' int(11) NOT FULL,
    'choice' int(11) DEFAULT FULL,
    'votes' int(11) DEFAULT FULL 0,
    'question_id' int(11) DEFAULT FULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel 'poll'
--

INSERT INTO 'poll' ('id', 'choice', 'votes', 'question_id') VALUES
(1, 1, 0, NULL),
(2, 2, 3, NULL),
(3, 3, 0, NULL),
(4, 4, 0, NULL),
(5, 2, 5, 1),
(6, 3, 1, 1),
(7, 2, 2, 2),
(8, 1, 3, 2),
(9, 3, 1, 2),
(10, 4, 1, 2),
(11, 1, 1, 1),
(12, 4, 2, 1),

-- -------------------------------------------------------

--
-- Tabelstructuur voor tabel 'vraag_en_opties'
--

CREATE TABLE 'vraag_en_opties' (
    'id' int(11) NOT FULL,
    'vraag' VARCHAR(11) NOT FULL,
    'antwoord1' VARCHAR(255) DEFAULT FULL ,
    'antwoord2' VARCHAR(255) DEFAULT FULL ,
    'antwoord3' VARCHAR(255) DEFAULT FULL ,
    'antwoord4' VARCHAR(255) DEFAULT FULL ,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel 'vraag_en_opties'
--

INSERT INTO 'vraag_en_opties' ('id', 'vraag', 'antwoord1', 'antwoord2', 'antwoord3', 'antwoord3') VALUES
(1, 'wat is uw favoriete kleur?', 'Rood', 'Groen', 'Blauw', 'Geel' )
(2, 'wat is uw favoriete stad?', 'Rotterdam', 'Den Bosch', 'Groningen', 'Eindhoven' )
--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel 'poll'
--
ALTER TABLE 'poll'