UPDATE movimientos SET cliente_id = (SELECT tabla_id FROM movimientos WHERE libelle LIKE "%MUNOZ ALBUERNO%";
# (UPDATE movimientos SET cliente_id = ?);