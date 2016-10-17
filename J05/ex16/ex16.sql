SELECT count(date) AS 'films' FROM historique_membre WHERE (date(date) BETWEEN '2006-10-30 0:0:0' AND ADDDATE('2007-07-27', 1)) OR date(date) LIKE '%-12-24';
