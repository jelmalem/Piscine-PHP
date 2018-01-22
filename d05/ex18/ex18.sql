SELECT nom FROM distrib
WHERE (( id_distrib = 42 || ( id_distrib >= 62 && id_distrib <= 69 ) || id_distrib = 71 || ( id_distrib >= 88 && id_distrib <= 90 )) || ( nom LIKE '%y%y%' || nom LIKE '%Y%Y%' ))
LIMIT 2, 5;