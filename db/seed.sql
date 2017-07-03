insert into `usuarios` (`usuario`, `senha`, `nivel`, `registro_academico`, `registro_universitario`, `criado_em`, `atualizado_em`)
values  ('canabarro', ENCRYPT('comida123'), 2, 39951, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
		('tashiro', ENCRYPT('pasteldeflango'), 2, 40032, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
		('diogostelle', ENCRYPT('melhorprofessordomundo'), 3, NULL, 99999, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
		('admin', ENCRYPT('admin'), 1, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

insert into `transacoes` (`valor`, `criado_em`,`usuario_id`)
values  (-2.50, '2017-07-12 12:23:24', 1),
	    (-2.50, '2017-07-12 18:56:21', 1),
		(-2.50, '2017-07-12 13:03:55', 2),
		(-2.50, '2017-07-12 19:32:44', 2),
		(-6.00, '2017-07-12 11:37:22', 3),
		(-6.00, '2017-07-12 19:02:12', 3),
		(20.00, '2017-06-23 10:02:12', 1),
		(50.00, '2017-05-08 16:09:11', 2),
		(70.00, '2017-04-13 08:39:39', 3);

