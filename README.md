ceep_laravel
php artisan migrate --path=database/migrations/conselho


delete from ceep.inscricoesnovas where cpf in 
(SELECT cpf FROM ceep.inscricoesnovas  group by cpf having count(cpf)>1)
and not id in
(SELECT max(id) FROM ceep.inscricoesnovas  group by cpf having Count(id)>1)


select * from inscricoesnovas where cpf in
(SELECT cpf FROM inscricoesnovas GROUP BY cpf HAVING count( cpf ) > 1)
and id not in
(SELECT max(id)as id FROM inscricoesnovas GROUP BY cpf HAVING count( cpf ) > 1)